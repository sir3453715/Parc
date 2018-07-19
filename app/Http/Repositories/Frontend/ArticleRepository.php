<?php
namespace App\Http\Repositories\Frontend;

use App\article;
use App\category;
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

    public function getArticleResult($length = null ,$category = null ,$sub_category = null 
    ,$extra_sub_category = null ,$pagination = null ,$order = false){
        $result = article::where('active','1')->where('category',$category);
        if($sub_category != null){
            $result = $result->where('sub_category',$sub_category);
        }
        if($extra_sub_category != null){
            $result = $result->where('extra_sub_category',$extra_sub_category);
        }
        if($pagination != null){
            $result = $result->paginate($pagination);
        }
        else
        {
            $result = $result->orderBy('created_at', 'desc')->take($length)->get();
        }
        return $result;
    }
}