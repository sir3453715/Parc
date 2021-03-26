<?php

namespace App\Http\Controllers\Backend;

use App\article;
use App\category;
use App\EventTerm;
use App\LoveEvent;
use App\Option;
use App\TermLink;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use Psy\Exception\RuntimeException;
use Session;
use Cookie;



use App\Http\Repositories\Backend\ArticleRepository;



class LoveEventController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository){
        $this->articleRepository=$articleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $events = LoveEvent::where('id','!=','');
        if($request->get('keyword') != ''){
            $events = $events->where('title','LIKE','%'.$request->get('keyword').'%');
        }
        if($request->get('term') != ''){
            $event_ids = TermLink::where('term_id',$request->get('term'))->pluck('event_id')->toArray();
            $events = $events->whereIn('id',$event_ids);
        }
        if($request->get('date_start') != ''){
            $events = $events->where('created_at','>=',$request->get('date_start').' 00:00:00');
        }
        if($request->get('date_end') != ''){
            $events = $events->where('created_at','<=',$request->get('date_end').' 23:59:59');
        }

        $terms = EventTerm::where('up_id','3')
            ->orderBy('sort','DESC')
            ->get();

        $events = $events->orderBy('sort','DESC')
            ->orderBy('created_at','DESC')
            ->paginate(10);

        return view('backend.love_event.index', [
            'events' => $events,
            'terms' => $terms,
        ]);
    }


    /**
     * 新增 愛活動文章的頁面
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|null
     */
    public function create(Request $request)
    {
        $terms = EventTerm::where('up_id','3')
            ->orderBy('sort','DESC')
            ->get();

        return view('backend.love_event.create', [
            'terms' => $terms,
        ]);
    }

    /**
     * 編輯 愛活動文章的頁面
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|null
     */
    public function edit($id)
    {
        $event = LoveEvent::find($id);
        $terms = EventTerm::where('up_id','3')
            ->orderBy('sort','DESC')
            ->get();
        return view('backend.love_event.edit', [
            'event' => $event,
            'terms' => $terms,
        ]);
    }

    /**
     * 更新 愛活動文章
     *
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null
     */
    public function update(Request $request, $id = null)
    {

        $event = LoveEvent::find($id);
        if($request->hasFile('pic')){
            //有圖檔且舊圖檔存在
            if($event->pic){
                Storage::delete('public/'.$event->pic);
            }
            $image = $request->file('pic');
            $image_name = time().str_random(3).'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/love_event',$image_name);
        }

        $data = [
            'active'        =>  $request->get('active') ? 1:0,
            'title'         =>  $request->get('title'),
            'description'   =>  $request->get('description'),
            'author'        =>  $request->get('author'),
            'body'          =>  $request->get('body'),
            'tags'          =>  $request->get('tags'),
            'lang'          =>  $request->get('lang'),
            'sort'          =>  $request->get('sort'),
            'user_id'       =>  auth()->id(),
            'pic'=>'love_event/'.$image_name,
        ];
        $event->fill($data);
        $event->save();
        $eventTerms = TermLink::where('event_id',$id);
        $eventTerms->delete();
        $terms = $request->get('terms');
        if(sizeof($terms)>0){
            foreach ($terms as $term){
                TermLink::create([
                    'event_id'=>$event->id,
                    'term_id'=>$term,
                ]);
            }
        }


        return redirect(route('love-event.index'))->with('success','文章修改成功');
    }

    /**
     * 新增 愛活動文章
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null
     */
    public function store(Request $request)
    {



        $data = [
            'active'        =>  $request->get('active') ? 1:0,
            'title'         =>  $request->get('title'),
            'description'   =>  $request->get('description'),
            'author'        =>  $request->get('author'),
            'body'          =>  $request->get('body'),
            'tags'          =>  $request->get('tags'),
            'lang'          =>  $request->get('lang'),
            'sort'          =>  $request->get('sort'),
            'user_id'       =>  auth()->id(),
        ];
        $event = LoveEvent::create($data);
        $terms = $request->get('terms');
        if(sizeof($terms)>0){
            foreach ($terms as $term){
                TermLink::create([
                    'event_id'=>$event->id,
                    'term_id'=>$term,
                ]);
            }
        }
        //save pic path
        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $image_name = time().str_random(3).'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/love_event',$image_name);
            $event->fill(
                ['pic'=>'love_event/'.$image_name,]
            );
            $event->save();
        }


        return redirect(route('love-event.index'))->with('success','文章新增成功');

    }

    /**
     * 刪除 愛活動文章
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $event = LoveEvent::find($id);
//        $faq = Faq::find($id);
//
        if($event)
            $event->delete();
//
        return redirect(route('love-event.index'))->with('success','文章已刪除');
    }


    public function viedo(){
        $option = Option::where('key','video_url')->first();
        return view('backend.love_event.video', [
            'option' => $option,
        ]);
    }
    public function viedoUpdate(Request $request){
        $data=[
            'key'=>'video_url',
            'value'=>$request->get('video_url'),
        ];

        $option = Option::where('key','video_url')->first();
        if($option){
            $option->fill($data);
            $option->save();
        }else{
            Option::create($data);
        }
        return redirect(route('love-event.video'))->with('success','影片連結已更新!');
    }
    public function deleteSelected(Request $request){
        $events = LoveEvent::whereIn($request->get('delete_ids'));
        if($events)
            $events->delete();

        return redirect(route('love-event.index'))->with('success','所有選取文章已刪除');

    }
}
