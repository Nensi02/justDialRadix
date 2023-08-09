<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'adminWelcome', 'addServicesView'
        ]);
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function register()
    {
        return view('registrationForm');
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250|string',
            'email' => 'required|max:250|email',
            'password' => 'required|min:2|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credential = $request->only('email', 'password');
        Auth::attempt($credential);
        $request->session()->regenerate();
        return redirect()->route('welcome')
        ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function dashboard()
    {
        if(Auth::check()) {
            return view('welcome');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function adminWelcome()
    {
        if(Auth::check()) {
            return view('admin.index');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function login()
    {
        return view('login');
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            if ($request->email == 'admin@gmail.com') {
                return redirect()->route('adminWelcome')
                ->withSuccess('You have successfully logged in!');
            } else {
                return redirect()->route('welcome')
                    ->withSuccess('You have successfully logged in!');
            }
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function addServicesView()
    {
        if(Auth::check()) {
            $url = url('/addServices');
            return view('admin.addServices')->with(compact('url'));
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
}
