<?php

namespace App\Http\Controllers\Backend;

use App\partner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\Backend\PartnerRepository;

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
        $this->partnerRepository->store($request);
        return redirect('/backend/partner')->with('success','Logo Uploaded');
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
        $this->partnerRepository->update($request,$partner);
        return redirect('/backend/partner')->with('success','Logo Updated');
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
        return redirect('/backend/partner')->with('success','Logo Deleted');
    }
    public function order(){
        return view('backend.partner.order',
        [
            'datas'=> partner::all()->sortBy("order"),
        ]);
    }
    public function orderUpdate(Request $request){
        $this->partnerRepository->orderUpdate($request);
        return redirect('/backend/partner')->with('success','Order Updated');
    }
}
