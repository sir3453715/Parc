<?php
namespace App\Http\Repositories\Backend;

use App\Donate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Maatwebsite\Excel\Facades\Excel;

use Session;



class DonateRepository{
    protected $donate;

    public function __construct(donate $donate){
        $this->donate=$donate;
    }
    public function index(Request $request){
        $condition=donate::select('*');
        
        if($request->date_start){
            $condition=$condition->where('created_at','>',$request->date_start);
        }
        if($request->date_end){
            $condition=$condition->where('created_at','<',$request->date_end);
        }
        if($request->name){
            $condition=$condition->where('name',$request->name);
        }
        if($request->account){
            $condition=$condition->where('account',$request->account);
        }
        if($request->show_all){
            $condition=$condition->get();
        }
        else{
            $condition=$condition->paginate(30);
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

                $results = $reader->get();
                $results->toArray();
                $count=0;
                //$results = $reader->all();
                foreach($results as $result){
                    $donate=new \App\Donate;
                    $donate->name=$result["name"];
                    $donate->account=$result["account"];
                    $donate->amount=$result["amount"];
                    $donate->transaction_time=$result["transaction_time"];
                    $donate->save();
                    $count++;
                }
                $GLOBALS['count']=$count;

            });
            return $GLOBALS['count'];
        }

    }
}