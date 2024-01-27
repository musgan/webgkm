@extends('layouts.app')

@section('content')
    @php
        $breadcrumb = [
            "title" => "POST",
            "path" =>
                [
                    [
                        "name" => "Home",
                        "path"  => url('admin/home'),
                        "status" => ""
                    ],
                    [
                        "name" => "Post",
                        "path"  => '',
                        "status" => 'active'
                    ],
                ]
            ];
    @endphp

    <div class="container">
        @include("be.component.breadcrumb", compact('breadcrumb'))
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{url('admin/post/create')}}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Short Text</th>
                        <th>Gambar Unggulan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
