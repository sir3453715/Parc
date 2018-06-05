<?php
namespace App\Http\Repositories;

use App\Lecturer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
            'category'         =>request('category'),
            'category_detail'  =>request('category_detail'),
            'job_title'        =>request('job_title'),
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
        $lecturer->category         = request('category');
        $lecturer->category_detail  = request('category_detail');
        $lecturer->job_title        = request('job_title');
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
}