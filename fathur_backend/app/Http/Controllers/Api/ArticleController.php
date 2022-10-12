<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Helpers\ApiRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        if ($data) {
            return ApiRequest::render(200, 'Success', $data);
        } else {
            return ApiRequest::render(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'user_id'       => 'required',
        ]);
        $data = Article::create($validate);
        if ($data) {
            return ApiRequest::render(200, 'Success', 'Data berhasil ditambah');
        } else {
            return ApiRequest::render(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::where('id', $id)->get();
        if ($data->count() > 0) {
            return ApiRequest::render(200, 'Success', $data);
        } else {
            return ApiRequest::render(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'user_id'       => 'required',
        ]);

        $data = Article::where('id', $id)->update($validate);
        if ($data) {
            return ApiRequest::render(200, 'Success', 'Data berhasil diupdate');
        } else {
            return ApiRequest::render(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Article::where('id', $id)->delete();
        if ($data) {
            return ApiRequest::render(200, 'Success', 'Data berhasil dihapus');
        } else {
            return ApiRequest::render(400, 'Failed');
        }
    }
}
