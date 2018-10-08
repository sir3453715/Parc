<?php
namespace App\Http\Repositories\Backend;

use App\partner;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PartnerRepository{
    protected $partner;

    public function __construct(partner $partner){
        $this->partner=$partner;
    }
    public function index(){
        return partner::all()->sortBy("order");
    }
    public function store(Request $request){
        $partner=partner::create([
            'active'    =>request('active') ? 1:0,
            'title'     =>request('title'),
            'order'     =>(partner::latest()->value("order")+1)
        ]);
        //save pic path
        if($request->pic){
            $partner->pic = Storage::disk('public')->putFile('partner', $request->pic);
            // $upload_image=$request->pic;
            // $picName = time().'.'.$upload_image->getClientOriginalName();
            // $upload_image->storeAs('public/partner', $picName);
            // $partner->pic='partner/'.$picName;
            $partner->save();
        }
    }
    public function update(Request $request,partner $partner){
        $partner->active  = request('active')? 1:0 ;
        $partner->title   = request('title');
        if($request->pic){
            if($partner->pic){
                Storage::delete('public/'.$partner->pic);
            }
            $partner->pic = Storage::disk('public')->putFile('partner', $request->pic);
            // $upload_image=$request->pic;
            // $picName = time().'.'.$upload_image->getClientOriginalName();
            // $upload_image->storeAs('public/partner', $picName);
            // $partner->pic='partner/'.$picName;
        }
        $partner->save();
    }
    public function orderUpdate(Request $request){
        if($request->order){
            $orders = explode(',', $request->order);
            $i=0;
            foreach($orders as $order){
                $temp = partner::find($order);
                $temp->order=$i;
                $i++;
                $temp->save();
            } 
        }
    }
}