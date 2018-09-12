<?php
namespace App\Http\Repositories\Frontend;

use App\article;
use App\category;
use App\extra_sub_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Cookie;
use Session;


class ArticleRepository{
    protected $article;

    public function __construct(Article $article){
        $this->article=$article;
    }

    public function getArticleResult($length = null , $category = null , $sub_category = null 
    , $extra_sub_category = null , $display = null, $pagination = null , $order = false,$lang = "0"){

        $result = article::where('active','1')->where('category',$category);
        $result = $result->where('lang',$lang);
        if($sub_category != null){
            $result = $result->where('sub_category',$sub_category);
        }
        if($extra_sub_category != null){
            if(is_string($extra_sub_category)){
                $extra_sub_category_id = extra_sub_category::where('sub_category_id',$sub_category)->where('en_name',$extra_sub_category)->value('id');
                $result = $result->where('extra_sub_category',$extra_sub_category_id);
            }
            else{
                $result = $result->where('extra_sub_category',$extra_sub_category);
            }
        }
        if($display != null){
            $result = $result->where('display', '1');
        }
        if($pagination != null){
            $result = $result->orderBy('created_at', 'desc')->paginate($pagination);
        }
        else
        {
            $result = $result->orderBy('created_at', 'desc')->take($length)->get();
        }
        return $result;
    }
    public function getArticleResultByExtraSubCategoryName($sub_category = null, $extra_sub_category_en_name = null){

    }
    public function getArticleSpecial($length = null, $pagination = null){
        $result = article::where('active','1')->where('category','1')->where('special','1');
        if($pagination != null){
            $result = $result->orderBy('order', 'asc')->paginate($pagination);
        }
        else
        {
            $result = $result->orderBy('created_at', 'asc')->take($length)->get();
        }
        return $result;
    }
    public function getArticleDetail($category =null, $sub_category = null, Article $id){
        $data['category'] = $category;
        $data['sub_category'] = $sub_category;
        $data['article'] = $id;
        return $data;
    }
    public function getTagResult($tag){
        $result = article::where('tags','like','%'.$tag.'%')->paginate(6);
        return $result;
    }
}