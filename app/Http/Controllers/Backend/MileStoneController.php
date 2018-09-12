<?php

namespace App\Http\Controllers\Backend;

use App\MileStone;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\Backend\MileStoneRepository;
use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\Controller;
use Session;


class MileStoneController extends Controller
{
    protected $mileStoneRepository;
    

    public function __construct(MileStoneRepository $mileStoneRepository){
        $this->mileStoneRepository=$mileStoneRepository;
    }
    //
    public function index(){
        $datas=$this->mileStoneRepository->index();
        return view('backend.milestone.index',
        [
            'datas' => $datas,
        ]);
    }
    public function create(){
        $datas=$this->mileStoneRepository->create();
        return view('backend.milestone.create',
        [
            'datas' => $datas,
        ]);
    }
    public function store(Request $request){
        $messages = [
            'title.required'  => '請輸入標題 Please fill in title',
            'date.required'  => '請輸入日期 Please fill in date',
            'pic.required'  => '請上傳圖片 Please upload image',
            'pic.image'  => '上傳檔案非圖片 Please upload valid image',
        ];
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'pic' => 'required|image',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->mileStoneRepository->store($request);
            return redirect('/backend/milestone')->with('success','資料新增成功! Data created successfully');
        }
    }
    public function edit(milestone $milestone){
        $datas = $this->mileStoneRepository->edit($milestone);
        return view('backend.milestone.edit',
        [
            'datas' => $datas,
        ]);
    }
    public function order(){
        return view('backend.milestone.order',
        [
            'datas'=> Milestone::all()->sortBy("order"),
        ]);
    }
    public function order_update(Request $request){
        $this->mileStoneRepository->order_update($request);
        return redirect('/backend/milestone');
    }
    public function update(Request $request,milestone $milestone){
        $messages = [
            'title.required'  => '請輸入標題 Please fill in title',
            'date.required'  => '請輸入日期 Please fill in date',
        ];
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->mileStoneRepository->update($request,$milestone);
            return redirect('/backend/milestone')->with('success','資料更新成功! Data updated successfully');
        }
    }
    public function destroy(milestone $milestone){
        if($milestone->pic){
            Storage::delete('public/'.$milestone->pic);
        }
        $milestone->delete();
        return redirect('/backend/milestone')->with('success','資料已刪除 Data Deleted');
    }
}
