<?php

namespace App\Http\Controllers\Backend;

use App\lecturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\Backend\LecturerRepository;

use App\Http\Controllers\Controller;
use Session;



class LecturerController extends Controller
{
    protected $lecturerRepository;

    public function __construct(LecturerRepository $lecturerRepository){
        $this->lecturerRepository=$lecturerRepository;
    }
    public function index(){
        $datas=$this->lecturerRepository->index();
        return view('backend.lecturer.index',
        [
            'datas' => $datas->sortBy("order"),
        ]);
    }
    public function create(){
        $datas=$this->lecturerRepository->create();
        return view('backend.lecturer.create', [
            'datas' => $datas,
        ]);
        return redirect('/backend/lecturer/create');
    }
    public function edit(lecturer $lecturer){
        $datas=$this->lecturerRepository->edit($lecturer);
        return view('backend.lecturer.edit',[
            'datas'=>$datas,
        ]);
    }
    public function store(Request $request){
        $this->lecturerRepository->store($request);
        return redirect('/backend/lecturer');
    }
    public function update(Request $request,lecturer $lecturer){
        $this->lecturerRepository->update($request,$lecturer);
        return redirect('/backend/lecturer');
    }
    public function destroy(lecturer $lecturer)
    {
        if($lecturer->pic){
            Storage::delete('public/'.$lecturer->pic);
        }
        $lecturer->delete();
        Session::flash('msg', 'Lecturer Deleted');
        return back();
    }
    public function order(){
        return view('backend.lecturer.order',
        [
            'datas'=> lecturer::all()->sortBy("order"),
        ]);
    }
    public function order_update(Request $request){
        $this->lecturerRepository->order_update($request);
        return redirect('/backend/lecturer')->with('success','Order Updated');;
    }
}
