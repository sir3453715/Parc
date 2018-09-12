<?php
namespace App\Http\Repositories\Backend;

use App\Donate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;


use Session;



class DonateRepository{
    protected $donate;

    public function __construct(donate $donate){
        $this->donate=$donate;
    }
    public function index(Request $request){
        $condition=donate::select('*');
        
        if($request->date_start){
            $condition=$condition->where('transaction_time','>',$request->date_start);
        }
        if($request->date_end){
            $condition=$condition->where('transaction_time','<',$request->date_end);
        }
        if($request->name){
            $condition=$condition->where('name',$request->name);
        }
        if($request->receipt_id){
            $condition=$condition->where('receipt_id',$request->receipt_id);
        }
        if($request->show_all){
            $condition=$condition->orderBy('updated_at','desc')->get();
        }
        else{
            $condition=$condition->orderBy('updated_at','desc')->paginate(30);
        }
        // $datas=array(
        //     "donate"   => $condition,
        //     "cookie"   => $request,
        // );
        return $condition;

    }
    public function create(){
        $datas=array(
            "lang"  => DB::table('lang')->get(),
        );
        return $datas;
    }
    public function store(Request $request){
        if($request->excel){
            // $upload_excel=$request->excel;
            // $excelName = time().'.'.$upload_excel->getClientOriginalName();
            // $upload_excel->storeAs('donate', $excelName);
            

            $results=Excel::load($request->excel, function($reader) {
                $reader->noHeading();
                $reader->skipRows(1);
                $results = $reader->get();
                $results->toArray();
                $new_count=0;
                $modify_count=0;
                foreach($results as $result){
                    //if receipt id duplicate
                    if(donate::where('receipt_id', $result[4])->exists()){
                        $duplicate = donate::where('receipt_id', $result[4])->latest()->first();
                        $duplicate->name=$result[0];
                        $duplicate->email=$result[1];
                        $duplicate->phone=$result[2];
                        $duplicate->transaction_time=Carbon::createFromFormat('Ymd', $result[3])->toDateString();
                        $duplicate->amount=$result[5];
                        $duplicate->created_at = new \DateTime();
                        $duplicate->save();
                        $modify_count++;
                    }
                    else{
                        $donate=new \App\Donate;
                        $donate->name=$result[0];
                        $donate->email=$result[1];
                        $donate->phone=$result[2];
                        $donate->transaction_time=Carbon::createFromFormat('Ymd', $result[3])->toDateString();
                        $donate->receipt_id=$result[4];
                        $donate->amount=$result[5];
                        $donate->save();
                        $new_count++;
                    }
                }
                $GLOBALS['new_count']=$new_count;
                $GLOBALS['modify_count']=$modify_count;

            },'UTF-8');
            return $GLOBALS;
        }

    }
    public function update(Request $request, Donate $donate)
    {
        //
        $donate->name               = request('name');
        $donate->email              = request('email');
        $donate->phone              = request('phone');
        $donate->transaction_time   = request('transaction_time');
        $donate->receipt_id         = request('receipt_id');
        $donate->amount             = request('amount');
        $donate->created_at         = new \DateTime();
        $donate->save();
    }
}