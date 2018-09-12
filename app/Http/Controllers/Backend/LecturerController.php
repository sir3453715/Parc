<?php

namespace App\Http\Controllers\Backend;

use App\lecturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\Backend\LecturerRepository;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Session;



class LecturerController extends Controller
{
    protected $lecturerRepository;

    public function __construct(LecturerRepository $lecturerRepository){
        $this->lecturerRepository=$lecturerRepository;
    }
    public function index(Request $request){
        $datas=$this->lecturerRepository->index($request);
        return view('backend.lecturer.index',
        [
            'datas' => $datas,
        ]);
    }
    public function create(){
        $datas=$this->lecturerRepository->create();
        return view('backend.lecturer.create', [
            'datas' => $datas,
        ]);
        return redirect('/backend/lecturer/create');
    }
    public function edit(lecturer $lecturer){
        $datas=$this->lecturerRepository->edit($lecturer);
        return view('backend.lecturer.edit',[
            'datas'=>$datas,
        ]);
    }
    public function store(Request $request){
        $messages = [
            'name.required'  => '請輸入姓名 Please fill in name',
            'pic.required'  => '請上傳圖片 Please upload image',
            'pic.image'  => '上傳檔案非圖片 Please upload valid image',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'pic' => 'required|image',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->lecturerRepository->store($request);
            return redirect('/backend/lecturer')->with('success','資料新增成功! Data created successfully');
        }
    }
    public function update(Request $request,lecturer $lecturer){
        $messages = [
            'name.required'  => '請輸入姓名 Please fill in name',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required',            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->lecturerRepository->update($request,$lecturer);
            return redirect('/backend/lecturer')->with('success','資料更新成功! Data updated successfully');
        }
    }
    public function destroy(lecturer $lecturer)
    {
        if($lecturer->pic){
            Storage::delete('public/'.$lecturer->pic);
        }
        $lecturer->delete();
        return back()->with('success','資料已刪除! Data deleted');;
    }
    public function order(){
        return view('backend.lecturer.order',
        [
            'datas'=> lecturer::all()->sortBy("order"),
        ]);
    }
    public function order_update(Request $request){
        $this->lecturerRepository->order_update($request);
        return redirect('/backend/lecturer')->with('success','順序已更新! Order Updated');
    }
}
