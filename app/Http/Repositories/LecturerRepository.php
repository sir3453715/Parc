<?php
namespace App\Http\Repositories;

use App\Lecturer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LecturerRepository{
    protected $lecturer;

    public function __construct(Lecturer $lecturer){
        $this->lecturer=$lecturer;
    }
    public function index(){
        return lecturer::all();
    }
    public function create(){
        $datas=array(
            "lang"  => DB::table('lang')->get()
        );
        return $datas;
    }
    public function store(Request $request){
        $lecturer=lecturer::create([
            'active'           =>request('active') ? 1:0,
            'name'             =>request('name'),
            'title'        =>request('title'),
            'body'             =>request('body'),
            'lang'             =>request('lang'),
        ]);
        if($request->pic){
            $upload_image=$request->pic;
            $picName = time().'.'.$upload_image->getClientOriginalName();
            $upload_image->storeAs('public', $picName);
            $lecturer->pic=$picName;
        }
        $lecturer->save();
    }
    public function edit(lecturer $lecturer){
        $datas=array
        (
            "lecturer"  => $lecturer,
            "lang"      => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function update(Request $request,lecturer $lecturer){
        $lecturer->active           = request('active')? 1:0 ;
        $lecturer->name             = request('name');
        $lecturer->title            = request('title');
        $lecturer->body             = request('body');
        $lecturer->lang             = request('lang');

        //save pic path
        if($request->pic){
            $upload_image=$request->pic;
            $picName = time().'.'.$upload_image->getClientOriginalName();
            $upload_image->storeAs('public', $picName);
            $lecturer->pic=$picName;
            $lecturer->save();
        }
        else{
            $lecturer->save();
        }
    }
    public function order_update(Request $request){
        if($request->order){
            $orders = explode(',', $request->order);
            $i=0;
            foreach($orders as $order){
                $temp = Lecturer::find($order);
                $temp->order=$i;
                $i++;
                $temp->save();
            } 
        }
    }
}