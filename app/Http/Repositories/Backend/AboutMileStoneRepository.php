<?php
namespace App\Http\Repositories\Backend;

use App\AboutMilestone;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AboutMilestoneRepository{
    protected $about_milestone;

    public function __construct(AboutMilestone $about_milestone){
        $this->about_milestone=$about_milestone;
    }
    public function index(){
        return AboutMilestone::all()->sortBy("order");
    }
    public function create(){
        $datas=array(
            "lang"  => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function store(Request $request){
        $about_milestone=AboutMilestone::create([
            'active'    =>request('active') ? 1:0,
            'title'     =>request('title'),
            'body'      =>request('body'),
            'date'      =>request('date'),
            'lang'      =>request('lang'),
            'order'     =>(AboutMilestone::latest()->value("order")+1)
        ]);
        if($request->pic){
            $about_milestone->pic = Storage::disk('public')->putFile('aboutmilestone', $request->pic);
            // $upload_image=$request->pic;
            // $picName = time().'.'.$upload_image->getClientOriginalName();
            // $upload_image->storeAs('public/aboutmilestone', $picName);
            // $about_milestone->pic='aboutmilestone/'.$picName;
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
        // $about_milestone->order   = request('order');
        //save pic path
        if($request->pic){
            Storage::delete('public/'.$about_milestone->pic);
            $about_milestone->pic = Storage::disk('public')->putFile('aboutmilestone', $request->pic);
            // $upload_image=$request->pic;
            // $picName = time().'.'.$upload_image->getClientOriginalName();
            // $upload_image->storeAs('public/aboutmilestone', $picName);
            // $about_milestone->pic='aboutmilestone/'.$picName;
        }
        $about_milestone->save();
    }
    public function order_update(Request $request){
        if($request->order){
            $orders = explode(',', $request->order);
            $i=0;
            foreach($orders as $order){
                $temp = AboutMilestone::find($order);
                $temp->order=$i;
                $i++;
                $temp->save();
            } 
        }
    }
}