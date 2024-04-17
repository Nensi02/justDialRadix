<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addServices;

class AddServicesController extends Controller
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
    public function storeServices(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'desc'  => 'required|string'
        ]);
        $addData = new addServices();
        $addData->sServiceName = $request['name'];
        $addData->sDescription = $request['desc'];
        if ($addData->save()) {
            return redirect()->route('serviceList')->with('success', "Service addes successfully.");
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
    public function viewService()
    {
        $serviceData = addServices::all();
        return view('admin.serviceList', ['serviceData'=> $serviceData]);
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
    public function deleteService($id)
    {
        $data = addServices::find($id);
        if(!empty($data->nId)) {
            $data->delete();
            return redirect()->route('serviceList')
                        ->with('success','Product deleted successfully');
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
    public function editService($id)
    {
        $data = addServices::find($id);
        if(is_null($data)) {
            return redirect()->route('serviceList');
        } else {
            $url = url('/admin/addServices/update') . '/' . $id;
            $serviceDataEdit = compact('data', 'url');
            return view('admin.addServices')->with($serviceDataEdit);
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
    public function updateServicesView(Request $request, $id)
    {
        $data = addServices::find($id);
        if(!is_null($data)) {
            $validator = $request->validate([
                'name' => 'required|string',
                'desc'  => 'required|string'
            ]);
            $data->sServiceName = $request['name'];
            $data->sDescription = $request['desc'];
            if ($data->save()) {
                return redirect()->route('serviceList')->with('success', 'Service Updated successfully.');
            }
    
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
