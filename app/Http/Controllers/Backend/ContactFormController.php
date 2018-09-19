<?php

namespace App\Http\Controllers\Backend;

use App\ContactForm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\Backend\ContactFormRepository;
use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\Controller;
use Session;

class ContactFormController extends Controller
{
    //
    protected $contactFormRepository;

    public function __construct(ContactFormRepository $contactFormRepository){
        $this->contactFormRepository=$contactFormRepository;
    }

    public function index(){
        $datas=$this->contactFormRepository->index();
        return view('backend.contact_form.index',
            [
                'datas' =>$datas,
            ]
        );
    }
    public function create(){
        return view('backend.contact_form.create');
    }
    public function store(Request $request){
        $messages = [
            'name.required' => '請輸入您的名字 Please fill in your name',
            'name.max' => '名字過長，請重新輸入 Name may not be greater than 100 characters',
            'email.required_without' => '請輸入您的電子信箱或聯絡電話 Please fill in your email or phone',
            'email.max' => '電子信箱過長，請重新輸入 Email may not be greater than 191 characters',
            'phone.max' => '聯絡電話過長，請重新輸入 Phone number may not be greater than 20 characters',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required_without:phone|max:191',
            'phone' => 'max:20',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->contactFormRepository->store($request);
            return redirect('/backend/contact_form')->with('success','資料新增成功! Data created successfully');
        }
    }
    public function edit(ContactForm $contact_form){
        //$this->contactFormRepository->edit($contact_form);
        return view('backend.contact_form.edit',
            [
                'datas' => $contact_form,
            ]
        );
    }
    public function update(Request $request,ContactForm $contact_form){
        $messages = [
            'name.required' => '請輸入您的名字 Please fill in your name',
            'name.max' => '名字過長，請重新輸入 Name may not be greater than 100 characters',
            'email.required_without' => '請輸入您的電子信箱或聯絡電話 Please fill in your email or phone',
            'email.max' => '電子信箱過長，請重新輸入 Email may not be greater than 191 characters',
            'phone.max' => '聯絡電話過長，請重新輸入 Phone number may not be greater than 20 characters',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required_without:phone|max:191',
            'phone' => 'max:20',
            
        ], $messages);
        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->contactFormRepository->update($request,$contact_form);
            return redirect('/backend/contact_form');
        }
    }
    public function destroy(ContactForm $contact_form){
        $contact_form->delete();
        return back()->with('success','資料已刪除 Data Deleted');
    }
}
