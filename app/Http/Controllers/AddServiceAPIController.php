<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addServices;
use Illuminate\Support\Facades\Validator;

class AddServiceAPIController extends Controller
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
    public function getServices(Request $request)
    {
        $serviceData = addServices::all();
        $data = [
            'status' => 200,
            'services' => $serviceData
        ];
        return response()->json($data, 200);
    }

    public function storeServices(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'desc'  => 'required|string'
        ]);

        if($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
        } else {
            $addData = new addServices();
            $addData->sServiceName = $request['name'];
            $addData->sDescription = $request['desc'];
            if ($addData->save()) {
                $data = [
                    "status" => 200,
                    "message" => "Data Uploaded successfully"
                ];
                return response()->json($data, 200);
            }
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function updateServices(Request $request, $id)
    {
        $data = addServices::find($id);
        if(!is_null($data)) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'desc'  => 'required|string'
            ]);
            if($validator->fails()) {
                $data = [
                    "status" => 422,
                    "message" => $validator->messages()
                ];
            } else {
                $addData = addServices::find($id);
                $addData->sServiceName = $request['name'];
                $addData->sDescription = $request['desc'];
                if ($addData->save()) {
                    $data = [
                        "status" => 200,
                        "message" => "Data Updated successfully"
                    ];
                    return response()->json($data, 200);
                }
            }
        }
    }

    public function deleteService($id)
    {
        $data = addServices::find($id);
        if(!empty($data->nId)) {
            $data->delete();
            $responseData = [
                "status" => 200,
                "message" => "Data Deleted successfully"
            ];
            return response()->json($responseData, 200);
        }
    }
}
