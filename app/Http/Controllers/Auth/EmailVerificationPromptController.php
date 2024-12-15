<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    //     public function __invoke(Request $request): RedirectResponse|View
    //     {
    //         return $request->user()->hasVerifiedEmail()
    //                     ? redirect()->intended(route('dashboard', absolute: false))
    //                     : view('auth.verify-email');
    //     }


    public function __invoke(Request $request): RedirectResponse|View
    {
        if ($request->user()->hasVerifiedEmail()) {
            if ($request->user()->usertype == "admin") {
                return redirect()->intended(route('admin.dashboard', absolute: false));
            } else {
                return redirect()->intended(route('home', absolute: false));
            }
        } else {
            return view('auth.verify-email');
        }
    }
}
