<?php
namespace App\Http\Repositories\Frontend;

use App\milestone;
use App\extra_sub_category;
use App\lecturer;
use App\ContactForm;
use App\faq;
use App\donate;
use App\AboutMilestone;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


use Cookie;
use Session;


class OtherRepository{
    protected $milestone;
    protected $extra_sub_category;
    protected $lecturer;

    public function __construct(milestone $milestone, extra_sub_category $extra_sub_category, lecturer $lecturer){
        $this->milestone = $milestone;
        $this->extra_sub_category = $extra_sub_category;
        $this->lecturer = $lecturer;
    }

    public function getMilestoneResult($lang = "0"){
        $result = milestone::where('active','1');
        $result = $result->where('lang',$lang);
        $result = $result->orderBy('order', 'asc')->get();
        return $result;
    }
    public function getAboutMilestoneResult($lang = "0"){
        $result = AboutMilestone::where('active','1');
        $result = $result->where('lang',$lang);
        $result = $result->orderBy('order', 'asc')->get();
        return $result;
    }
    public function getExtraSubCategory($sub_category){
        $result = extra_sub_category::where('active','1')->where('sub_category_id',$sub_category)->orderBy('order', 'asc')->get();
        return $result;
    }
    public function getLecturerResult($lang = "0"){
        $result = lecturer::where('active','1');
        $result = $result->where('lang',$lang);
        $result = $result->orderBy('order', 'asc')->paginate(6);
        return $result;
    }
    public function StoreLecturerRequest(Request $request){
        $messages = [
            'name.required' => '請輸入您的名字',
            'name.max' => '名字過長，請重新輸入',
            'email.required_without' => '請輸入您的電子信箱或聯絡電話',
            'email.max' => '電子信箱過長，請重新輸入',
            'phone.max' => '聯絡電話過長，請重新輸入',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required_without:phone|max:191',
            'phone' => 'max:20',
            
        ], $messages);

        if ($validate->fails()) {
            return redirect('event/lecturer/')
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $contact_form = new ContactForm;
            $contact_form->name = $request->name;
            $contact_form->email = $request->email;
            $contact_form->phone = $request->phone;
            $contact_form->body = $request->body;
            $contact_form->save();
            return redirect('event/lecturer/');
        }

    }
    public function getFirstExtraSubCategory($sub_category_id){
        return extra_sub_category::where('sub_category_id',$sub_category_id)->first()->en_name;
    }
    public function getFaqResult($lang = "0"){
        $result = faq::where('active','1');
        $result = $result->where('lang',$lang);
        $result = $result->orderBy('order', 'asc')->get();
        return $result;
    }
    public function getDonateList(Request $request){
        $messages = [
            'name.required_without_all'         => '請輸入姓名或公司行號名稱',
            'email.required_without_all'        => '請輸入Email',
            'receipt_id.required_without_all'   => '請輸入收據編號',
        ];
        $validate = Validator::make($request->all(), [
            'name'          => 'required_without_all:name,email,receipt_id',
            'email'         => 'required_without_all:name,email,receipt_id',
            'receipt_id'    => 'required_without_all:name,email,receipt_id',
            
        ], $messages);

        if ($validate->fails()) {
            redirect('donate/inquiry/')->withInput($request->all)->withErrors($validate);
        }
        else{
            $result = new donate;
            if($request->name){
                $result = $result->where('name',$request->name);
            }
            if($request->email){
                $result = $result->where('email',$request->email);
            }
            if($request->receipt_id){
                $result = $result->where('receipt_id',$request->receipt_id);
            }
            if($request->date_start && $request->date_end && ($request->name || $request->email || $request->receipt_id)){
                $result = $result->where('transaction_time','>',$request->date_start);
                $result = $result->where('transaction_time','<',$request->date_end);
            }
            $result = $result->orderBy('transaction_time', 'asc')->get();
            return $result;
        }
    }
    public function getDonateLastUpdatedDate(){
        return donate::orderBy('created_at','desc')->first()->value('created_at');
    }
}