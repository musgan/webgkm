@extends("fe.layouts.index")
@extends("fe.layouts.breadcrumbs")
@section("content")
    <div class="container mt-5">
        <div class="post-title">
            <h2 class="text-center">
                The age old question of chicken first or the egg?
            </h2>
            <h6 class="text-center">
                By: Admin | 11 AUG 2024
            </h6>
        </div>
        <div class="post-image d-flex justify-content-center">
            <img src="https://html.waituk.com/roxine/img/img-37.jpg" class="img-responsive" />
        </div>
        <div class="post-content">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
    </div>
@endsection

@section("css")
    <style>
        .post-title{
            margin-bottom: 50px;
        }
        .post-image{
            margin-bottom: 50px;
        }
    </style>
@endsection
