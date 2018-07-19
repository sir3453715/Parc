<?php

namespace App\Http\Controllers\Backend;

use App\article;
use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



use Illuminate\Support\Facades\DB;
use Session;
use Cookie;



use App\Http\Repositories\Backend\ArticleRepository;



class ArticleController extends Controller
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
        $datas = $this->articleRepository->index($request);
        

        // if($request->category){
        //     $category_name=category::where('id',$request->category)->value('name');
        //     Cookie::queue('category_name', $category_name, 60);
        //     dd($request);
        // }
        return view('backend.article.index', [
            'datas' => $datas,
        ]);
    }

    public function special(Request $request)
    {
        $datas = $this->articleRepository->special($request);

        return view('backend.article.special', [
            'datas' => $datas,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas=$this->articleRepository->create();
        return view('backend.article.create', [
            'datas' => $datas,
        ]);
    }
    public function sub_menu_ajax($category_id)
    {
        return $this->articleRepository->sub_menu_ajax($category_id);
    }

    public function extra_sub_menu_ajax($category_id,$sub_category_id)
    {
        return $this->articleRepository->extra_sub_menu_ajax($category_id,$sub_category_id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'pic.image' => '上傳檔案非圖片',
            
        ];
        $validate = Validator::make($request->all(), [
            'pic' => 'nullable|image',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->articleRepository->store($request);   
            return redirect('/backend/article/'.$request->segment(3));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($category=null,article $article)
    {
        $datas=$this->articleRepository->edit($article);
        return view('backend.article.edit',[
            'datas'=>$datas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category=null, article $article)
    {
        $messages = [
            'pic.image' => '上傳檔案非圖片',
            
        ];
        $validate = Validator::make($request->all(), [
            'pic' => 'nullable|image',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->articleRepository->update($request,$article);
            return redirect('/backend/article/'.$request->segment(3));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        $this->articleRepository->destroy($article);
        return back()->with('success','Article deleted');
    }
    public function delete_selected(Request $request){
        $count=$this->articleRepository->delete_selected($request);
        return back()->with('success',$count.' article deleted');
    }
}
