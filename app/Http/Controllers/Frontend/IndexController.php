<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


use App\Http\Repositories\Frontend as Repo;
use App\article;
use App;



class IndexController extends Controller
{
    //
    public $articleRepo, $indexRepo, $otherRepo;

    public function __construct(Repo\ArticleRepository $articleRepo, 
    Repo\IndexRepository $indexRepo, Repo\OtherRepository $otherRepo)
    {
        $this->articleRepo = $articleRepo;
        $this->indexRepo = $indexRepo;
        $this->otherRepo = $otherRepo;
    }

    public function index(){
        // $length = null ,$category = null ,$sub_category = null 
        // ,$extra_sub_category = null ,$pagination = null ,$order = false
        $data['slider'] = $this->articleRepo->getArticleResult(6,5);
        $data['banner'] = $this->indexRepo->getBannerResult(4);
        $data['quote'] = $this->indexRepo->getQuoteResult(4);
        $data['partner'] = $this->indexRepo->getPartnerResult();
        $data['video'] = $this->indexRepo->getVideo();
        return view('frontend.index',$data);
    }

    public function storyIndex($type = null,Request $request){
        //     $length = null , $category = null , $sub_category = null 
        // , $extra_sub_category = null , $display = null, $pagination = null , $order = false
        $data['slider'] = $this->articleRepo->getArticleResult(4,1,null,null,true);
        $data['type'] = $type;
        if($data['type'] == null){
            $data['type'] = "special";
        }
        if($data['type'] == 'special'){
            //精選特輯
            $data['article_list'] = $this->articleRepo->getArticleSpecial(null,6);
        }
        else if($data['type'] == 'love'){
            //親愛劇場
            $data['article_list'] = $this->articleRepo->getArticleResult(null,1,1,null,null,6);
        }
        else if($data['type'] == 'doctor'){
            //白袍時間
            $data['article_list'] = $this->articleRepo->getArticleResult(null,1,2,null,null,6);
        }
        else if($data['type'] == 'life'){
            //生死迷藏
            $data['article_list'] = $this->articleRepo->getArticleResult(null,1,3,null,null,6);
        }
        else if($data['type'] == 'expert'){
            //為自己發聲
            $data['article_list'] = $this->articleRepo->getArticleResult(null,1,4,null,null,6);
        }
        else if($data['type'] == 'story'){
            //私房故事
            $data['article_list'] = $this->articleRepo->getArticleResult(null,1,5,null,null,6);
        }
        else{
            //精選特輯
            $data['article_list'] = $this->articleRepo->getArticleSpecial(null,6);
        }
        return view('frontend.story.index',$data);
    }

    public function loveIndex($type = null, Request $request) {
        if($type == null){
            $type = $this->otherRepo->getFirstExtraSubCategory(20);
        }
        $data['type'] = $type;
        $data['slider'] = $this->articleRepo->getArticleResult(4,6,20,null,true);
        $data['article_list'] = $this->articleRepo->getArticleResult(null,6,20,$type,null,6);
        $data['course_extra_sub_category'] = $this->otherRepo->getExtraSubCategory(20);
        return view('frontend.love.index',$data);
    }

    public function eventIndex(Request $request){
        $data['slider'] = $this->articleRepo->getArticleResult(4,2,null,null,true);
        $data['course_article_list'] = $this->articleRepo->getArticleResult(6,2,6,null,null);
        $data['lecturer_list'] = $this->otherRepo->getLecturerResult();
        $data['video_article_list'] = $this->articleRepo->getArticleResult(6,2,8,null,null);
        $data['lohas_extra_sub_category'] = $this->otherRepo->getExtraSubCategory(9);
        foreach($data['lohas_extra_sub_category'] as $key){
            $data['lohas'][$key->en_name] = $this->articleRepo->getArticleResult(3,2,9,$key->id);
        }
        // dd($data);
        //抓有幾個知識工具/下載特殊分類再丟articlelist
        return view('frontend.event.index',$data);
    }
    public function eventCourseIndex($type = null, Request $request){
        if($type == null){
            $type = $this->otherRepo->getFirstExtraSubCategory(6);
        }
        $data['type'] = $type;
        $data['slider'] = $this->articleRepo->getArticleResult(4,2,6,null,true);
        $data['article_list'] = $this->articleRepo->getArticleResult(null,2,6,$type,null,6);
        $data['course_extra_sub_category'] = $this->otherRepo->getExtraSubCategory(6);
        return view('frontend.event.course',$data);
    }
    public function eventLecturerIndex(Request $request){
        $data['lecturer_list'] = $this->otherRepo->getLecturerResult();
        return view('frontend.event.lecturer',$data);
    }
    public function eventLecturerPost(Request $request){
        $this->otherRepo->StoreLecturerRequest($request);
        return back();
    }
    public function eventVideoIndex($type = null, Request $request){
        if($type == null){
            $type = $this->otherRepo->getFirstExtraSubCategory(8);
        }
        $data['type'] = $type;
        $data['slider'] = $this->articleRepo->getArticleResult(4,2,8,null,true);
        $data['article_list'] = $this->articleRepo->getArticleResult(null,2,8,$type,null,6);
        $data['video_extra_sub_category'] = $this->otherRepo->getExtraSubCategory(8);
        return view('frontend.event.video',$data);
    }
    public function eventLohasIndex($type = null, Request $request){
        if($type == null){
            $type = $this->otherRepo->getFirstExtraSubCategory(9);
        }
        $data['type'] = $type;
        $data['slider'] = $this->articleRepo->getArticleResult(4,2,9,null,true);
        $data['article_list'] = $this->articleRepo->getArticleResult(null,2,9,$type,null,6);
        $data['lohas_extra_sub_category'] = $this->otherRepo->getExtraSubCategory(9);
        // dd($data);
        return view('frontend.event.lohas',$data);
    }
    public function lawIndex(Request $request){
        $data['law_article_list'] = $this->articleRepo->getArticleResult(null,3,10,"relatedAct");
        $data['policy_extra_sub_category'] = $this->otherRepo->getExtraSubCategory(11);
        foreach($data['policy_extra_sub_category'] as $key){
            $data['policy'][$key->en_name] = $this->articleRepo->getArticleResult(3,3,11,$key->id);
        }
        return view('frontend.law.index',$data);
    }
    public function lawPolicyIndex($type = null, Request $request){
        if($type == null){
            $type = $this->otherRepo->getFirstExtraSubCategory(11);
        }
        $data['type'] = $type;
        $data['article_list'] = $this->articleRepo->getArticleResult(null,3,11,$type,null,6);
        $data['policy_extra_sub_category'] = $this->otherRepo->getExtraSubCategory(11);
        return view('frontend.law.policy',$data);
    }
    public function lawActIndex($type = null,Request $request){
        $data['type'] = $type;
        $data['law_article_list'] = $this->articleRepo->getArticleResult(null,3,10,"relatedAct");
        // $data['test'] = $data['law_article_list']->toJson();
        // dd($data['type']);
        return view('frontend.law.act',$data);
    }
    public function trendIndex(Request $request){
        $data['international_article_list'] = $this->articleRepo->getArticleResult(3,4,12,null,null);
        $data['exchange_article_list'] = $this->articleRepo->getArticleResult(3,4,13,null,null);
        return view('frontend.trend.index',$data);
    }
    public function trendInternationalIndex(Request $request){
        $data['article_list'] = $this->articleRepo->getArticleResult(null,4,12,null,null,6);
        return view('frontend.trend.international',$data);
    }
    public function trendExchangeIndex(Request $request){
        $data['article_list'] = $this->articleRepo->getArticleResult(null,4,13,null,null,6);
        return view('frontend.trend.exchange',$data);
    }
    public function trendNgoIndex(Request $request){
        return view('frontend.trend.ngo');
    }
    public function trendWorldIndex(Request $request){
        $data['milestone'] = $this->otherRepo->getMilestoneResult();
        return view('frontend.trend.world',$data);
    }
    public function newsIndex($type = null,Request $request){
        //     $length = null , $category = null , $sub_category = null 
        // , $extra_sub_category = null , $display = null, $pagination = null , $order = false
        $data['slider'] = $this->articleRepo->getArticleResult(4,5,null,null,true);
        if($request->type == 'center'){
            //中心動態
            $data['article_list'] = $this->articleRepo->getArticleResult(null,5,17,null,null,9);
        }
        else if($request->type == 'law'){
            //法規政策動態
            $data['article_list'] = $this->articleRepo->getArticleResult(null,5,16,null,null,9);
        }
        else if($request->type == 'event'){
            //課程與資源動態
            $data['article_list'] = $this->articleRepo->getArticleResult(null,5,18,null,null,9);
        }
        else if($request->type == 'international'){
            //國際動態
            $data['article_list'] = $this->articleRepo->getArticleResult(null,5,19,null,null,9);
        }
        else{
            //中心動態
            $data['article_list'] = $this->articleRepo->getArticleResult(null,5,17,null,null,9);
        }
        $data['type'] = $type;
        return view('frontend.news.index',$data);
    }
    public function faq(Request $request){
        $data['faq_list'] = $this->otherRepo->getFaqResult();
        return view('frontend.nav.faq',$data);
    }
    public function exercise(Request $request){
        return view('frontend.nav.exercise');
    }
    public function donate(Request $request){
        return view('frontend.nav.donate.index');
    }
    public function donateStory(Request $request){
        return view('frontend.nav.donate.story');
    }
    public function donateInquiry(Request $request){
        $data['cookie'] = $request;
        $data['donate_list'] = null;
        $data['last_updated'] = $this->otherRepo->getDonateLastUpdatedDate();
        return view('frontend.nav.donate.inquiry',$data);
    }
    public function donateInquiryPost(Request $request){
        $messages = [
            'name.required'                     => '請輸入姓名或公司行號名稱',
            'email.required_without_all'        => '請輸入Email',
            'receipt_id.required_without_all'   => '請輸入收據編號',
            'date_start.required_without_all'   => '請輸入捐款日期區間',
            'date_end.required_without_all'     => '請輸入捐款日期區間',
            'date_start.required_with'          => '請輸入結束日期',
            'date_end.required_with'            => '請輸入開始日期',
        ];
        $validate = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required_without_all:receipt_id,date_start,date_end',
            'receipt_id'    => 'required_without_all:email,date_start,date_end',
            'date_start'    => 'required_without_all:email,receipt_id|required_with:date_end',
            'date_end'      => 'required_without_all:email,receipt_id|required_with:date_start',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect('donate/inquiry/')->withInput($request->all)->withErrors($validate);
        }
        else{
            $data['cookie']         =  $request;
            $data['donate_list']    =  $this->otherRepo->getDonateList($request);
            $data['last_updated']   =  $this->otherRepo->getDonateLastUpdatedDate();
        }
        return view('frontend.nav.donate.inquiry',$data);
    }
    public function sitemap(Request $request){
        $data['event_course_list'] = $this->otherRepo->getExtraSubCategory(6);
        $data['event_video_list'] = $this->otherRepo->getExtraSubCategory(8);
        $data['event_lohas_list'] = $this->otherRepo->getExtraSubCategory(9);
        $data['law_policy_list'] = $this->otherRepo->getExtraSubCategory(11);
        return view('frontend.nav.sitemap',$data);
    }
    public function about(Request $request){
        return view('frontend.nav.about.index');
    }
    public function aboutCeo(Request $request){
        return view('frontend.nav.about.ceo');
    }
    public function aboutHistory(Request $request){
        $data['milestone'] = $this->otherRepo->getAboutMilestoneResult();
        return view('frontend.nav.about.history',$data);
    }
    public function aboutOrganization(Request $request){
        return view('frontend.nav.about.organization');
    }
    public function tagResult($tag = null, Request $request){
        $data['article_list'] = $this->articleRepo->getTagResult($tag);
        $data['tag'] = $tag;
        return view('frontend.tag',$data);
    }
}
