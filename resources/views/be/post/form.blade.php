<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <input type="text" class="form-control" id="post-title" name="title" placeholder="Judul" maxlength="200" value="{{$data?->title??old('title')}}" />
        </div>
        <ul class="list-unstyled" id="contents">

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
            <img src="{{url($data?->gambar_unggulan)}}" class="img-fluid mb-3" alt="" />
            <input type="file" name="gambar_unggulan" class="form-control">
        </div>
    </div>
</div>

@push('js')
    <script  type="text/javascript">
        const postTitle = document.getElementById("post-title")
        const slug = document.getElementById("slug")
        postTitle.addEventListener("keyup", function(e){
            const title = e.target.value
            let finalSlug = title.toLowerCase()
            finalSlug = finalSlug.replaceAll(/[^a-zA-Z0-9 ]/g,'')
            finalSlug = finalSlug.replaceAll(/\s\s+/g, ' ')
            finalSlug = finalSlug.replaceAll(' ','-')
            console.log("final slug", finalSlug)
            slug.value = finalSlug
        })
    </script>
@endpush


