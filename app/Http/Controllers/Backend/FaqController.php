<?php

namespace App\Http\Controllers\Backend;

use App\faq;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\Backend\FaqRepository;
use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\Controller;
use Session;

class FaqController extends Controller
{
    //
    protected $faqRepository;
    

    public function __construct(FaqRepository $faqRepository){
        $this->faqRepository=$faqRepository;
    }
    //
    public function index(){
        $datas=$this->faqRepository->index();
        return view('backend.faq.index',
        [
            'datas' => $datas,
        ]);
    }
    public function create(){
        $datas=$this->faqRepository->create();
        return view('backend.faq.create',
        [
            'datas' => $datas,
        ]);
    }
    public function store(Request $request){
        $messages = [
            'question.required' => '請輸入問題 Please input question',
            'answer.required' => '請輸入答案 Please input answer',
            
        ];
        $validate = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->faqRepository->store($request);
            return redirect('/backend/faq')->with('success','資料新增成功! Data created successfully');;
        }
    }
    public function edit(faq $faq){
        $datas=$this->faqRepository->edit($faq);
        return view('backend.faq.edit',
        [
            'datas' => $datas,
        ]);
    }
    public function update(faq $faq,Request $request){
        $messages = [
            'question.required' => '請輸入問題 Please input question',
            'answer.required' => '請輸入答案 Please input answer',
            
        ];
        $validate = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $datas=$this->faqRepository->update($faq,$request);
            return redirect('/backend/faq')->with('success','資料更新成功! Data updated successfully');;
        }
    }
    public function order(){
        return view('backend.faq.order',
        [
            'datas'=> faq::all()->sortBy("order"),
        ]);
    }
    public function orderUpdate(Request $request){
        $this->faqRepository->orderUpdate($request);
        return redirect('/backend/faq')->with('success','順序已更新 Order Updated');
    }
    public function destroy(faq $faq){
        $faq->delete();
        return redirect('/backend/faq')->with('success','資料已刪除 Data Deleted');
    }
}
