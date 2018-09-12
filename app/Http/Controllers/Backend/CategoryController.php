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


use App\Http\Repositories\Backend\CategoryRepository;

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
        return view('backend.category.create', [
            'datas'            => $datas,
        ]);
        return redirect('/backend/category');
    }
    public function store(Request $request)
    {
        $messages = [
            //'shopname.required' => '線上商店名稱未輸入',
            'extra_sub_category_input.required'=>'請輸入特別分類中文名稱 Please input chinese name of extra sub category',
            'extra_sub_category_input.max'=>'特別分類中文名稱最多十五字 Max character of extra sub category is 15, please try a different name',
            'extra_sub_category_input.unique'=>'特別分類名稱重覆 Duplicate name of extra sub category',
            'extra_sub_category_input_english.required' => '請輸入特別分類英文名稱 Please input english name of extra sub category'            
        ];
        $validate = Validator::make($request->all(), [
            'extra_sub_category_input'=> 
                [
                    'required',
                    'max:15',
                    Rule::unique('extra_sub_category','name')
                    ->where(function($query) use($request){
                        return $query->where('sub_category_id',$request->sub_category)
                        ->where('name',$request->extra_sub_category_input);
                    })
                ],
            'extra_sub_category_input_english' => 'required',           
        ], $messages);
        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $input=$this->categoryRepository->store($request);
            return redirect('/backend/category')->with('success','資料新增成功! Data created successfully');
        }
    }
    public function index(Request $request){
        $datas=$this->categoryRepository->index($request);
        return view('backend.category.index',[
            'datas'     =>$datas,
        ]);
    }
    public function editCategory(category $category)
    {
        return view('backend.category.editCategory',[
            'category'=>$category,
        ]);
    }
    public function editSubCategory(sub_category $sub_category)
    {
        return view('backend.category.editSubCategory',[
            'sub_category'=>$sub_category,
        ]);
    }
    public function editExtraSubCategory(extra_sub_category $extra_sub_category)
    {
        return view('backend.category.editExtraSubCategory',[
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
        return back()->with('success','資料已刪除 Data Deleted');
    }
    public function delete_selected(Request $request){
        $count= $this->categoryRepository->delete_selected($request);
        return back()->with('success','資料已刪除 Data Deleted');
    }
}
