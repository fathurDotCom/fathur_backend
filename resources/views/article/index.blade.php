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
                                        <a class="btn btn-primary" href="{{ route('article.create') }}"><i class="feather icon-plus-square"></i> Tambah</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Title</th>
                                                                <th>Deskripsi</th>
                                                                <th>img</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="body">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
    @endpush

    @push('script')
        <script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.table').DataTable();
            });

            $.ajax({
                url: "{{ route('article.data') }}",
                method: "GET",
                success: function(data) {
                    $('#body').html(data);
                }
            });
        </script>
    @endpush
@endsection
