<?php

namespace App\Http\Controllers\Backend;

use App\MileStone;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\MileStoneRepository;

use App\Http\Controllers\Controller;
use Session;


class MileStoneController extends Controller
{
    protected $mileStoneRepository;
    

    public function __construct(MileStoneRepository $mileStoneRepository){
        $this->mileStoneRepository=$mileStoneRepository;
    }
    //
    public function index(){
        $datas=$this->mileStoneRepository->index();
        return view('milestone.index',
        [
            'datas' => $datas,
        ]);
    }
    public function create(){
        $datas=$this->mileStoneRepository->create();
        return view('milestone.create',
        [
            'datas' => $datas,
        ]);
    }
    public function store(Request $request){
        $this->mileStoneRepository->store($request);
        return redirect('/backend/milestone');
    }
    public function edit(milestone $milestone){
        $datas = $this->mileStoneRepository->edit($milestone);
        return view('milestone.edit',
        [
            'datas' => $datas,
        ]);
    }
    public function order(){
        return view('milestone.order',
        [
            'datas'=> Milestone::all()->sortBy("order"),
        ]);
    }
    public function order_update(Request $request){
        $this->mileStoneRepository->order_update($request);
        return redirect('/backend/milestone');
    }
    public function update(Request $request,milestone $milestone){
        $this->mileStoneRepository->update($request,$milestone);
        return redirect('/backend/milestone');
    }
    public function destroy(milestone $milestone){
        if($milestone->pic){
            Storage::delete('public/'.$milestone->pic);
        }
        $milestone->delete();
        Session::flash('msg', 'Milestone Deleted');
        return redirect('/backend/milestone');
    }
}
