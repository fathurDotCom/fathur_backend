@extends('layout.front')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 col-sm-12">
                            <div class="text-right">
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            </div>
                            <div class="text-left">
                                <h1>Artikel</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- <h1 class="card-title">Artikel</h1> --}}
                                </div>
                                <div class="card-body">
                                    @foreach ($response as $item)
                                        <div class="row mb-5">
                                            <div class="col-3 text-left">
                                                <img src="{{ asset('uploads/article/' . $item['img']) }}" alt="" height="150px">
                                            </div>
                                            <div class="col-9">
                                                <a href=""></a>
                                                <h3>{{ $item['title'] }}</h3>
                                                <p>{!! $item['description'] !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    @push('css')
    @endpush

    @push('script')
    @endpush
@endsection
