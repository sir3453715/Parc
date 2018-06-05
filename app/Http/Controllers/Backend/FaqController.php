<?php

namespace App\Http\Controllers\Backend;

use App\faq;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\FaqRepository;

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
        return view('faq.index',
        [
            'datas' => $datas,
        ]);
    }
    public function create(){
        $datas=$this->faqRepository->create();
        return view('faq.create',
        [
            'datas' => $datas,
        ]);
    }
    public function store(Request $request){
        $this->faqRepository->store($request);
        return redirect('/backend/faq');
    }
    public function edit(faq $faq){
        $datas=$this->faqRepository->edit($faq);
        return view('faq.edit',
        [
            'datas' => $datas,
        ]);
    }
    public function update(faq $faq,Request $request){
        $datas=$this->faqRepository->update($faq,$request);
        return redirect('/backend/faq');
    }
    public function order(){
        return view('faq.order',
        [
            'datas'=> faq::all()->sortBy("order"),
        ]);
    }
    public function orderUpdate(Request $request){
        $this->faqRepository->orderUpdate($request);
        return redirect('/backend/faq');
    }
    public function destroy(faq $faq){
        $faq->delete();
        Session::flash('msg', 'FAQ Deleted');
        return redirect('/backend/faq');
    }
}
