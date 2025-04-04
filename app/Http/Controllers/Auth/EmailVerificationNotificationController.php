<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // return redirect()->intended(route('dashboard', absolute: false));
            if ($request->user()->usertype == "admin") {
                return redirect()->intended(route('admin.reports.index', absolute: false));
            } else {
                return redirect()->intended(route('home', absolute: false));
            }
        } else {
            $request->user()->sendEmailVerificationNotification();

            return back()->with('status', 'verification-link-sent');
        }
    }
}
