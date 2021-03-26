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



class ActivityTermController extends Controller
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

        $terms = EventTerm::where('id','!=','')->orderBy('up_id','ASC')
            ->orderBy('sort','DESC')
            ->get();

        $parent_terms = EventTerm::where('up_id','0')->orderBy('sort','DESC')
            ->get();


        return view('backend.event_term.index', [
            'terms' => $terms,
            'parent_terms' => $parent_terms,
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
//        return view('admin.menu.faq.editFaq', [
//            'isCreation' => true,
//            'faq' => '',
//        ]);
        return 'Activity Term create';
    }

    /**
     * 編輯 愛活動文章的頁面
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|null
     */
    public function edit($id)
    {
//        $faq = Faq::find($id);
//
//        return view('admin.menu.faq.editFaq', [
//            'isCreation' => false,
//            'faq' => $faq,
//        ]);
        return 'Activity Term edit';
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
//        $response = $this->checkPermissionOrAbort();
//
//        if($response) {
//            return $response;
//        }
//        $faq = Faq::find($id);
//        $data = [
//            "qus" => $request->get('qus'),
//            "ans" => $request->get('ans'),
//            "sort" => $request->get('sort'),
//        ];
//        if(!$faq) {
//            $faq = Faq::create($data);
//        }else{
//            $faq->fill($data);
//            $faq->save();
//        }
//        return redirect(route('admin.main.faq'));

        return 'Activity Term update';
    }

    /**
     * 新增 愛活動文章
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null
     */
    public function store(Request $request)
    {
//        return $this->update($request);
        return 'Activity Term store';
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
//        $faq = Faq::find($id);
//
//        if($faq)
//            $faq->delete();
//
//        return redirect()->back()->with('message', trans('message.dataHasBeenDeleted', ['title' => $faq->qus]));
        return 'Activity Term destroy';
    }



}
