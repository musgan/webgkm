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
                @if(session()->has('message_success'))
                    <div class="alert alert-success">
                        {{ session()->get('message_success') }}
                    </div>
                @endif

                <div class="d-flex justify-content-end mb-3">
                    <a href="{{url('admin/post/create')}}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Short Text</th>
                        <th class="text-center" width="100px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $index => $row)
                        <tr>
                            <td>{{$index +1}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->short_text}}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-warning" href="{{url(implode('/',['admin/post',$row->id,'edit']))}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="{{url(implode('/',['admin/post',$row->id,'edit']))}}">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push("js")
    <script type="text/javascript">
        new DataTable('#dataTable');
    </script>
@endpush
