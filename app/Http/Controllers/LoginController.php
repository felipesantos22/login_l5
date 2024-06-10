<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login()
    {
        return view('login');
    }

    public function home()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $user = $this->user->create($request->all());
        return $user;
    }

    public function index()
    {
        $user = $this->user->all();
        return $user;
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    
}