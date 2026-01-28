<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Carousel;
use App\Models\Client;
use App\Models\Enquiry;
use App\Models\Fact;
use App\Models\FAQ;
use App\Models\JobEnquiry;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Work;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{

    // Index
    public function index()
    {
        $carousels = Carousel::get();
        $works = Work::get();
        $projects = Project::get();
        $fact = Fact::get()->first();
        $about = About::get()->first();
        $clients = Client::get();
        $faqsFirstEight = FAQ::orderBy('id', 'asc')->limit(8)->get();
        $faqsLastEight = FAQ::orderBy('id', 'asc')->skip(8)->limit(8)->get();
        $testimonials = Testimonial::get();
        return view('frontend.home', compact('carousels', 'works', 'projects', 'fact', 'about', 'clients', 'faqsFirstEight', 'faqsLastEight', 'testimonials'));
    }


    public function storeEnquiry(Request $request)
    {
        try {
            $enquiry = new Enquiry();
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->subject = $request->subject;
            $enquiry->message = $request->message;
            $enquiry->save();

            // Send email to admin
            Mail::send('emails.enquiry-mail-send', ['enquiry' => $enquiry], function ($message) use ($enquiry) {
                $message->to('ranihati.construction@rconpl.in')
                    ->subject('New Contact Enquiry - ' . $enquiry->subject);
            });

            // Send acknowledgment email to user
            Mail::send('emails.enquiry-mail-received', ['enquiry' => $enquiry], function ($message) use ($enquiry) {
                $message->to($enquiry->email)
                    ->subject('Thank You for Contacting Ranihati Construction');
            });

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
                'name' => 'required|string|max:255|min:2',
                'email' => 'required|email|max:255',
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
                'name.required' => 'Please enter your full name.',
                'name.min' => 'Name must be at least 2 characters.',
                'name.max' => 'Name cannot exceed 255 characters.',
                'email.required' => 'Please enter your email address.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => 'Email cannot exceed 255 characters.',
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
            $jobEnquiry->name = $validated['name'];
            $jobEnquiry->email = $validated['email'];
            $jobEnquiry->qualification = $validated['qualification'];
            $jobEnquiry->hs_division = $validated['hs_division'];
            $jobEnquiry->tenth_percentage = $validated['tenth_percentage'];
            $jobEnquiry->hs_percentage = $validated['hs_percentage'];
            $jobEnquiry->phone = $validated['phone'];
            $jobEnquiry->address = $validated['address'];
            $jobEnquiry->cv = $validated['cv']->store('job-enquiries', 'public');

            $jobEnquiry->save();

            // Send email to HR/Admin
            Mail::send('emails.job-enquiry-mail-send', ['jobEnquiry' => $jobEnquiry], function ($message) use ($jobEnquiry) {
                $message->to('ranihati.construction@rconpl.in')
                    ->subject('New Job Application - ' . $jobEnquiry->job_title);
            });

            // Send acknowledgment email to applicant
            Mail::send('emails.job-enquiry-mail-received', ['jobEnquiry' => $jobEnquiry], function ($message) use ($jobEnquiry) {
                $message->to($jobEnquiry->email)
                    ->subject('Application Received - ' . $jobEnquiry->job_title . ' - Ranihati Construction');
            });

            return redirect()->back()->with('success', 'Job Enquiry submitted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Job Enquiry submitted failed! Please try again later.');
        }
    }

    // Blogs
    public function blogs()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.blogs', compact('blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentBlogs = Blog::where('id', '!=', $blog->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('frontend.blog-details', compact('blog', 'recentBlogs'));
    }
}
