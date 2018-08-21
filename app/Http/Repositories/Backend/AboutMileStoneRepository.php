<?php
namespace App\Http\Repositories\Backend;

use App\AboutMileStone;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AboutMileStoneRepository{
    protected $about_milestone;

    public function __construct(AboutMileStone $about_milestone){
        $this->about_milestone=$about_milestone;
    }
    public function index(){
        return AboutMileStone::all()->sortBy("order");
    }
    public function create(){
        $datas=array(
            "lang"  => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function store(Request $request){
        $about_milestone=AboutMileStone::create([
            'active'    =>request('active') ? 1:0,
            'title'     =>request('title'),
            'body'      =>request('body'),
            'date'      =>request('date'),
            'lang'      =>request('lang'),
            'order'     =>(AboutMileStone::latest()->value("order")+1)
        ]);
        if($request->pic){
            $upload_image=$request->pic;
            $picName = time().'.'.$upload_image->getClientOriginalName();
            $upload_image->storeAs('public', $picName);
            $about_milestone->pic=$picName;
        }
        $about_milestone->save();
    }
    public function edit(AboutMileStone $about_milestone){
        $datas=array
        (
            "milestone"  => $about_milestone,
            "lang"      => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function update(Request $request,AboutMileStone $about_milestone){
        $about_milestone->active  = request('active')? 1:0 ;
        $about_milestone->title   = request('title');
        $about_milestone->body    = request('body');
        $about_milestone->date    = request('date');
        $about_milestone->lang    = request('lang');
        $about_milestone->order   = request('order');
        //save pic path
        if($request->pic){
            $upload_image=$request->pic;
            $picName = time().'.'.$upload_image->getClientOriginalName();
            $upload_image->storeAs('public', $picName);
            $about_milestone->pic=$picName;
        }
        $about_milestone->save();
    }
    public function order_update(Request $request){
        if($request->order){
            $orders = explode(',', $request->order);
            $i=0;
            foreach($orders as $order){
                $temp = AboutMileStone::find($order);
                $temp->order=$i;
                $i++;
                $temp->save();
            } 
        }
    }
}