<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Exception;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function storeEnquiry(Request $request)
    {
        try {
            $enquiry = new Enquiry();
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->subject = $request->subject;
            $enquiry->message = $request->message;
            $enquiry->save();
            return redirect()->back()->with('success', 'Enquiry submitted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Enquiry submitted failed! Please try again later.');
        }
    }
}
