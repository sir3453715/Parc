<?php
namespace App\Http\Repositories;

use App\faq;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FaqRepository{
    protected $faq;

    public function __construct(faq $faq){
        $this->faq=$faq;
    }
    public function index(){
        return faq::all()->sortBy("order");
    }
    public function create(){
        $datas=array(
            "lang"  => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function store(Request $request){
        $faq=faq::create([
            'active'    =>request('active') ? 1:0,
            'question'  =>request('question'),
            'answer'    =>request('answer'),
            'lang'      =>request('lang'),
            'order'     =>(faq::latest()->value("order")+1)
        ]);
    }
    public function edit(faq $faq){
        $datas=array
        (
            "faq"   => $faq,
            "lang"  => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function update(faq $faq,Request $request){
        $faq->active  = request('active')? 1:0 ;
        $faq->question   = request('question');
        $faq->answer    = request('answer');
        $faq->lang    = request('lang');
        $faq->save();
    }
    public function orderUpdate(Request $request){
        if($request->order){
            $orders = explode(',', $request->order);
            $i=0;
            foreach($orders as $order){
                $temp = faq::find($order);
                $temp->order=$i;
                $i++;
                $temp->save();
            } 
        }
    }
}