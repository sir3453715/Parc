<?php
namespace App\Http\Repositories\Backend;

use App\ContactForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactFormRepository{
    protected $contact_form;

    public function __construct(ContactForm $contact_form){
        $this->contact_form=$contact_form;
    }
    public function index(){
        return ContactForm::all();
    }
    public function store(Request $request){
        $contact_form=ContactForm::create(
            [
                'active'    => request('active') ? 1:0,
                'name'      => request('name'),
                'email'     => request('email'),
                'phone'     => request('phone'),
                'body'      => request('body'),    
            ]
        );
    }
    public function update(Request $request,ContactForm $contact_form){
        $contact_form->active   = request('active')? 1:0 ;
        $contact_form->name     = request('name');
        $contact_form->email    = request('email');
        $contact_form->phone    = request('phone');
        $contact_form->body     = request('body');
        
        $contact_form->save();
    }
}