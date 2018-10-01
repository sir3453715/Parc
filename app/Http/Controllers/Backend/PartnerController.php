<?php

namespace App\Http\Controllers\Backend;

use App\partner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\Backend\PartnerRepository;
use Illuminate\Support\Facades\Validator;


use Session;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    protected $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository){
        $this->partnerRepository=$partnerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas=$this->partnerRepository->index();
        return view('backend.partner.index',
        [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.partner.create');
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
            'pic.required'  => '請上傳圖片 Please upload an image',
            'pic.image'     => '上傳檔案非圖片 File type not supported, please upload an image file',
            'title.required'=> '請輸入標題 Please fill in title'
            
        ];
        $validate = Validator::make($request->all(), [
            'pic' => 'required|image',
            'title' => 'required'
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->partnerRepository->store($request);
            return redirect('/backend/partner')->with('success','夥伴新增成功! Partner created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(partner $partner)
    {
        //
        return view('backend.partner.edit',
        [
            'datas' => $partner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, partner $partner)
    {
        //
        $messages = [
            'pic.image'     => '上傳檔案非圖片 File type not supported, please upload an image file',
            'title.required'=> '請輸入標題 Please fill in title'
            
        ];
        $validate = Validator::make($request->all(), [
            'pic' => 'image',
            'title' => 'required'
            
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validate);
        }
        else{
            $this->partnerRepository->update($request,$partner);
            return redirect('/backend/partner')->with('success','夥伴更新成功! Partner Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(partner $partner)
    {
        if($partner->pic){
            Storage::delete('public/'.$partner->pic);
        }
        $partner->delete();
        return redirect('/backend/partner')->with('success','夥伴刪除成功 Partner Deleted');
    }
    public function order(){
        return view('backend.partner.order',
        [
            'datas'=> partner::all()->sortBy("order"),
        ]);
    }
    public function orderUpdate(Request $request){
        $this->partnerRepository->orderUpdate($request);
        return redirect('/backend/partner')->with('success','順序已更新 Order Updated');
    }
}
