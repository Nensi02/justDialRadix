<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\addServices;

class ServiceProvideController extends Controller
{
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function addProviderView()
    {
        if(Auth::check()) {
            $url = url('/addProvider');
            $selectData = addServices::all();
            return view('admin.addProvider')->with(compact('url', 'selectData'));
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
    public function storeProvider(Request $request)
    {
        echo '<br>Nensi<br>File:'.__FILE__.'<br>Line:'.__LINE__.'<br><pre>';print_r($request['name']);echo'</pre>';die();
        $validator = $request->validate([
            'name' => 'required|string',
            'desc'  => 'required|string'
        ]);
        $addData = new addServices();
        $addData->sServiceName = $request['name'];
        $addData->sDescription = $request['desc'];
        if ($addData->save()) {
            return redirect()->route('adminWelcome');
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }
}
