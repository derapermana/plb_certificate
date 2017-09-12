<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class GuruLoginController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest:guru', ['except' => ['logout']]);
  }
  public function showLoginForm()
  {
    return view('auth.guru-login');
  }

  public function login(Request $request)
  {
    // Validate the form
    $this->validate($request, [
      'email'     => 'required|email',
      'password'  => 'required|min:6',
    ]);
    // Attempt to log the user in
    if (Auth::guard('guru')->attempt([
      'email' => $request->email,
      'password' => $request->password,
      'is_active' => '1'],
      $request->remember)) {
        // If successful, redirect to intended locale_get_display_region
        return redirect()->intended(route('guru.dashboard'));
      }

    // If unsuccesssful, redirect to login form with form data
    return redirect()->back()->withInput($request->only('email', 'remember'));
  }

  public function logout()
  {
    Auth::guard('guru')->logout();
    return redirect('/guru');
  }
}
