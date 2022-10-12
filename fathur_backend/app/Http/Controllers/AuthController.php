<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/panel');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function registrationSave(Request $request)
    {
        $validate = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
        ]);
        $response = Http::post(env('API_URL') . '/api/user', [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
        ]);
        if ($response) {
            return back()->with('success', 'Registrasi berhasil');
        } else {
            return back()->with('failed', 'Registrasi gagal');
        }
    }
    public function forgot()
    {
        return view('auth.forgot');
    }
    public function forgotAction(Request $request)
    {
        $validate = $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);
        $data = User::where('email', $request->email)->first();
        if ($data) {
            $response = Http::put(env('API_URL') . '/api/user/' . $data->id, [
                'name'      => $data->name,
                'email'      => $data->email,
                'password'  => $request->password,
            ]);
            return back()->with('success', 'Registrasi berhasil');
        } else {
            return back()->with('failed', 'Registrasi gagal');
        }
    }
    public function resetpassword()
    {
        User::where('id', auth()->user()->id)->update([
            'password'  => Hash::make('123')
        ]);
        Alert::success('Success', 'Berhasil mereset password');
        return back();
    }
}
