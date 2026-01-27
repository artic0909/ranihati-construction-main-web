<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\JobEnquiry;
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

    public function storeJobEnquiry(Request $request)
    {
        try {
            $validated = $request->validate([
                'job_title' => 'required|string|max:255',
                'qualification' => 'required|string|max:255',
                'hs_division' => 'required|string|max:255',
                'tenth_percentage' => 'required|string|max:255',
                'hs_percentage' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'cv' => 'required|file|mimes:pdf|max:10240',
            ]);

            $jobEnquiry = new JobEnquiry();
            $jobEnquiry->job_title = $validated['job_title'];
            $jobEnquiry->qualification = $validated['qualification'];
            $jobEnquiry->hs_division = $validated['hs_division'];
            $jobEnquiry->tenth_percentage = $validated['tenth_percentage'];
            $jobEnquiry->hs_percentage = $validated['hs_percentage'];
            $jobEnquiry->phone = $validated['phone'];
            $jobEnquiry->address = $validated['address'];
            $jobEnquiry->cv = $validated['cv']->store('job-enquiries', 'public');

            $jobEnquiry->save();
            return redirect()->back()->with('success', 'Job Enquiry submitted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Job Enquiry submitted failed! Please try again later.');
        }
    }
}
