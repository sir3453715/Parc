<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Frontend as Repo;


class IndexController extends Controller
{
    //
    public $articleRepo;

    public function __construct(Repo\ArticleRepository $articleRepo, Repo\IndexRepository $indexRepo){
        $this->articleRepo = $articleRepo;
        $this->indexRepo = $indexRepo;
    }

    public function index(){
        // $length = null ,$category = null ,$sub_category = null 
        // ,$extra_sub_category = null ,$pagination = null ,$order = false
        $data['slider'] = $this->articleRepo->getArticleResult(6,5);
        $data['banner'] = $this->indexRepo->getBannerResult(4);
        $data['quote'] = $this->indexRepo->getQuoteResult(4);
        $data['partner'] = $this->indexRepo->getPartnerResult();
        return view('frontend.index',$data);
    }
}
