<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $response = Http::get(env('API_URL') . '/api/article')->json()['data'];
        return view('index', compact('response'));
    }
    public function detail($slug)
    {
        $response = Http::get(env('API_URL') . '/api/article')->json()['data'];
        return view('index', compact('response'));
    }
    public function dashboard()
    {
        $response = Http::get(env('API_URL') . '/api/article')->json()['data'];
        $data = 0;
        foreach ($response as $item) {
            if ($item['user_id'] == auth()->user()->id) {
                $data++;
            }
        }
        return view('dashboard', compact('data'));
    }
    public function profil()
    {
        return view('profil');
    }
}
