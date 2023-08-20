<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserVerify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\addServices;
use App\Models\ServiceProvide;
use Illuminate\Support\Str;
use Mail;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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

        $createUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $createUser->id, 
            'token' => $token
        ]);

        Mail::send('emails.emailVerification', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });

        $credential = $request->only('email', 'password');
        Auth::attempt($credential);
        $request->session()->regenerate();
        if ($request->email == 'admin@gmail.com') {
            return redirect()->route('adminWelcome')
            ->withSuccess('You have successfully registered & logged in!');
        } else {
            return redirect()->route('welcome')
            ->withSuccess('You have successfully registered & logged in!');
        }
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
            $totalService = (addServices::get('nId')) ? count(addServices::get('nId')) : 0;
            $totalProvider = (ServiceProvide::get('nId')) ? count(ServiceProvide::get('nId')) : 0;
            $totalActiveProvider = (ServiceProvide::where('bStatus', 1)->get('nId')) ? count(ServiceProvide::where('bStatus', 1)->get('nId')) : 0;
            return view('admin.index')->with(compact('totalService', 'totalProvider', 'totalActiveProvider'));
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
            ->withSuccess('You have logged out successfully!');
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

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
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
    public function callback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate([
            'provider_id' => $providerUser->id,
            'provider' => $provider,
        ], [
            'name' => $providerUser->name,
            'email' => $providerUser->email,
            'github_token' => $providerUser->token,
        ]);
        Auth::login($user);

        return redirect()->route('welcome')->with('success', 'You have successfully logged in!');
    }

    public function verifyAccount($token): RedirectResponse
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('success', $message);
    }
}
