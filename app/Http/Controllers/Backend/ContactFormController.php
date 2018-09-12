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
            'name.required'  => '請輸入姓名 Please fill in name',
            'email.required'  => '請輸入電子信箱 Please fill in email',
            'body.required'  => '請輸入內文 Please fill in content',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',
            
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
        $this->contactFormRepository->update($request,$contact_form);
        return redirect('/backend/contact_form');
    }
    public function destroy(ContactForm $contact_form){
        $contact_form->delete();
        return back()->with('success','資料已刪除 Data Deleted');
    }
}
