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

    public function order(){
        return view('backend.article.order',
        [
            'datas'=> article::where('special','1')->where('active','1')->orderBy('order','asc')->get(),
        ]);
    }

    public function orderUpdate(Request $request){
        $this->articleRepository->orderUpdate($request);
        return redirect('/backend/article/story/special')->with('success','順序已更新 Order Updated');
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
            'pic.image'         => '上傳檔案非圖片 Please upload valid image',
            'title.required'    => '請輸入標題 Please input title',
            'title.max'         => '標題需為200字以內 The title may not be greater than 200 characters',
            'description.max'   => '敘述需為56字以內 The description may not be greater than 56 characters',
            
        ];
        $validate = Validator::make($request->all(), [
            'pic' => 'nullable|image',
            'title' => 'required|max:200',
            'description' => 'max:56',
            
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
            'pic.image'         => '上傳檔案非圖片 Please upload valid image',
            'title.required'    => '請輸入標題 Please input title',
            'title.max'         => '標題需為200字以內 The title may not be greater than 200 characters',
            'description.max'   => '敘述需為56字以內 The description may not be greater than 56 characters',
            
        ];
        $validate = Validator::make($request->all(), [
            'pic' => 'nullable|image',
            'title' => 'required|max:200',
            'description' => 'max:56',
            
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
    public function copy_list(Request $request){
        $datas=$this->articleRepository->copy_list($request);
        // dd($datas);
        return view('backend.article.copy', [
            'datas'            => $datas,
        ]);
    }
    public function copy_selected(Request $request){
        $count=$this->articleRepository->copy_selected($request);
        return back()->with('success',$count.' article copied');
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
        return back()->with('success','文章已刪除 Article Deleted');
    }
    public function delete_selected(Request $request){
        $count=$this->articleRepository->delete_selected($request);
        return back()->with('success',$count.' 篇文章已刪除 '.$count.' Articles Deleted');
    }
}
