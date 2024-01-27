<div class="card mb-3">
    <div class="card-body">
        <nav aria-label="breadcrumb" class="d-flex justify-content-between">
            <h4>
                {{$breadcrumb["title"]}}
            </h4>
            <ol class="breadcrumb">
                @foreach($breadcrumb["path"] as $row)
                    <li class="breadcrumb-item {{$row["status"]}}">
                        @if($row["status"] !== "active")
                            <a href="{{$row["path"]}}">
                                {{$row["name"]}}
                            </a>
                        @else
                            {{$row["name"]}}
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>
</div>
