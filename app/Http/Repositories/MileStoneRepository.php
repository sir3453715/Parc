<?php
namespace App\Http\Repositories;

use App\MileStone;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MileStoneRepository{
    protected $milestone;

    public function __construct(Milestone $milestone){
        $this->milestone=$milestone;
    }
    public function index(){
        return MileStone::all()->sortBy("order");
    }
    public function create(){
        $datas=array(
            "lang"  => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function store(Request $request){
        $milestone=milestone::create([
            'active'    =>request('active') ? 1:0,
            'title'     =>request('title'),
            'body'      =>request('body'),
            'date'      =>request('date'),
            'lang'      =>request('lang'),
            'order'     =>(MileStone::latest()->value("order")+1)
        ]);
        if($request->pic){
            $upload_image=$request->pic;
            $picName = time().'.'.$upload_image->getClientOriginalName();
            $upload_image->storeAs('public', $picName);
            $milestone->pic=$picName;
        }
        $milestone->save();
    }
    public function edit(milestone $milestone){
        $datas=array
        (
            "milestone"  => $milestone,
            "lang"      => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function update(Request $request,milestone $milestone){
        $milestone->active  = request('active')? 1:0 ;
        $milestone->title   = request('title');
        $milestone->body    = request('body');
        $milestone->date    = request('date');
        $milestone->lang    = request('lang');
        $milestone->order   = request('order');
        //save pic path
        if($request->pic){
            $upload_image=$request->pic;
            $picName = time().'.'.$upload_image->getClientOriginalName();
            $upload_image->storeAs('public', $picName);
            $milestone->pic=$picName;
        }
        $milestone->save();
    }
    public function order_update(Request $request){
        if($request->order){
            $orders = explode(',', $request->order);
            $i=0;
            foreach($orders as $order){
                $temp = milestone::find($order);
                $temp->order=$i;
                $i++;
                $temp->save();
            } 
        }
    }
}