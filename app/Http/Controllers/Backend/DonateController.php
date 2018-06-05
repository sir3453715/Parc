<?php

namespace App\Http\Controllers\Backend;

use App\Donate;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Repositories\DonateRepository;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Validator;


use Session;

class DonateController extends Controller
{
    protected $DonateRepository;
    
    public function __construct(DonateRepository $donateRepository){
        $this->donateRepository=$donateRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        $datas=$this->donateRepository->index($request);
                
        return view('donate.index', [
            'datas' => $datas,
            'cookie'=> $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $messages = [
            //'shopname.required' => '線上商店名稱未輸入',
            'excel.required' => '請上傳檔案',
            'excel.file' => '請上傳檔案',
            'excel.mimes' => '僅支援xls,xlsx或其他excel格式',            
        ];
        $validate = Validator::make($request->all(),
        [
            'excel'=>'required|file|mimes:xls,xlsx'
        ], $messages);
        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $count=$this->donateRepository->store($request);
            return redirect('/backend/donate')->with('success',$count.' records added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function show(Donate $donate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function edit(Donate $donate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donate $donate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donate $donate)
    {
        //
        $donate->delete();
        return back()->with('success','Data Deleted');;
    }
}
