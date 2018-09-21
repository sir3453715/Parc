<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


use App\Http\Repositories\Backend\IndexKvRepository;
use App\indexKV;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;


class IndexKvController extends Controller
{
    
    //
    protected $indexKvRepository;

    public function __construct(IndexKvRepository $indexKvRepository){
        $this->indexKvRepository=$indexKvRepository;
    }

    public function kvIndex(Request $request){
        $datas = $this->indexKvRepository->kvIndex($request);
        return view('backend.indexKv.index',[
            'datas' => $datas,
        ]);
    }

    public function quoteIndex(Request $request){
        $datas = $this->indexKvRepository->quoteIndex($request);
        return view('backend.indexKv.index',[
            'datas' => $datas,
        ]);
    }

    public function create(){
        $datas=$this->indexKvRepository->create();
        return view('backend.indexKv.create',[
            'datas' => $datas,
        ]);
    }

    public function store(Request $request){
        if($request->type == "kv"){
            $messages = [
                'pic.required'  => '請上傳圖片 Please upload an image',
                'pic.image'     => '上傳檔案非圖片 File type not supported, please upload an image file',
                'title.required'=> '請輸入標題 Please fill in title',
                'title.max'     => '標題需為17字以內 The title may not be greater than 17 characters',
                'body.max'      => '內文需為56字以內 The content may not be greater than 56 characters',
                
            ];
            $validate = Validator::make($request->all(), [
                'pic' => 'required|image',
                'title' => 'required|max:17',
                'body' => 'max:56',
                
            ], $messages);
        }
        else{
            $messages = [
                'pic.required'  => '請上傳圖片 Please upload an image',
                'pic.image'     => '上傳檔案非圖片 File type not supported, please upload an image file',
                'author.max'    => '作者需為17字以內',
                'body.max'      => '內文需為80字以內'
                
            ];
            $validate = Validator::make($request->all(), [
                'pic' => 'required|image',
                'author' => 'max:17',
                'body' => 'max:80',
                
            ], $messages);
        }

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->indexKvRepository->store($request);   
            return redirect('/backend/indexKV/'.$request->segment(3));
        }
    }

    public function edit($type,indexKV $indexKV)
    {
        $datas=$this->indexKvRepository->edit($indexKV);
        return view('backend.indexKv.edit',[
            'datas'=>$datas,
        ]);
    }

    public function update($type=null, indexKV $indexKV, Request $request){
        if($request->type == "kv"){
            $messages = [
                // 'pic.required'  => '請上傳圖片 Please upload an image',
                'pic.image'     => '上傳檔案非圖片 File type not supported, please upload an image file',
                'title.required'=> '請輸入標題 Please fill in title',
                'title.max'     => '標題需為17字以內 The title may not be greater than 17 characters',
                'body.max'      => '內文需為56字以內 The content may not be greater than 56 characters',
                
            ];
            $validate = Validator::make($request->all(), [
                'pic' => 'image',
                'title' => 'required|max:17',
                'body' => 'max:56',
                
            ], $messages);
        }
        else{
            $messages = [
                'pic.image'     => '上傳檔案非圖片 File type not supported, please upload an image file',
                'author.max'    => '作者需為17字以內',
                'body.max'      => '內文需為80字以內'
                
            ];
            $validate = Validator::make($request->all(), [
                'pic' => 'image',
                'author' => 'max:17',
                'body' => 'max:80',               
            ], $messages);
        }

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->indexKvRepository->update($request,$indexKV);   
            return redirect('/backend/indexKV/'.$request->segment(3));
        }
    }

    public function destroy(indexKV $indexKV)
    {
        $this->indexKvRepository->destroy($indexKV);
        return back()->with('success','資料已刪除 Data Deleted');
    }
}
