<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Illuminate\Http\RedirectResponse;

class StoreLoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }
}
