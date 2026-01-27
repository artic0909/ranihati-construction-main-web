<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
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
        $works = Work::orderBy('id', 'desc')->get();
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

    public function projects()
    {
        return view('admin.projects');
    }

    public function services()
    {
        return view('admin.services');
    }

    public function facts()
    {
        return view('admin.facts');
    }

    public function about()
    {
        return view('admin.about');
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
