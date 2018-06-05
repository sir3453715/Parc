<?php

namespace App\Http\Controllers\Backend;

use App\ContactForm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\ContactFormRepository;

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
        return view('contact_form.index',
            [
                'datas' =>$datas,
            ]
        );
    }
    public function create(){
        return view('contact_form.create');
    }
    public function store(Request $request){
        $this->contactFormRepository->store($request);
        return redirect('/backend/contact_form');
    }
    public function edit(ContactForm $contact_form){
        //$this->contactFormRepository->edit($contact_form);
        return view('contact_form.edit',
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
        Session::flash('msg', 'Data Deleted');
        return redirect('/backend/contact_form');
    }
}
