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
            $this->indexKvRepository->store($request);   
            return redirect('/backend/indexKV/'.$request->segment(3));
        }
    }

    public function edit($type,indexKV $indexKV)
    {
        $datas=$this->indexKvRepository->edit($indexKV);
        return view('backend.indexKV.edit',[
            'datas'=>$datas,
        ]);
    }

    public function update($type=null, indexKV $indexKV, Request $request){
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
            $this->indexKvRepository->update($request,$indexKV);   
            return redirect('/backend/indexKV/'.$request->segment(3));
        }
    }

    public function destroy(indexKV $indexKV)
    {
        $this->indexKvRepository->destroy($indexKV);
        return back()->with('success','Item deleted');
    }
}
