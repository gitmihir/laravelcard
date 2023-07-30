<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function viewusers()
    {
        $viewusers = DB::select('select * from users ORDERBY id DESC');
        return view('/usermanagement/allusers', ['viewusers' => $viewusers]);
    }
    public function viewsupplierindetail($id)
    {
        $user = User::find($id);
        return view('/user/singlesupplier', compact('user'));
    }
    public function edituser($id)
    {
        $user = User::find($id);
        return view('/usermanagement/edituser', compact('user'));
    }
    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $user->password = \Hash::make($request->input('password'));
        } else {

        }
        $user->update();
        return redirect('/usermanagement/allusers');
    }

    public function destroyuser($id)
    {
        //$user = User::find($id);
        DB::table('users')
            ->where('id', $id)
            ->delete();
        //$user->delete();
        return redirect('/usermanagement/allusers');
    }
}