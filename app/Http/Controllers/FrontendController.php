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
                'job_title' => 'required|string|in:Project Manager,Project Engineer,Site Supervisor,Account Manager(project),Account Manager(Office),Assistant Account,HR(Site),HR(Office)',
                'qualification' => 'required|string|max:255',
                'hs_division' => 'required|string|in:art,science,commerce',
                'tenth_percentage' => 'required|numeric|min:0|max:100',
                'hs_percentage' => 'required|numeric|min:0|max:100',
                'phone' => 'required|digits:10',
                'address' => 'required|string|min:10|max:500',
                'cv' => 'required|file|mimes:pdf|max:10240',
            ], [
                'job_title.required' => 'Please select a job post.',
                'job_title.in' => 'Please select a valid job post.',
                'qualification.required' => 'Please enter your final qualification.',
                'hs_division.required' => 'Please select your HS division.',
                'hs_division.in' => 'Please select a valid HS division (Art, Science, or Commerce).',
                'tenth_percentage.required' => 'Please enter your 10th marks percentage.',
                'tenth_percentage.numeric' => 'The 10th percentage must be a number.',
                'tenth_percentage.min' => 'The 10th percentage must be at least 0.',
                'tenth_percentage.max' => 'The 10th percentage cannot exceed 100.',
                'hs_percentage.required' => 'Please enter your HS marks percentage.',
                'hs_percentage.numeric' => 'The HS percentage must be a number.',
                'hs_percentage.min' => 'The HS percentage must be at least 0.',
                'hs_percentage.max' => 'The HS percentage cannot exceed 100.',
                'phone.required' => 'Please enter your phone number.',
                'phone.digits' => 'Phone number must be exactly 10 digits.',
                'address.required' => 'Please enter your address.',
                'address.min' => 'Address must be at least 10 characters.',
                'address.max' => 'Address cannot exceed 500 characters.',
                'cv.required' => 'Please upload your CV.',
                'cv.file' => 'The CV must be a valid file.',
                'cv.mimes' => 'The CV must be a PDF file.',
                'cv.max' => 'The CV file size cannot exceed 10MB.',
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
