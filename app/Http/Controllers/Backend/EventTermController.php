<?php

namespace App\Http\Controllers\Backend;

use App\article;
use App\category;
use App\EventTerm;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



use Illuminate\Support\Facades\DB;
use Session;
use Cookie;



use App\Http\Repositories\Backend\ArticleRepository;



class EventTermController extends Controller
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
        $terms = EventTerm::where('up_id','3');

        $sort = $request->get('sort')? $request->get('sort') : 'DESC';
        $keyword = $request->get('keyword');
        if($keyword){
            $terms = $terms->where('title','LIKE','%'.$keyword.'%');
        }

        $terms = $terms->orderBy('sort',$sort)
            ->get();

        return view('backend.event_term.index', [
            'terms' => $terms,
            'sort' => $sort,
            'keyword' => $keyword,
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
        return view('backend.event_term.create');
    }

    /**
     * 編輯 愛活動文章的頁面
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|null
     */
    public function edit($id)
    {
        $term = EventTerm::find($id);

        return view('backend.event_term.edit', [
            'term' => $term,
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
        $term = EventTerm::find($id);
        $data = [
            'title'=>$request->get('title'),
            'sort'=>$request->get('sort'),
        ];
        $term->fill($data);
        $term->save();

        return redirect(route('event-term.index'))->with('success','分類'.$term->title.'修改成功');
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
            'up_id'=>3,
            'title'=>$request->get('title'),
            'sort'=>$request->get('sort'),
        ];
        $term = EventTerm::create($data);

        return redirect(route('event-term.index'))->with('success','分類新增成功');
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

        $term = EventTerm::find($id);
        if($term)
            $term->delete();
//
        return redirect(route('love-event.index'))->with('success','分類已刪除');
    }



}
