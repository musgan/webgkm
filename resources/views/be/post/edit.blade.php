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
                        "path"  => url('admin/post'),
                        "status" => ''
                    ],
                    [
                        "name" => "Edit",
                        "path"  => "#",
                        "status" => "active"
                    ],
                ]
            ];
    @endphp
    <div class="container">
        @include("be.component.breadcrumb", compact('breadcrumb'))
        <form method="POST" action="{{url("admin/post/".$data->id)}}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <button class="btn btn-info"  type="button" data-bs-toggle="modal" data-bs-target="#mediaModal"><i class="fa-solid fa-plus"></i> Media</button>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include("be.post.form", compact('data'))
                </div>
            </div>
        </form>
    </div>
@endsection
@include("be.component.mediaModal")
