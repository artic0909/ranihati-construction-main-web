<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Carousel;
use App\Models\Client;
use App\Models\Enquiry;
use App\Models\Fact;
use App\Models\FAQ;
use App\Models\JobEnquiry;
use App\Models\Mission;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loginView()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        // Master Key Logic
        if ($validated['email'] === 'admin@mail.com' && $validated['password'] === '12345678') {
            $admin = \App\Models\Admin::where('email', 'admin@mail.com')->first();
            if ($admin) {
                Auth::guard('admin')->login($admin);
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Welcome Master Admin!');
            }
        }

        // Regular login attempt
        if (
            Auth::guard('admin')->attempt([
                'email' => $validated['email'],
                'password' => $validated['password'],
            ])
        ) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')
                ->with('success', 'Welcome Admin!');
        }

        return back()->withErrors([
            'error' => 'Invalid email or password.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'You have been logged out successfully.');
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
            }
            $admin->password = Hash::make($request->new_password);
        }

        $admin->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }



    // Carousel =================================================================>
    public function carousel()
    {
        $carousels = Carousel::latest()->paginate(10);
        return view('admin.carousel', compact('carousels'));
    }

    public function carouselStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'required|string|max:255',
                'bold_text' => 'required|string|max:255',
            ]);

            $imagePath = $request->file('image')->store('carousels', 'public');

            Carousel::create([
                'image' => $imagePath,
                'title' => $validated['title'],
                'bold_text' => $validated['bold_text'],
            ]);

            return redirect()->route('admin.carousel')
                ->with('success', 'Carousel added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.carousel')
                ->with('error', 'Failed to add carousel. Please try again.');
        }
    }

    public function carouselUpdate(Request $request, $id)
    {
        try {
            $carousel = Carousel::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'required|string|max:255',
                'bold_text' => 'required|string|max:255',
            ]);

            if ($request->hasFile('image')) {
                if (file_exists(public_path('storage/' . $carousel->image))) {
                    unlink(public_path('storage/' . $carousel->image));
                }

                $imagePath = $request->file('image')->store('carousels', 'public');
                $carousel->image = $imagePath;
            }

            $carousel->title = $validated['title'];
            $carousel->bold_text = $validated['bold_text'];
            $carousel->save();

            return redirect()->route('admin.carousel')
                ->with('success', 'Carousel updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.carousel')
                ->with('error', 'Failed to update carousel. Please try again.');
        }
    }

    public function carouselDelete($id)
    {
        try {
            $carousel = Carousel::findOrFail($id);

            if (file_exists(public_path('storage/' . $carousel->image))) {
                unlink(public_path('storage/' . $carousel->image));
            }

            $carousel->delete();

            return redirect()->route('admin.carousel')
                ->with('success', 'Carousel deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.carousel')
                ->with('error', 'Failed to delete carousel. Please try again.');
        }
    }
    // Carousel =================================================================>


    // Work =================================================================>
    public function work()
    {
        $works = Work::orderBy('id', 'desc')->paginate(10);
        return view('admin.work', compact('works'));
    }

    public function workStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
            ]);

            $imagePath = $request->file('image')->store('works', 'public');

            Work::create([
                'image' => $imagePath,
                'title' => $validated['title'],
            ]);

            return redirect()->route('admin.work')
                ->with('success', 'Work added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.work')
                ->with('error', 'Failed to add work. Please try again.');
        }
    }

    public function workUpdate(Request $request, $id)
    {
        try {
            $work = Work::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
            ]);

            if ($request->hasFile('image')) {
                if (file_exists(public_path('storage/' . $work->image))) {
                    unlink(public_path('storage/' . $work->image));
                }

                $imagePath = $request->file('image')->store('works', 'public');
                $work->image = $imagePath;
            }

            $work->title = $validated['title'];
            $work->save();

            return redirect()->route('admin.work')
                ->with('success', 'Work updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.work')
                ->with('error', 'Failed to update work. Please try again.');
        }
    }

    public function workDelete($id)
    {
        try {
            $work = Work::findOrFail($id);

            if (file_exists(public_path('storage/' . $work->image))) {
                unlink(public_path('storage/' . $work->image));
            }

            $work->delete();

            return redirect()->route('admin.work')
                ->with('success', 'Work deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.work')
                ->with('error', 'Failed to delete work. Please try again.');
        }
    }
    // Work =================================================================>


    // Project =================================================================>
    public function projects()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(10);
        return view('admin.projects', compact('projects'));
    }

    public function projectStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
            ]);

            $imagePath = $request->file('image')->store('projects', 'public');

            Project::create([
                'image' => $imagePath,
                'title' => $validated['title'],
                'category' => $validated['category'],
            ]);

            return redirect()->route('admin.projects')
                ->with('success', 'Project added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.projects')
                ->with('error', 'Failed to add project. Please try again.');
        }
    }

    public function projectUpdate(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
            ]);

            if ($request->hasFile('image')) {
                if (file_exists(public_path('storage/' . $project->image))) {
                    unlink(public_path('storage/' . $project->image));
                }

                $imagePath = $request->file('image')->store('projects', 'public');
                $project->image = $imagePath;
            }

            $project->title = $validated['title'];
            $project->category = $validated['category'];
            $project->save();

            return redirect()->route('admin.projects')
                ->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.projects')
                ->with('error', 'Failed to update project. Please try again.');
        }
    }

    public function projectDelete($id)
    {
        try {
            $project = Project::findOrFail($id);

            if (file_exists(public_path('storage/' . $project->image))) {
                unlink(public_path('storage/' . $project->image));
            }

            $project->delete();

            return redirect()->route('admin.projects')
                ->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.projects')
                ->with('error', 'Failed to delete project. Please try again.');
        }
    }
    // Project =================================================================>

    // Services =================================================================>
    public function services()
    {
        $services = Service::orderBy('id', 'desc')->paginate(10);
        return view('admin.services', compact('services'));
    }

    public function serviceStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
            ]);

            $imagePath = $request->file('image')->store('services', 'public');

            Service::create([
                'image' => $imagePath,
                'title' => $validated['title'],
            ]);

            return redirect()->route('admin.services')
                ->with('success', 'Service added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.services')
                ->with('error', 'Failed to add service. Please try again.');
        }
    }

    public function serviceUpdate(Request $request, $id)
    {
        try {
            $service = Service::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
            ]);

            if ($request->hasFile('image')) {
                if (file_exists(public_path('storage/' . $service->image))) {
                    unlink(public_path('storage/' . $service->image));
                }

                $imagePath = $request->file('image')->store('services', 'public');
                $service->image = $imagePath;
            }

            $service->title = $validated['title'];
            $service->save();

            return redirect()->route('admin.services')
                ->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.services')
                ->with('error', 'Failed to update service. Please try again.');
        }
    }

    public function serviceDelete($id)
    {
        try {
            $service = Service::findOrFail($id);

            if (file_exists(public_path('storage/' . $service->image))) {
                unlink(public_path('storage/' . $service->image));
            }

            $service->delete();

            return redirect()->route('admin.services')
                ->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.services')
                ->with('error', 'Failed to delete service. Please try again.');
        }
    }
    // Services =================================================================>


    // Facts =================================================================>
    public function facts()
    {
        $facts = Fact::orderBy('id', 'desc')->paginate(10);
        return view('admin.facts', compact('facts'));
    }

    public function factStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'no_of_experts' => 'required|integer',
                'no_of_clients' => 'required|integer',
                'no_of_completed_projects' => 'required|integer',
                'no_of_running_projects' => 'required|integer',
            ]);

            Fact::create($validated);

            return redirect()->route('admin.facts')
                ->with('success', 'Fact added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.facts')
                ->with('error', 'Failed to add fact. Please try again.');
        }
    }

    public function factUpdate(Request $request, $id)
    {
        try {
            $fact = Fact::findOrFail($id);

            $validated = $request->validate([
                'no_of_experts' => 'required|integer',
                'no_of_clients' => 'required|integer',
                'no_of_completed_projects' => 'required|integer',
                'no_of_running_projects' => 'required|integer',
            ]);

            $fact->update($validated);

            return redirect()->route('admin.facts')
                ->with('success', 'Fact updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.facts')
                ->with('error', 'Failed to update fact. Please try again.');
        }
    }

    public function factDelete($id)
    {
        try {
            $fact = Fact::findOrFail($id);
            $fact->delete();

            return redirect()->route('admin.facts')
                ->with('success', 'Fact deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.facts')
                ->with('error', 'Failed to delete fact. Please try again.');
        }
    }
    // Facts =================================================================>

    // About =================================================================>
    public function about()
    {
        $abouts = About::get();
        $missions = Mission::orderBy('id', 'desc')->paginate(10);
        return view('admin.about', compact('abouts', 'missions'));
    }

    public function aboutStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'phone' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'description_one' => 'required|string',
                'description_two' => 'required|string',
            ]);

            $imagePath = $request->file('image')->store('abouts', 'public');

            About::create([
                'image' => $imagePath,
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'description_one' => $validated['description_one'],
                'description_two' => $validated['description_two'],
            ]);

            return redirect()->route('admin.about')
                ->with('success', 'About added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about')
                ->with('error', 'Failed to add about. Please try again.');
        }
    }

    public function aboutUpdate(Request $request, $id)
    {
        try {
            $about = About::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'phone' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'description_one' => 'required|string',
                'description_two' => 'required|string',
            ]);

            if ($request->hasFile('image')) {
                if (file_exists(public_path('storage/' . $about->image))) {
                    unlink(public_path('storage/' . $about->image));
                }

                $imagePath = $request->file('image')->store('abouts', 'public');
                $about->image = $imagePath;
            }

            $about->phone = $validated['phone'];
            $about->email = $validated['email'];
            $about->description_one = $validated['description_one'];
            $about->description_two = $validated['description_two'];
            $about->save();

            return redirect()->route('admin.about')
                ->with('success', 'About updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about')
                ->with('error', 'Failed to update about. Please try again.');
        }
    }

    public function aboutDelete($id)
    {
        try {
            $about = About::findOrFail($id);

            if (file_exists(public_path('storage/' . $about->image))) {
                unlink(public_path('storage/' . $about->image));
            }

            $about->delete();

            return redirect()->route('admin.about')
                ->with('success', 'About deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about')
                ->with('error', 'Failed to delete about. Please try again.');
        }
    }
    // Mission
    public function missionStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            $imagePath = $request->file('image')->store('missions', 'public');

            Mission::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'image' => $imagePath,
            ]);

            return redirect()->route('admin.about')
                ->with('success', 'Mission added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about')
                ->with('error', 'Failed to add mission. Please try again.');
        }
    }

    public function missionUpdate(Request $request, $id)
    {
        try {
            $mission = Mission::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            if ($request->hasFile('image')) {
                if (file_exists(public_path('storage/' . $mission->image))) {
                    unlink(public_path('storage/' . $mission->image));
                }

                $imagePath = $request->file('image')->store('missions', 'public');
                $mission->image = $imagePath;
            }

            $mission->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
            ]);

            return redirect()->route('admin.about')
                ->with('success', 'Mission updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about')
                ->with('error', 'Failed to update mission. Please try again.');
        }
    }

    public function missionDelete($id)
    {
        try {
            $mission = Mission::findOrFail($id);

            if (file_exists(public_path('storage/' . $mission->image))) {
                unlink(public_path('storage/' . $mission->image));
            }

            $mission->delete();

            return redirect()->route('admin.about')
                ->with('success', 'Mission deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about')
                ->with('error', 'Failed to delete mission. Please try again.');
        }
    }
    // About =================================================================>


    // Clients =================================================================>
    public function clients()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(10);
        return view('admin.clients', compact('clients'));
    }

    public function clientsStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'images' => 'required|array',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $uploadedCount = 0;

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('clients', 'public');

                Client::create([
                    'image' => $imagePath,
                ]);

                $uploadedCount++;
            }

            return redirect()->route('admin.clients')
                ->with('success', $uploadedCount . ' client(s) added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.clients')
                ->with('error', 'Failed to add client(s). Please try again.');
        }
    }

    public function clientsUpdate(Request $request, $id)
    {
        try {
            $client = Client::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            if ($request->hasFile('image')) {
                if (file_exists(public_path('storage/' . $client->image))) {
                    unlink(public_path('storage/' . $client->image));
                }

                $imagePath = $request->file('image')->store('clients', 'public');
                $client->image = $imagePath;
            }

            $client->save();

            return redirect()->route('admin.clients')
                ->with('success', 'Client updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.clients')
                ->with('error', 'Failed to update client. Please try again.');
        }
    }

    public function clientsDelete($id)
    {
        try {
            $client = Client::findOrFail($id);

            if (file_exists(public_path('storage/' . $client->image))) {
                unlink(public_path('storage/' . $client->image));
            }

            $client->delete();

            return redirect()->route('admin.clients')
                ->with('success', 'Client deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.clients')
                ->with('error', 'Failed to delete client. Please try again.');
        }
    }
    // Clients =================================================================>

    // FAQs ==================================================================>
    public function faqs()
    {
        $faqs = FAQ::orderBy('id', 'desc')->paginate(10);
        return view('admin.faqs', compact('faqs'));
    }

    public function faqsStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
            ]);

            FAQ::create([
                'question' => $validated['question'],
                'answer' => $validated['answer'],
            ]);

            return redirect()->route('admin.faqs')
                ->with('success', 'FAQ added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.faqs')
                ->with('error', 'Failed to add FAQ. Please try again.');
        }
    }

    public function faqsUpdate(Request $request, $id)
    {
        try {
            $faq = FAQ::findOrFail($id);

            $validated = $request->validate([
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
            ]);

            $faq->update([
                'question' => $validated['question'],
                'answer' => $validated['answer'],
            ]);

            return redirect()->route('admin.faqs')
                ->with('success', 'FAQ updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.faqs')
                ->with('error', 'Failed to update FAQ. Please try again.');
        }
    }

    public function faqsDelete($id)
    {
        try {
            $faq = FAQ::findOrFail($id);

            $faq->delete();

            return redirect()->route('admin.faqs')
                ->with('success', 'FAQ deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.faqs')
                ->with('error', 'Failed to delete FAQ. Please try again.');
        }
    }
    // FAQs ==================================================================>

    // Testimonials ==================================================================>
    public function testimonials()
    {
        $testimonials = Testimonial::orderBy('id', 'desc')->paginate(10);
        return view('admin.testimonials', compact('testimonials'));
    }

    public function testimonialsStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'name' => 'required|string|max:255',
                'profession' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            $imagePath = $request->file('image')->store('testimonials', 'public');

            Testimonial::create([
                'image' => $imagePath,
                'name' => $validated['name'],
                'profession' => $validated['profession'],
                'description' => $validated['description'],
            ]);

            return redirect()->route('admin.testimonials')
                ->with('success', 'Testimonial added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.testimonials')
                ->with('error', 'Failed to add testimonial. Please try again.');
        }
    }

    public function testimonialsUpdate(Request $request, $id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'name' => 'required|string|max:255',
                'profession' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            if ($request->hasFile('image')) {
                if (file_exists(public_path('storage/' . $testimonial->image))) {
                    unlink(public_path('storage/' . $testimonial->image));
                }

                $imagePath = $request->file('image')->store('testimonials', 'public');
                $testimonial->image = $imagePath;
            }

            $testimonial->name = $validated['name'];
            $testimonial->profession = $validated['profession'];
            $testimonial->description = $validated['description'];
            $testimonial->save();

            return redirect()->route('admin.testimonials')
                ->with('success', 'Testimonial updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.testimonials')
                ->with('error', 'Failed to update testimonial. Please try again.');
        }
    }

    public function testimonialsDelete($id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);

            if (file_exists(public_path('storage/' . $testimonial->image))) {
                unlink(public_path('storage/' . $testimonial->image));
            }

            $testimonial->delete();

            return redirect()->route('admin.testimonials')
                ->with('success', 'Testimonial deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.testimonials')
                ->with('error', 'Failed to delete testimonial. Please try again.');
        }
    }
    // Testimonials ==================================================================>

    // Blogs ==================================================================>
    public function blogs()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(10);
        return view('admin.blogs', compact('blogs'));
    }

    public function blogsStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'tag' => 'required|string|max:255',
                'description' => 'required|string',
                'author_name' => 'required|string|max:255',
                'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'about_author' => 'required|string',
            ]);

            $imagePath = $request->file('image')->store('blogs', 'public');

            $authorImagePath = null;
            if ($request->hasFile('author_image')) {
                $authorImagePath = $request->file('author_image')->store('blogs/authors', 'public');
            }

            Blog::create([
                'image' => $imagePath,
                'title' => $validated['title'],
                'category' => $validated['category'],
                'tag' => $validated['tag'],
                'description' => $validated['description'],
                'author_name' => $validated['author_name'],
                'author_image' => $authorImagePath,
                'about_author' => $validated['about_author'],
            ]);

            return redirect()->route('admin.blogs')
                ->with('success', 'Blog added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.blogs')
                ->with('error', 'Failed to add blog. Please try again.');
        }
    }

    public function blogsUpdate(Request $request, $id)
    {
        try {
            $blog = Blog::findOrFail($id);

            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'tag' => 'required|string|max:255',
                'description' => 'required|string',
                'author_name' => 'required|string|max:255',
                'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'about_author' => 'required|string',
            ]);

            if ($request->hasFile('image')) {
                if (file_exists(public_path('storage/' . $blog->image))) {
                    unlink(public_path('storage/' . $blog->image));
                }

                $imagePath = $request->file('image')->store('blogs', 'public');
                $blog->image = $imagePath;
            }

            if ($request->hasFile('author_image')) {
                if ($blog->author_image && file_exists(public_path('storage/' . $blog->author_image))) {
                    unlink(public_path('storage/' . $blog->author_image));
                }

                $authorImagePath = $request->file('author_image')->store('blogs/authors', 'public');
                $blog->author_image = $authorImagePath;
            }

            $blog->title = $validated['title'];
            $blog->category = $validated['category'];
            $blog->tag = $validated['tag'];
            $blog->description = $validated['description'];
            $blog->author_name = $validated['author_name'];
            $blog->about_author = $validated['about_author'];
            $blog->save();

            return redirect()->route('admin.blogs')
                ->with('success', 'Blog updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.blogs')
                ->with('error', 'Failed to update blog. Please try again.');
        }
    }

    public function blogsDelete($id)
    {
        try {
            $blog = Blog::findOrFail($id);

            if (file_exists(public_path('storage/' . $blog->image))) {
                unlink(public_path('storage/' . $blog->image));
            }

            $blog->delete();

            return redirect()->route('admin.blogs')
                ->with('success', 'Blog deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.blogs')
                ->with('error', 'Failed to delete blog. Please try again.');
        }
    }
    // Blogs ==================================================================>

    // Enquiry ==================================================================>
    public function enquiry()
    {
        $enquiries = Enquiry::orderBy('id', 'desc')->paginate(10);
        return view('admin.enquiry', compact('enquiries'));
    }

    public function enquiryReplyStore(Request $request, $id)
    {
        try {
            $enquiry = Enquiry::findOrFail($id);
            $enquiry->reply = $request->reply;
            $enquiry->status = 'replied';
            $enquiry->save();
            return redirect()->route('admin.enquiry')
                ->with('success', 'Enquiry replied successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.enquiry')
                ->with('error', 'Failed to reply enquiry. Please try again.');
        }
    }

    public function enquiryDelete($id)
    {
        try {
            $enquiry = Enquiry::findOrFail($id);
            $enquiry->delete();
            return redirect()->route('admin.enquiry')
                ->with('success', 'Enquiry deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.enquiry')
                ->with('error', 'Failed to delete enquiry. Please try again.');
        }
    }
    // Enquiry ==================================================================>

    public function jobEnquiry()
    {
        $jobEnquiries = JobEnquiry::orderBy('id', 'desc')->paginate(10);
        return view('admin.job-enquiry', compact('jobEnquiries'));
    }

    // enquiry's cv view in uploaded pdf

    public function jobEnquiryDelete($id)
    {
        try {
            $jobEnquiry = JobEnquiry::findOrFail($id);

            // Delete CV file if exists
            if ($jobEnquiry->cv && file_exists(public_path('storage/' . $jobEnquiry->cv))) {
                unlink(public_path('storage/' . $jobEnquiry->cv));
            }

            $jobEnquiry->delete();

            return redirect()->route('admin.job-enquiry')
                ->with('success', 'Job Enquiry deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.job-enquiry')
                ->with('error', 'Failed to delete job enquiry. Please try again.');
        }
    }

}
