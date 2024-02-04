@push('js')
    <div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="list-group rounded-0">
                        <a href="#" id="add_text" class="itemMedia list-group-item list-group-item-action d-flex align-items-center"><i class="fa-solid fa-file-lines p-3"></i> Tambah Text</a>
                        <a href="#" id="add_image" class="itemMedia list-group-item list-group-item-action d-flex align-items-center"><i class="fa-solid fa-image p-3"></i> Tambah Gambar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <li class="d-none mb-3 border" id="media-text">
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
        <input type="hidden" name="" value="text">
        <textarea class="form-control" placeholder="Tuliskan Sesuatu" name="contents[]"></textarea>
    </li>

    <li class="d-none mb-3 border" id="media-image">
        <div class="d-flex justify-content-between p-2">
            <div class="d-flex gap-3">
                <button type="button" class="btn btn-info btn-sm handle-post-content">
                    <i class="fas fa-arrows-alt handle"></i>
                </button>
                <button type="button" class="btn-add-images btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Gambar</button>
                <input type="file" class="d-none open-images" accept="image/png, image/gif, image/jpeg"  multiple>
            </div>
            <div>
                <button type="button" class="btn btn-danger btn-sm delete-post-content"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
        <div class="image-contents container container-fluid row">

        </div>
        <input type="hidden" name="" value="image">
    </li>

    <div id="template-image" class="d-none col-md-3 p-1 image-item">
        <div class="d-flex justify-content-end w-100 p-1">
            <button type="button" class="btn btn-sm btn-danger delete-image-item"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>

    <script type="text/javascript">
        const mediaModal =  new bootstrap.Modal(document.getElementById('mediaModal'))
        const itemMedia = document.getElementsByClassName("itemMedia")
        const contents = document.getElementById("contents");
        const mediaText = document.getElementById("media-text");
        const mediaImage = document.getElementById("media-image");
        const templateImage = document.getElementById('template-image')



        for(let i=0;i<itemMedia.length;i++){
            itemMedia[i].addEventListener('click',function (e){
                e.preventDefault()
                addMedia(e?.target?.id??"")
            })
        }
        function addMedia(id){
            mediaModal.hide()
            switch (id){
                case "add_text":
                    addText();
                    break;
                case "add_image":
                    addImage();
                    break;
                default:
                    break;
            }
        }
        function addText(){
            let id = Date.now();
            const addText = mediaText.cloneNode(true)
            const textArea = addText.getElementsByTagName('textarea')[0]
            const type = addText.getElementsByTagName('input')[0]
            addText.id = id
            type.name = `contents[${id}][type]`
            textArea.name = `contents[${id}][data]`
            textArea.id = `text_${id}`

            addText.classList.remove("d-none")
            contents.appendChild(addText);
            $(`#${textArea.id}`).summernote({
                placeholder: 'Tuliskan Sesuatu',
                tabsize: 2,
                height: 300
            });
        }
        function addImage(){
            let id = Date.now();
            const addImage = mediaImage.cloneNode(true)
            // const textArea = addImage.getElementsByTagName('textarea')[0]
            const type = addImage.getElementsByTagName('input')[0]
            addImage.id = id
            type.name = `contents[${id}][type]`
            // textArea.name = `contents[${id}][data]`
            // textArea.id = id

            addImage.classList.remove("d-none")
            contents.appendChild(addImage);
        }

        $(document).on('click','.btn-add-images', function (e){
            $(this).parent().find('.open-images')?.click()
        })
        $(document).on('change','.open-images', onchangeAddImages)

        function onchangeAddImages(e){
            // you can use this method to get file and perform respective operations
            const parent = getParentElement(e.target)
            const contents = $(parent).find('.image-contents')
            let files =   $(this)[0].files;
            for(index=0; index<files.length; index++){
                const template = templateImage.cloneNode(true);
                template.style = `height:200px;background-image:url("${URL.createObjectURL(files[index])}");background-position: center;background-size: cover;`;
                template.classList.remove("d-none")
                template.id = "";
                contents.append(template);
            }

        }

        function getParentElement(element) {
            const el = element.parentElement
            if (el.nodeName.toLowerCase() === "li")
                return el
            else return getParentElement(el)
        }

        function getParentImageContentsElement(element) {
            const el = element.parentElement
            console.log("classlist",el.classList, el.classList.contains("image-item"))
            if (el.classList.contains("image-item"))
                return el
            else return getParentImageContentsElement(el)
        }

        $(document).on('click','.delete-image-item',function(e){
            const parent = getParentImageContentsElement(e.target)
            $(parent).remove()
        })

    </script>
@endpush
