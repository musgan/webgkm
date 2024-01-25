@extends("fe.layouts.index")
@extends("fe.layouts.breadcrumbs")
@section("content")
<div class="container p-4">
    <div class="posts">
        <div class="row">
            <div class="post col-md-4">
                <div class="post-image" style="background: url('https://html.waituk.com/roxine/img/img-30.jpg');background-size: cover">
                    <div class="post-date">
                        17<br/>Jun
                    </div>
                </div>
                <div class="p-3 post-text">
                    <h4 class="post-title">HEADING SOUTH</h4>
                    <div class="post-text">
                        This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Auctor, nisi elit consequat ipsum,
                    </div>
                    <div class="post-read">
                        <a href="{{url('post/detail/heading-south')}}">Read Story</a>
                    </div>
                </div>
            </div>

            <div class="post col-md-4">
                <div class="post-image" style="background: url('https://html.waituk.com/roxine/img/img-30.jpg');background-size: cover">
                    <div class="post-date">
                        17<br/>Jun
                    </div>
                </div>
                <div class="p-3 post-text">
                    <h4 class="post-title">HEADING SOUTH</h4>
                    <div class="post-text">
                        This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Auctor, nisi elit consequat ipsum,
                    </div>
                    <div class="post-read">
                        <a href="#">Read Story</a>
                    </div>
                </div>
            </div>

            <div class="post col-md-4">
                <div class="post-image" style="background: url('https://html.waituk.com/roxine/img/img-30.jpg');background-size: cover">
                    <div class="post-date">
                        17<br/>Jun
                    </div>
                </div>
                <div class="p-3 post-text">
                    <h4 class="post-title">HEADING SOUTH</h4>
                    <div class="post-text">
                        This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Auctor, nisi elit consequat ipsum,
                    </div>
                    <div class="post-read">
                        <a href="#">Read Story</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center p-3">
        <button class="btn btn-primary btn-md" id="btn-loadmore">Load More</button>
    </div>
</div>
@endsection

@section("css")
    <style>
        .post-image {
            height: 300px;
            position: relative;
        }
        .post-text{
            background-color: #f8f8f8;
        }

        .post-date{
            padding: 10px;
            text-align: right;
            width: 70px;
            right: 0px;
            color: white;
            position: absolute;
            background-color: #1a1d20;
        }
    </style>
@endsection
