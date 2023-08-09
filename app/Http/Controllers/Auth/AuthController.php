<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Validator;
use Redirect;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('registration');
    }

    /**
     * Write code on Method
     *
     * @return \response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            //$request->authenticate();
            $request->session()->regenerate();
            $role = Auth::user()->user_role;
            switch ($role) {
                case 'super_admin':
                    return redirect()->intended('home')
                        ->with('You have Successfully loggedin');
                    break;
                case 'franchiseuser':
                    return redirect()->intended('home')
                        ->with('You have Successfully loggedin');
                    break;
                case 'normaluser':
                    return redirect(url('/userarea/allcards'));
                    break;

            }

        } else {
            return redirect('/login')->with('message', 'Oppes! You have entered invalid credentials!');
        }


    }

    /**
     * Write code on Method
     *
     * @return \response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("home")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return \response()
     */
    public function home()
    {
        if (Auth::check()) {
            return view('home');
        }

        return redirect("/")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return \response()
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return \response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/login');
    }
}