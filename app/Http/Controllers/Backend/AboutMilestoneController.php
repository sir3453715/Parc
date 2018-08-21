<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\Backend\AboutMilestoneRepository;

use App\AboutMileStone;
use Session;

class AboutMilestoneController extends Controller
{
    protected $aboutMilestoneRepository;
    
    public function __construct(AboutMilestoneRepository $aboutMilestoneRepository){
        $this->aboutMilestoneRepository=$aboutMilestoneRepository;
    }
    //
    public function index(){
        $datas=$this->aboutMilestoneRepository->index();
        return view('backend.about_milestone.index',
        [
            'datas' => $datas,
        ]);
    }
    public function create(){
        $datas=$this->aboutMilestoneRepository->create();
        return view('backend.about_milestone.create',
        [
            'datas' => $datas,
        ]);
    }
    public function store(Request $request){
        $this->aboutMilestoneRepository->store($request);
        return redirect('/backend/about_milestone');
    }
    public function edit(AboutMileStone $about_milestone){
        $datas = $this->aboutMilestoneRepository->edit($about_milestone);
        return view('backend.about_milestone.edit',
        [
            'datas' => $datas,
        ]);
    }
    public function order(){
        return view('backend.about_milestone.order',
        [
            'datas'=> AboutMileStone::all()->sortBy("order"),
        ]);
    }
    public function order_update(Request $request){
        $this->aboutMilestoneRepository->order_update($request);
        return redirect('/backend/about_milestone');
    }
    public function update(Request $request,AboutMileStone $about_milestone){
        $this->aboutMilestoneRepository->update($request,$about_milestone);
        return redirect('/backend/about_milestone');
    }
    public function destroy(AboutMileStone $about_milestone){
        if($about_milestone->pic){
            Storage::delete('public/'.$about_milestone->pic);
        }
        $about_milestone->delete();
        Session::flash('msg', 'Milestone Deleted');
        return redirect('/backend/about_milestone');
    }
}
