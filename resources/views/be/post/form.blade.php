<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <input type="text" class="form-control" id="post-title" name="title" placeholder="Judul" maxlength="200" value="{{$data?->title??old('title')}}" />
        </div>
        <ul class="list-unstyled" id="contents">
            @foreach(($data?->postContents()??[]) as $index => $row)
                @if($row->type === "text")
                    <li class="mb-3 border" id="postcontent{{$index}}">
                        <div class="d-flex justify-content-between p-2">
                            <div>
                                <button type="button" class="btn btn-info btn-sm handle-post-content">
                                    <i class="fas fa-arrows-alt handle"></i>
                                </button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger btn-sm delete-post-content"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                        <input type="hidden" name="contents[{{$index}}][id]" value="{{$row->id}}" />
                        <input type="hidden" name="contents[{{$index}}][type]" value="text" />
                        <textarea class="form-control" id="textEditor{{$index}}" placeholder="Tuliskan Sesuatu" name="contents[{{$index}}][data]">{!! $row->content !!}</textarea>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <input type="text" class="form-control" name="slug" placeholder="slug" id="slug" maxlength="200" value="{{$data?->slug??old('slug')}}" {{isset($data)?'requred':''}}/>
        </div>
        <div class="mb-3">
            <textarea rows="5" type="text" class="form-control" name="short_text" placeholder="short text" maxlength="200">{{$data?->short_text??old('short_text')}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar Unggulan</label>
            <img src="{{isset($data)?url($data?->gambar_unggulan):''}}" class="img-fluid mb-3" alt="" />
            <input type="file" name="gambar_unggulan" class="form-control">
        </div>
    </div>
</div>

@push('js')
    <script  type="text/javascript">
        $(document).ready(function() {
            const total_post = {{count($data?->postContents()??[]) }};
            const postTitle = document.getElementById("post-title")
            const slug = document.getElementById("slug")
            postTitle.addEventListener("keyup", function (e) {
                const title = e.target.value
                let finalSlug = title.toLowerCase()
                finalSlug = finalSlug.replaceAll(/[^a-zA-Z0-9 ]/g, '')
                finalSlug = finalSlug.replaceAll(/\s\s+/g, ' ')
                finalSlug = finalSlug.replaceAll(' ', '-')
                slug.value = finalSlug
            })
            for (index = 0; index < total_post; index++) {
                $(`#textEditor${index}`).summernote({
                    placeholder: 'Tuliskan Sesuatu',
                    tabsize: 2,
                    height: 300
                });
            }

            function getParentElement(element) {
                const el = element.parentElement
                if (el.nodeName.toLowerCase() === "li")
                    return el
                else return getParentElement(el)
            }

            $(document).on('click', '.delete-post-content', function (e) {
                const parent = getParentElement(e.target);
                console.log("parent", parent)
            })
            Sortable.create(contents, {
                handle: '.handle-post-content',
            });
        });
    </script>
@endpush


