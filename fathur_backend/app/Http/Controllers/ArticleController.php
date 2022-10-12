<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.index');
    }

    public function data()
    {
        $response = Http::get(env('API_URL') . '/api/article')->json()['data'];
        $html = null;
        $i = 0;
        foreach ($response as $key => $item) {
            if ($item['user_id'] == auth()->user()->id) {
                $html .= '<tr>
                <td>' . ++$i . '</td>
                <td>' . $item['title'] . '</td>
                <td>' . $item['description'] . '</td>
                <td><a href="/uploads/article/' . $item['img'] . '" target="_blank">' . $item['img'] . '</a></td>
                <td>
                    <a href="/article/edit/' . $item['id'] . '" class="btn btn-warning btn-sm"><i class="feather icon-edit"> </i></a>
                    <a href="/article/delete/' . $item['id'] . '" class="btn btn-danger btn-sm"><i class="feather icon-x"> </i></a>
                </td>';
            }
        }
        return $html;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'img'           => 'required',
        ]);

        $file = Carbon::now('Asia/Makassar')->format('Ymd') . rand(100, 999) . '_' . $request->img->getClientOriginalName();
        $request->img->move("uploads/article/", $file);

        $response = Http::post(env('API_URL') . '/api/article', [
            'title'         => $request->title,
            'description'   => $request->description,
            'img'           => $file,
            'user_id'       => Auth()->user()->id ?? '1',
        ]);

        Alert::success('Success', 'Berhasil menambah data');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Http::get(env('API_URL') . '/api/article/' . $id)->json()['data'][0];
        return view('article.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'img'           => 'required',
        ]);

        $response = Http::get(env('API_URL') . '/api/article/' . $id)->json()['data'][0];
        File::delete('uploads/article/' . $response['img']);

        $file = Carbon::now('Asia/Makassar')->format('Ymd') . rand(100, 999) . '_' . $request->img->getClientOriginalName();
        $request->img->move("uploads/article/", $file);

        $response = Http::put(env('API_URL') . '/api/article/' . $id, [
            'title'         => $request->title,
            'description'   => $request->description,
            'img'           => $file,
            'user_id'       => Auth()->user()->id ?? '1',
        ]);

        Alert::success('Success', 'Berhasil memperbaharui data');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::get(env('API_URL') . '/api/article/' . $id)->json()['data'][0];
        File::delete('uploads/article/' . $response['img']);
        $response = Http::delete(env('API_URL') . '/api/article/' . $id);
        return back();
    }
}
