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
use App\Models\Mission;
use App\Models\Project;
use App\Models\Service;
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
        $blogs = Blog::latest()->take(3)->get();
        // SEO Data
        $meta_title = "Ranihati Construction Private Limited - Leading Construction Company in Kolkata";
        $meta_description = "Ranihati Construction Private Limited (RCPL) is a top-tier construction and facade solution provider in Kolkata. We deliver excellence in civil work, glazing, and interior design.";
        $meta_keywords = "construction company, facade solutions, civil engineering, Kolkata, RCPL, Ranihati Construction";

        return view('frontend.home', compact('carousels', 'works', 'projects', 'fact', 'about', 'clients', 'faqsFirstEight', 'faqsLastEight', 'testimonials', 'blogs', 'meta_title', 'meta_description', 'meta_keywords'));
    }

    // Services
    public function service()
    {
        $services = Service::get();
        $projects = Project::get();
        // SEO Data
        $meta_title = "Our Services - Civil, Facade, & Interior Solutions | RCPL";
        $meta_description = "Explore our comprehensive range of services including civil construction, aluminium glazing, facade works, and interior designing. We deliver quality and innovation.";
        $meta_keywords = "construction services, facade works, glazing services, interior design service, Kolkata construction";

        return view('frontend.service', compact('services', 'projects', 'meta_title', 'meta_description', 'meta_keywords'));
    }

    // Mission
    public function mission()
    {
        $missions = Mission::get();
        // SEO Data
        $meta_title = "Our Mission & Vision | Ranihati Construction Private Limited";
        $meta_description = "Learn about RCPL's mission to build sustainable infrastructure and our vision to become a global leader in the construction industry.";
        $meta_keywords = "company mission, vision statement, core values, RCPL goals, construction company vision";

        return view('frontend.mission', compact('missions', 'meta_title', 'meta_description', 'meta_keywords'));
    }

    // Career
    public function career()
    {
        $about = About::get()->first();
        // SEO Data
        $meta_title = "Careers at RCPL - Join Our Team";
        $meta_description = "Build your career with Ranihati Construction Private Limited. Explore current job openings for Project Managers, Engineers, Supervisors, and more.";
        $meta_keywords = "jobs in construction, civil engineer jobs, site supervisor vacancy, RCPL careers, recruitment Kolkata";

        return view('frontend.careers', compact('about', 'meta_title', 'meta_description', 'meta_keywords'));
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
    public function blogs(Request $request)
    {
        $search = $request->get('search');

        $query = Blog::orderBy('id', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('category', 'LIKE', "%{$search}%")
                    ->orWhere('tag', 'LIKE', "%{$search}%");
            });
        }

        $blogs = $query->paginate(6);

        // SEO Data for the blog listing page
        $meta_title = "Latest Construction Insights & News | RCPL Blog";
        $meta_description = "Stay updated with the latest trends, news, and insights in the construction and facade industry from Ranihati Construction Private Limited.";
        $meta_keywords = "construction blog, industry news, facade trends, civil engineering insights, RCPL blog";

        // Additional data as meta variables
        $meta_works = Work::get();
        $meta_projects = Project::get();
        $meta_about = About::get()->first();
        $meta_faqs_first_eight = FAQ::orderBy('id', 'asc')->limit(8)->get();
        $meta_faqs_last_eight = FAQ::orderBy('id', 'asc')->skip(8)->limit(8)->get();

        return view('frontend.blogs', compact(
            'blogs',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'meta_works',
            'meta_projects',
            'meta_about',
            'meta_faqs_first_eight',
            'meta_faqs_last_eight'
        ));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Get related blogs from the same category
        $relatedBlogs = Blog::where('category', $blog->category)
            ->where('id', '!=', $blog->id)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        // Get recent blogs for sidebar
        $recentBlogs = Blog::where('id', '!=', $blog->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get categories with blog counts
        $categories = Blog::select('category', \DB::raw('count(*) as count'))
            ->groupBy('category')
            ->orderBy('count', 'desc')
            ->get();

        // SEO Data
        $meta_title = $blog->title . " | RCPL Blog";
        $meta_description = \Illuminate\Support\Str::limit(strip_tags($blog->description), 160);
        $meta_keywords = $blog->tag; // Assuming tags are comma-separated or similar
        $og_image = asset('storage/' . $blog->image);

        return view('frontend.blog-details', compact('blog', 'relatedBlogs', 'recentBlogs', 'categories', 'meta_title', 'meta_description', 'meta_keywords', 'og_image'));
    }



    // Contact
    public function contact()
    {
        $faqsFirstEight = FAQ::orderBy('id', 'asc')->limit(8)->get();
        $faqsLastEight = FAQ::orderBy('id', 'asc')->skip(8)->limit(8)->get();
        // SEO Data
        $meta_title = "Contact Us - Get a Quote | Ranihati Construction Private Limited";
        $meta_description = "Get in touch with RCPL for your construction and facade needs. Call us, email us, or visit our office in Kolkata. Get a free quote today.";
        $meta_keywords = "contact RCPL, construction quote, office address, phone number, Kolkata construction contact";

        return view('frontend.contact', compact('faqsFirstEight', 'faqsLastEight', 'meta_title', 'meta_description', 'meta_keywords'));
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
            return redirect()->route('contact')
                ->with('error', 'Failed to send enquiry. Please try again.');
        }
    }

    // Privacy Policy
    public function privacyPolicy()
    {
        // SEO Data
        $meta_title = "Privacy Policy | Ranihati Construction Private Limited";
        $meta_description = "Read our privacy policy to understand how we collect, use, and protect your data at Ranihati Construction Private Limited.";
        $meta_keywords = "privacy policy, data protection, user rights, RCPL privacy";

        return view('frontend.privacy-policy', compact('meta_title', 'meta_description', 'meta_keywords'));
    }
}
