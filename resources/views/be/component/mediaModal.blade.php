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

    <li class="d-none mb-3" id="media-text">
        <input type="hidden" name="" value="text">
        <textarea class="form-control" placeholder="Tuliskan Sesuatu" name="contents[]"></textarea>
    </li>

    <script type="text/javascript">
        const mediaModal =  new bootstrap.Modal(document.getElementById('mediaModal'))
        const itemMedia = document.getElementsByClassName("itemMedia")
        const contents = document.getElementById("contents");
        const mediaText = document.getElementById("media-text");



        for(let i=0;i<itemMedia.length;i++){
            itemMedia[i].addEventListener('click',function (e){
                e.preventDefault()
                addMedia(e?.target?.id??"")
            })
        }
        function addMedia(id){
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
            mediaModal.hide()
            let id = Date.now();
            const addText = mediaText.cloneNode(true)
            const textArea = addText.getElementsByTagName('textarea')[0]
            const type = addText.getElementsByTagName('input')[0]
            type.name = `contents[${id}][type]`
            textArea.name = `contents[${id}][data]`
            textArea.id = id

            addText.classList.remove("d-none")
            contents.appendChild(addText);
            $(`#${id}`).summernote({
                placeholder: 'Tuliskan Sesuatu',
                tabsize: 2,
                height: 300
            });
        }
        function addImage(){

        }
    </script>
@endpush
