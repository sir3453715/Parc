<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

use Session;

use App\category;
use App\sub_category;
use App\extra_sub_category;


use App\Http\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    //
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository){
        $this->categoryRepository=$categoryRepository;
    }
    public function create()
    {
        $datas=$this->categoryRepository->create();
        return view('category.create', [
            'datas'            => $datas,
        ]);
        return redirect('/backend/category');
    }
    public function store(Request $request)
    {
        $messages = [
            //'shopname.required' => '線上商店名稱未輸入',
            'category_input.unique' => '主分類名稱重覆',
            'category_input.required_without'=>'請輸入或選擇主分類',
            'sub_category_input.required_without_all'=>'請輸入或選擇次分類',
            'sub_category_input.unique'=>'次分類名稱重覆',
            'sub_category.required_without_all'=>'請輸入或選擇次分類',
            'extra_sub_category_input.required_with'=>'請輸入特別分類',
            'extra_sub_category_input.unique'=>'特別分類名稱重覆',            
        ];
        $validate = Validator::make($request->all(), [
            'category_input' => 'unique:category,name|required_without:category_select|max:15',
            'sub_category' =>'required_without_all:sub_category_input,category_input|max:15',
            'sub_category_input' =>
                [
                    'required_without_all:sub_category,category_input',
                    'max:15',
                    // 此規則為避免名稱重覆            
                    Rule::unique('sub_category','name')->where(function($query) use($request){
                    return $query->where('category_id',$request->category_select)
                    ->where('name',$request->sub_category_input);
                    })
                ],
            'extra_sub_category_input'=> 
                [
                    'required_with:sub_category',
                    'max:15',
                    Rule::unique('extra_sub_category','name')
                    ->where(function($query) use($request){
                        return $query->where('sub_category_id',$request->sub_category)
                        ->where('name',$request->extra_sub_category_input);
                    })
                ],           
        ], $messages);
        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $input=$this->categoryRepository->store($request);
            return redirect('/backend/category')->with('success','Category Created');
        }
    }
    public function index(Request $request){
        $datas=$this->categoryRepository->index($request);
        return view('category.index',[
            'datas'     =>$datas,
        ]);
    }
    public function editCategory(category $category)
    {
        return view('category.editCategory',[
            'category'=>$category,
        ]);
    }
    public function editSubCategory(sub_category $sub_category)
    {
        return view('category.editSubCategory',[
            'sub_category'=>$sub_category,
        ]);
    }
    public function editExtraSubCategory(extra_sub_category $extra_sub_category)
    {
        return view('category.editExtraSubCategory',[
            'extra_sub_category'=>$extra_sub_category,
        ]);
    }
    public function updateSubCategory(Request $request,sub_category $sub_category){
        $messages = [
            'name.unique' => '分類名稱重覆',
            'en_name.unique' => '英文分類名稱重覆',
        ];
        $validate = Validator::make($request->all(), [
            'name'  => Rule::unique('sub_category')->ignore($sub_category->id),
            'en_name'  =>
                [
                    'nullable',
                    Rule::unique('sub_category')->ignore($sub_category->id),
                ]
            ], $messages);
                
        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $datas=$this->categoryRepository->updateSubCategory($request,$sub_category);
            return redirect('/backend/category');
        }
    }
    public function updateExtraSubCategory(Request $request,extra_sub_category $extra_sub_category){
        $messages = [
            'name.unique' => '分類名稱重覆',
            'en_name.unique' => '英文分類名稱重覆',
        ];
        $validate = Validator::make($request->all(), [
            'name'  => Rule::unique('extra_sub_category')->ignore($extra_sub_category->id),
            'en_name'  =>
                [
                    'nullable',
                    Rule::unique('extra_sub_category')->ignore($extra_sub_category->id),
                ]
            ], $messages);
                
        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $datas=$this->categoryRepository->updateExtraSubCategory($request,$extra_sub_category);
            return redirect('/backend/category');
        }
    }
    public function updateCategory(Request $request,category $category){
        $messages = [
            'name.unique' => '分類名稱重覆',
            'en_name.unique' => '英文分類名稱重覆',
        ];
        $validate = Validator::make($request->all(), [
            'name'  => Rule::unique('category')->ignore($category->id),
            'en_name'  =>
                [
                    'nullable',
                    Rule::unique('category')->ignore($category->id),
                ]
            ], $messages);
                
        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $datas=$this->categoryRepository->updateCategory($request,$category);
            return redirect('/backend/category');
        }
    }
    public function destroyCategory(category $category){
        $category->delete();
        Session::flash('msg', 'Category Deleted');
        return back();
    }
    public function destroySubCategory(sub_category $sub_category){
        $sub_category->delete();
        Session::flash('msg', 'Sub Category Deleted');
        return back();
    }
    public function destroyExtraSubCategory(extra_sub_category $extra_sub_category){
        if($extra_sub_category->pic){
            Storage::delete('public/'.$extra_sub_category->pic);
        }
        $extra_sub_category->delete();
        Session::flash('msg', 'Extra Sub Category Deleted');
        return back();
    }
    public function delete_selected(Request $request){
        $count= $this->categoryRepository->delete_selected($request);
        return back()->with('success', $count.' categories deleted');
    }
}
