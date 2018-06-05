<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\FunMenu;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class UsersController extends Controller
{
    public function index()
    {
        $tables = User::all();

        return view('admin.users', [
            'tables' => $tables,
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.usersedit',[
            'operdata' => "",
        ]);
    }

    public function edit($id)
    {
        $usr_id = $id;
        $operdata = User::find($usr_id);

        return view('admin.usersedit',[
            'operdata' => $operdata,
        ]);
    }

    public function store(Request $request)
    {

        if ($request->mode == "insert")
        {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/backend/Users');
        }
        else
        {
            $user = User::find($request->id);
            $user->name = $request->name;
            if ($request->password != "")
            {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            return redirect('/backend/Users');
        }
    }

    public function delete(Request $request, User $id)
    {
        if($id->email == "admin@example.com")
        {
            return Redirect::back()->withErrors("Administrator can not be delete!");
        }
        else
        {
            $id->delete();
        }
        return Redirect::back();
    }
}
