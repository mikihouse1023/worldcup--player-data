<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
/*ログイン*/
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            ]);
            
            if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return $this->authenticated($request, Auth::user());
            }
            
            return back()->withErrors([
            'email' => '認証情報が一致しません。',
            ])->onlyInput('email');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 0) {
            return redirect()->route('players.index');
        } else {
            return redirect()->route('general.index');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
       

    }
}
