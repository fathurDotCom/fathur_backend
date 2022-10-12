@extends('layout.app')
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
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Total Article</h1>
                                        </div>
                                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                                            <div class="avatar-content">
                                                <h1 class="text text-white">{{ $data }}</h1>
                                            </div>
                                        </div>
                                    </div>
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
