<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Frontend as Repo;
use App\article;
use App;



class ArticleController extends Controller
{
    //
    public $articleRepo;

    public function __construct(Repo\ArticleRepository $articleRepo){
        $this->articleRepo = $articleRepo;
    }
    public function getArticleDetail($category = null, $sub_category = null, Article $id){
        App::setLocale("tw");
        $data = $this->articleRepo->getArticleDetail($category, $sub_category, $id);
        return view('frontend.story.detail',$data);
    }
}
