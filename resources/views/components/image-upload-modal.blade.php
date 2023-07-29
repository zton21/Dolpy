@props(['fileId'])

<div id="image-upload-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Confirm Image Upload</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body mx-auto">
                <div class="p-2 rounded shadow d-inline-flex flex-wrap bg-primary-10">
                    <img id="image-input" src="" alt="" class="w-100 max-vh-50">
                    <div class="ps-0 text-start">
                        <div id="imageName" class="fs-5 fw-bold"></div>
                        <div style="font-size: calc(0.7rem + 0.1vw); color: #A3A3A5;"  id="imageDesc"></div>
                    </div>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="task" value="send_image"/>
                <input type="hidden" name="file_id" id="file-id-input" value="{{ $fileId }}">
                <input type="hidden" name="image_name" id="image-name-input" value="">
                <input type="hidden" name="image_size" id="image-size-input" value="">
                <input type="hidden" name="image_extension" id="image-extension-input" value="">
                <input type="file" id="imageInput" name="imageInput" class="d-none" accept="image/*">
                <div class="modal-footer">
                    <button type="submit" id="uploadBtn" class="btn btn-primary w-100">Upload Image</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var maximageSizeInBytes = 10 * 1024 * 1024; // 10 MB
    var image = null;
    
    var img = document.getElementById('imageInput');
    document.getElementById('imageInput').addEventListener('change', () => {setTimeout(function() {
        // alert($('#imageInput').html());  
        
        var fleName = document.getElementById('imageName');
        var imageDesc = document.getElementById('imageDesc');
        image = img.files[0];
        // alert(image)
        
        if (image.size > maximageSizeInBytes) {
            alert('image size exceeds the limit of 10 MB.');
            this.value = null; // Clear the image input
            imageName.innerHTML = 'No image selected';
            imageDesc.innerHTML = '';
            return;
        }
        
        imageName.innerHTML = image.name;
        imageDesc.innerHTML = getimageSize(image.size) + ', ' + getimageExtension(image.name).toUpperCase();

        var extension = getimageExtension(image.name).toUpperCase();
        var imageNameInput = document.getElementById('image-name-input');
        var imageSizeInput = document.getElementById('image-size-input');
        var imageExtensionInput = document.getElementById('image-extension-input');
        // var imageInput = document.getElementById('image-input');

        imageNameInput.value = image.name;
        imageSizeInput.value = getimageSize(image.size);
        imageExtensionInput.value = getimageExtension(image.name).toUpperCase();
        // imageInput.value = image;

        var showImage = document.getElementById('image-input')
        var reader = new FileReader();
        reader.onload = function(event) {
            showImage.src = event.target.result; // Set the src attribute with the data URL
        };
        reader.readAsDataURL(image);

        $('#image-upload-modal').modal('show');
    })}, 0);

    // $('#uploadBtn').click(function(e) {
    //         // e.preventDefault();
    //         // let url = URL.createObjectURL(e.target.images[0]);
    //         let fd = new FormData();
    //         console.log(image);
    //         fd = fd.append('imageInput', $img.images[0]);
            
    //         $.post({
    //             data: fd,
    //             processData: false,
    //             contentType: false,
    //         });
    //     });

    function getimageSize(size) {
        var kilobytes = size / 1024;
        if (kilobytes < 1024) {
            return kilobytes.toFixed(0) + ' KB';
        } else {
            var megabytes = kilobytes / 1024;
            return megabytes.toFixed(2) + ' MB';
        }
    }

    function getimageExtension(imagename) {
        return imagename.split('.').pop();
    }
</script>
