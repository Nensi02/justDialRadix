<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\addServices;
use App\Models\ServiceProvide;

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
        $validator = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'required|regex:/^(\+?)(\d{1,3})?[-. ]?(\(\d{1,3}\))?[-. ]?\d{1,10}$/',
            'address' => 'required|string',
            'service' => 'required',
            'city'  => 'required|string',
            'pincode'  => 'required|numeric',
            'smPic'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lgPic'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $addData = new ServiceProvide();
        $addData->sName = $request['name'];
        $addData->sEmail = $request['email'];
        $addData->nPhoneNumber = $request['phoneNumber'];
        $addData->sAddress = $request['address'];
        $addData->scity = $request['city'];
        $addData->nPincode = $request['pincode'];
        $addData->sSmpic = $request['smPic']->getClientOriginalName();
        $addData->sLgPic = $request['lgPic']->getClientOriginalName();
        $addData->bStatus = ($request['switch'] == 'on') ? 1 : 0;
        $addData->nServiceId = $request['service'];
        if ($request->hasFile('smPic')) {
            $file = $request->file('smPic');
            $file->move(public_path('\images'), $file->getClientOriginalName());
        }
        if ($request->hasFile('lgPic')) {
            $file = $request->file('lgPic');
            $file->move(public_path('images'), $file->getClientOriginalName());
        }
        if ($addData->save()) {
            return redirect()->route('providerList')
            ->withSuccess('Service Provider data added successfully.');
        }

        return redirect()->back()->withErrors($validator)->withInput();
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
    public function viewProvider()
    {
        if(Auth::check()) {
            $selectData = ServiceProvide::with('service')->get();
            return view('admin.providerList')->with(compact('selectData'));
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
    public function editProvider($id)
    {
        $data = ServiceProvide::find($id);
        $selectData = addServices::all();
        if(is_null($data)) {
            return redirect()->route('ProviderList');
        } else {
            $url = url('/admin/addProvider/update') . '/' . $id;
            $providerDataEdit = compact('data', 'url', 'selectData');
            return view('admin.addProvider')->with($providerDataEdit);
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
    public function updateProviderView(Request $request, $id)
    {
        $data = ServiceProvide::find($id);
        if(!is_null($data)) {
            $validator = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phoneNumber' => 'required|regex:/^(\+?)(\d{1,3})?[-. ]?(\(\d{1,3}\))?[-. ]?\d{1,10}$/',
                'address' => 'required|string',
                'service' => 'required',
                'city'  => 'required|string',
                'pincode'  => 'required|numeric',
                'smPic'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'lgPic'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $data->sName = $request['name'];
            $data->sEmail = $request['email'];
            $data->nPhoneNumber = $request['phoneNumber'];
            $data->sAddress = $request['address'];
            $data->scity = $request['city'];
            $data->nPincode = $request['pincode'];
            $data->sSmpic = $request['smPic']->getClientOriginalName();
            $data->sLgPic = $request['lgPic']->getClientOriginalName();
            $data->bStatus = ($request['switch'] == 'on') ? 1 : 0;
            $data->nServiceId = $request['service'];
            if ($request->hasFile('smPic')) {
                $file = $request->file('smPic');
                $file->move(public_path('\images'), $file->getClientOriginalName());
            }
            if ($request->hasFile('lgPic')) {
                $file = $request->file('lgPic');
                $file->move(public_path('images'), $file->getClientOriginalName());
            }
            if ($data->save()) {
                return redirect()->route('providerList')
                ->withSuccess('Service provider data updated.');
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return redirect()->back()->with('error', 'Data is not available');
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
    public function deleteProvider($id)
    {
        $data = ServiceProvide::find($id);
        if(!empty($data->nId)) {
            $data->delete();
            return redirect()->route('admin.providerList')
                        ->with('success','Data is deleted successfully');
        }
    }
}
