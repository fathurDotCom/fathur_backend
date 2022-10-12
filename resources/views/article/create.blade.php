@extends('layout.app')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Article</h4>
                                    <div class="card-toolbar">
                                        <a class="btn btn-secondary" href="{{ route('article.index') }}"></i> Kembali</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <form action="{{ Request::is('panel/article/create*') ? route('article.store') : route('article.update', ['id' => $data['id']]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title">Judul</label>
                                                <input type="text" class="form-control" name="title" id="title" value="{{ @$data['title'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Deskripsi</label>
                                                <textarea class="form-control" name="description" id="description">{!! @$data['description'] !!}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="img">Foto</label>
                                                <input type="file" class="form-control" name="img" id="img">
                                            </div>
                                            @isset($data)
                                                <div class="form-group">
                                                    <a href="{{ asset('/uploads/article/' . $data['img']) }}" target="_blank"><img src="{{ asset('/uploads/article/' . $data['img']) }}" alt="img" height="100px"></a>
                                                </div>
                                            @endisset
                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    @push('css')
    @endpush

    @push('script')
    @endpush
@endsection
