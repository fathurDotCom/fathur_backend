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
                        <div class="col-lg-10 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-title">Profil</h1>
                                    <div class="card-toolbar">
                                        <a href="{{ route('panel.index') }}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" type="text" name="name" value="{{ auth()->user()->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="text" name="email" value="{{ auth()->user()->email }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('panel.resetpassword') }}" class="btn btn-warning">Reset Password</a>
                                    </div>
                                    <p>Default password: 123</p>
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
