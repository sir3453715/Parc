<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\Backend\AboutMileStoneRepository;
use Illuminate\Support\Facades\Validator;


use App\AboutMilestone;
use Session;

class AboutMilestoneController extends Controller
{
    protected $aboutMilestoneRepository;
    
    public function __construct(AboutMileStoneRepository $aboutMilestoneRepository){
        $this->aboutMilestoneRepository=$aboutMilestoneRepository;
    }
    //
    public function index(){
        $datas=$this->aboutMilestoneRepository->index();
        return view('backend.about_milestone.index',
        [
            'datas' => $datas,
        ]);
    }
    public function create(){
        $datas=$this->aboutMilestoneRepository->create();
        return view('backend.about_milestone.create',
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
            'pic.max'       => '圖片大小需小於4MB Image file size may not be greater than 4MB',
        ];
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'pic' => 'required|image|max:4000',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->aboutMilestoneRepository->store($request);
            return redirect('/backend/about_milestone')->with('success','資料新增成功! Data created successfully');
        }
    }
    public function edit(AboutMileStone $about_milestone){
        $datas = $this->aboutMilestoneRepository->edit($about_milestone);
        return view('backend.about_milestone.edit',
        [
            'datas' => $datas,
        ]);
    }
    public function order(){
        return view('backend.about_milestone.order',
        [
            'datas'=> AboutMileStone::all()->sortBy("order"),
        ]);
    }
    public function order_update(Request $request){
        $this->aboutMilestoneRepository->order_update($request);
        return redirect('/backend/about_milestone');
    }
    public function update(Request $request,AboutMileStone $about_milestone){
        $messages = [
            'title.required'  => '請輸入標題 Please fill in title',
            'date.required'  => '請輸入日期 Please fill in date',
            'pic.image'  => '上傳檔案非圖片 Please upload valid image',
            'pic.max'       => '圖片大小需小於4MB Image file size may not be greater than 4MB',
        ];
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'pic' => 'image|max:4000',
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->aboutMilestoneRepository->update($request,$about_milestone);
            return redirect('/backend/about_milestone')->with('success','資料更新成功! Data updated successfully');
        }
    }
    public function destroy(AboutMileStone $about_milestone){
        if($about_milestone->pic){
            Storage::delete('public/'.$about_milestone->pic);
        }
        $about_milestone->delete();
        return back()->with('success','資料已刪除 Data Deleted');
    }
}
