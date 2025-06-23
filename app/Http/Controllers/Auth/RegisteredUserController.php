<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Level;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
          $levels = Level::all();
        return view('auth.register', compact('levels'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'unique:users'],
            'no_hp' => ['required', 'string', 'max:13'],
            'password' => ['required', 'min:6'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'jabatan' => ['required', 'string'],
            'level_id' => ['nullable'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:6', Rules\Password::defaults()],


        ]);

        $user = User::create([
             'name' => $request->name,
            'nip' => $request->nip,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'image' => $request->image,
            'jabatan' => $request->jabatan,
            'level_id' => $request->level_id

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
