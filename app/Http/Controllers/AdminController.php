<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Carousel;
use App\Models\Fact;
use App\Models\Project;
use App\Models\Service;
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
        return view('admin.about', compact('abouts'));
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

    public function clients()
    {
        return view('admin.clients');
    }

    public function faqs()
    {
        return view('admin.faqs');
    }

    public function testimonials()
    {
        return view('admin.testimonials');
    }

    public function blogs()
    {
        return view('admin.blogs');
    }

    public function enquiry()
    {
        return view('admin.enquiry');
    }

    public function jobEnquiry()
    {
        return view('admin.job-enquiry');
    }


}
