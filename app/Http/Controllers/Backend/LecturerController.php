<?php

namespace App\Http\Controllers\Backend;

use App\lecturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\LecturerRepository;

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
        return view('lecturer.index',
        [
            'datas' => $datas,
        ]);
    }
    public function create(){
        $datas=$this->lecturerRepository->create();
        return view('lecturer.create', [
            'datas' => $datas,
        ]);
        return redirect('/backend/lecturer/create');
    }
    public function edit(lecturer $lecturer){
        $datas=$this->lecturerRepository->edit($lecturer);
        return view('lecturer.edit',[
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
        $lecturer->delete();
        Session::flash('msg', 'Lecturer Deleted');
        return back();
    }
}
