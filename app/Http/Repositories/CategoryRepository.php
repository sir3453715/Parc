<?php
namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Cookie;

use App\category;
use App\sub_category;
use App\extra_sub_category;



class CategoryRepository{
    public function index(Request $request){
    
        $condition["category"]=true;
        $condition["sub_category"]=false;
        $condition["extra_sub_category"]=false;
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $request->category = ($request->cookie('category')) ? $request->cookie('category') : $request->category;
        }
        else{
            if($request->category=="主分類"){
                $condition["category"]=true;
                $condition["sub_category"]=false;
                $condition["extra_sub_category"]=false;
            }
            if($request->category=="次分類"){
                $condition["category"]=false;
                $condition["sub_category"]=true;
                $condition["extra_sub_category"]=false;
            }
            if($request->category=="特別分類"){
                $condition["category"]=false;
                $condition["sub_category"]=false;
                $condition["extra_sub_category"]=true;
            }
            if($request->category=="全部"){
                $condition["category"]=true;
                $condition["sub_category"]=true;
                $condition["extra_sub_category"]=true;
            }
            Cookie::queue('category', $request->category, 60);
        }
        $datas=array(          
            "categories"                => \App\category::all(),
            "sub_categories"            => \App\sub_category::all(),
            "extra_sub_categories"      => \App\extra_sub_category::all(),
            "condition"                 => $condition,
            "cookie"                    => $request,
        );
        
        return $datas;
    }
    public function create(){
        $datas=array(
            "categories"                => DB::table('category')->get(),
            "sub_categories"            => DB::table('sub_category')->get(),
            "extra_sub_categories"      => DB::table('extra_sub_category')->get(),
            "lang"                      => DB::table('lang')->get()
        );
        return $datas;
    }
    public function store(Request $request){
        $category=          new \App\category;
        $sub_category=      new \App\sub_category;
        $extra_sub_category=new \App\extra_sub_category;

        if($request->filled('category_select')){
            if($request->filled('sub_category')){
                //store extrasubcategory_input
                $extra_sub_category->name=$request->input('extra_sub_category_input');
                $extra_sub_category->en_name=$request->input('extra_sub_category_input_english');
                $extra_sub_category->sub_category_id=$request->input('sub_category');
                $extra_sub_category->description=$request->input('extra_sub_category_description');
                $extra_sub_category->order=$request->input('order');
                if($request->pic){
                    $upload_image=$request->pic;
                    $picName = time().'.'.$upload_image->getClientOriginalName();
                    $upload_image->storeAs('public', $picName);
                    $extra_sub_category->pic=$picName;
                }
                $extra_sub_category->save();
            }
            else{
                if($request->filled('extra_sub_category_input')){
                    //store sub_input
                    $sub_category->name=$request->input('sub_category_input');
                    $sub_category->en_name=$request->input('sub_category_input_english');
                    $sub_category->category_id=$request->input('category_select');
                    $sub_category->save();
                    //store extra_sub
                    $extra_sub_category->name=$request->input('extra_sub_category_input');
                    $extra_sub_category->en_name=$request->input('extra_sub_category_input_english');
                    $extra_sub_category->sub_category_id=$sub_category->id;
                    $extra_sub_category->description=$request->input('extra_sub_category_description');
                    $extra_sub_category->order=$request->input('order');
                    if($request->pic){
                        $upload_image=$request->pic;
                        $picName = time().'.'.$upload_image->getClientOriginalName();
                        $upload_image->storeAs('public', $picName);
                        $extra_sub_category->pic=$picName;
                    }
                    $extra_sub_category->save();
                }
                else{
                    //store sub_input
                    $sub_category->name=$request->input('sub_category_input');
                    $sub_category->en_name=$request->input('sub_category_input_english');
                    $sub_category->category_id=$request->input('category_select');
                    $sub_category->save();
                }
            }
        }
        else{
            //store category_input
            $category->name=$request->input('category_input');
            $category->en_name=$request->input('category_input_english');
            $category->save();            
            if($request->filled('sub_category_input')){
                //store sub-input
                $sub_category->name=$request->input('sub_category_input');
                $sub_category->en_name=$request->input('sub_category_input_english');
                $sub_category->category_id=$category->id;
                $sub_category->save();
                if($request->filled('extra_sub_category_input')){
                    //store extrasub input
                    $extra_sub_category->name=$request->input('extra_sub_category_input');
                    $extra_sub_category->en_name=$request->input('extra_sub_category_input_english');
                    $extra_sub_category->sub_category_id=$sub_category->id;
                    $extra_sub_category->description=$request->input('extra_sub_category_description');
                    $extra_sub_category->order=$request->input('order');
                    if($request->pic){
                        $upload_image=$request->pic;
                        $picName = time().'.'.$upload_image->getClientOriginalName();
                        $upload_image->storeAs('public', $picName);
                        $extra_sub_category->pic=$picName;
                    }
                    $extra_sub_category->save();
                }
            }
        }
        $input=$request->all();
        return $input;
    }
    public function updateCategory(Request $request,category $category){
        $category->active=request('active')? 1:0;
        $category->name=request('name');
        $category->en_name=request('en_name');
        $category->save();
    }
    public function updateSubCategory(Request $request,sub_category $sub_category){
        $sub_category->active=request('active')? 1:0;
        $sub_category->name=request('name');
        $sub_category->en_name=request('en_name');
        $sub_category->save();
    }
    public function updateExtraSubCategory(Request $request,extra_sub_category $extra_sub_category){
        $extra_sub_category->active=request('active')? 1:0;
        $extra_sub_category->name=request('name');
        $extra_sub_category->en_name=request('en_name');
        $extra_sub_category->description=request('extra_sub_category_description');
        $extra_sub_category->pic=request('pic');
        if($request->pic){
            $upload_image=$request->pic;
            $picName = time().'.'.$upload_image->getClientOriginalName();
            $upload_image->storeAs('public', $picName);
            $extra_sub_category->pic=$picName;
        }
        $extra_sub_category->order=request('order');
        $extra_sub_category->save();
    }
    public function delete_selected(Request $request){
        $count=0;
        if($request->category_delete_id){
            foreach($request->category_delete_id as $data){
                $category= category::find($data);
                $category->delete();
                $count++;
                
            }
        }
        if($request->sub_category_delete_id){   
            foreach($request->sub_category_delete_id as $data){
                $sub_category= sub_category::find($data);
                $sub_category->delete();
                $count++;


        }
        }
        if($request->extra_sub_category_delete_id){
            foreach($request->extra_sub_category_delete_id as $data){
                $extra_sub_category= extra_sub_category::find($data);
                $extra_sub_category->delete();
                $count++;

            }
        }
        return $count;
    }
}