<?php

namespace App\Http\Controllers;

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

    public function carousel()
    {
        return view('admin.carousel');
    }

    public function work()
    {
        return view('admin.work');
    }

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
