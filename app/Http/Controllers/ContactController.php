<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;
use App\Mail\SampleMail;

class ContactController extends Controller
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
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'email'  => 'required|email',
            'text' => 'required|string'
        ]);
        $addData = new Contact();
        $addData->sName = $request['name'];
        $addData->sEmail = $request['email'];
        $addData->sText = $request['text'];
        $content = [
            'subject' => 'Contact Mail from ' . $request['name'],
            'body' => $request['text']
        ];
        Mail::to('ndnensidarji@gmail.com')->send(new SampleMail($content));
        Mail::to($request['email'])->send(new SampleMail($content));
        if ($addData->save()) {
            return redirect()->route('welcome')->with('success', "Mail is sent.");
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }
}
