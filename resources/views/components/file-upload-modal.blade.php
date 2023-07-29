@props(['fileId'])

<div id="file-upload-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Confirm File Upload</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body mx-auto">
                <div class="p-2 rounded shadow d-inline-flex flex-wrap bg-primary-10">
                    <div class="my-auto me-2" id="fileIconDoc">
                        <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.9118 1.6787e-06H9.05556C8.88464 -0.000129698 8.71536 0.0305722 8.5574 0.0903544C8.39943 0.150137 8.25587 0.237829 8.13491 0.348423C8.01395 0.459018 7.91796 0.590349 7.85242 0.734919C7.78688 0.879489 7.75307 1.03447 7.75293 1.191V6.5L19.8391 9.75L31.2155 6.5V1.191C31.2153 1.03438 31.1815 0.879323 31.1159 0.734688C31.0503 0.590053 30.9542 0.458677 30.8331 0.348069C30.712 0.237462 30.5684 0.149791 30.4103 0.0900671C30.2522 0.0303438 30.0828 -0.000261161 29.9118 1.6787e-06Z" fill="#41A5EE"/>
                            <path d="M31.2155 6.5H7.75293V13L19.8391 14.95L31.2155 13V6.5Z" fill="#2B7CD3"/>
                            <path d="M7.75293 13V19.5L19.1283 20.8L31.2155 19.5V13H7.75293Z" fill="#185ABD"/>
                            <path d="M9.05556 26H29.9107C30.0818 26.0004 30.2513 25.9699 30.4095 25.9102C30.5677 25.8506 30.7115 25.7629 30.8327 25.6523C30.9539 25.5417 31.0501 25.4102 31.1158 25.2655C31.1815 25.1208 31.2153 24.9657 31.2155 24.809V19.5H7.75293V24.809C7.75307 24.9655 7.78688 25.1205 7.85242 25.2651C7.91796 25.4097 8.01395 25.541 8.13491 25.6516C8.25587 25.7622 8.39943 25.8499 8.5574 25.9096C8.71536 25.9694 8.88464 26.0001 9.05556 26Z" fill="#103F91"/>
                            <path opacity="0.1" d="M16.4029 5.19995H7.75293V21.4499H16.4029C16.7476 21.4484 17.0777 21.3225 17.3217 21.0996C17.5657 20.8766 17.704 20.5746 17.7066 20.259V6.39095C17.704 6.07529 17.5657 5.77327 17.3217 5.55034C17.0777 5.32741 16.7476 5.20152 16.4029 5.19995Z" fill="black"/>
                            <path opacity="0.2" d="M15.6921 5.84998H7.75293V22.1H15.6921C16.0367 22.0984 16.3669 21.9725 16.6109 21.7496C16.8549 21.5267 16.9932 21.2246 16.9958 20.909V7.04098C16.9932 6.72531 16.8549 6.4233 16.6109 6.20037C16.3669 5.97743 16.0367 5.85155 15.6921 5.84998Z" fill="black"/>
                            <path opacity="0.2" d="M15.6921 5.84998H7.75293V20.8H15.6921C16.0367 20.7984 16.3669 20.6725 16.6109 20.4496C16.8549 20.2267 16.9932 19.9246 16.9958 19.609V7.04098C16.9932 6.72531 16.8549 6.4233 16.6109 6.20037C16.3669 5.97743 16.0367 5.85155 15.6921 5.84998Z" fill="black"/>
                            <path opacity="0.2" d="M14.9812 5.84998H7.75293V20.8H14.9812C15.3259 20.7984 15.656 20.6725 15.9001 20.4496C16.1441 20.2267 16.2824 19.9246 16.285 19.609V7.04098C16.2824 6.72531 16.1441 6.4233 15.9001 6.20037C15.656 5.97743 15.3259 5.85155 14.9812 5.84998Z" fill="black"/>
                            <path d="M1.9463 5.84998H14.9813C15.3266 5.84971 15.6579 5.97501 15.9023 6.19834C16.1468 6.42166 16.2844 6.72475 16.285 7.04098V18.959C16.2844 19.2752 16.1468 19.5783 15.9023 19.8016C15.6579 20.0249 15.3266 20.1502 14.9813 20.15H1.9463C1.77528 20.1502 1.60589 20.1196 1.4478 20.0599C1.28971 20.0002 1.14602 19.9125 1.02495 19.8019C0.903871 19.6913 0.807782 19.5599 0.742174 19.4153C0.676565 19.2707 0.642721 19.1156 0.642578 18.959V7.04098C0.642721 6.88436 0.676565 6.7293 0.742174 6.58466C0.807782 6.44003 0.903871 6.30865 1.02495 6.19804C1.14602 6.08744 1.28971 5.99977 1.4478 5.94004C1.60589 5.88032 1.77528 5.84971 1.9463 5.84998Z" fill="url(#paint0_linear_750_2623)"/>
                            <path d="M5.9932 14.988C6.01832 15.172 6.03579 15.332 6.04343 15.469H6.074C6.08492 15.339 6.10894 15.182 6.14498 14.999C6.18101 14.816 6.21267 14.661 6.24216 14.534L7.61248 9.127H9.38571L10.8052 14.453C10.8878 14.7824 10.9469 15.1165 10.9821 15.453H11.0061C11.0322 15.1254 11.0814 14.7997 11.1535 14.478L12.288 9.12H13.9007L11.9091 16.868H10.0234L8.67271 11.742C8.6334 11.594 8.58899 11.4013 8.53949 11.164C8.49 10.9267 8.45942 10.7533 8.44778 10.644H8.42485C8.40956 10.77 8.37899 10.957 8.33313 11.205C8.28727 11.454 8.25124 11.637 8.22394 11.757L6.95407 16.871H5.03671L3.03418 9.127H4.67202L5.90694 14.545C5.9438 14.6912 5.97259 14.8391 5.9932 14.988Z" fill="white"/>
                            <defs>
                            <linearGradient id="paint0_linear_750_2623" x1="3.36575" y1="4.91398" x2="12.2772" y2="21.7653" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#2368C4"/>
                            <stop offset="0.5" stop-color="#1A5DBE"/>
                            <stop offset="1" stop-color="#1146AC"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="my-auto me-2" id="fileIconExcel">
                        <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><linearGradient id="a" x1="4.494" y1="-2092.086" x2="13.832" y2="-2075.914" gradientTransform="translate(0 2100)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#18884f"></stop><stop offset="0.5" stop-color="#117e43"></stop><stop offset="1" stop-color="#0b6631"></stop></linearGradient></defs><title>file_type_excel</title><path d="M19.581,15.35,8.512,13.4V27.809A1.192,1.192,0,0,0,9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5Z" style="fill:#185c37"></path><path d="M19.581,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5L19.581,16l5.861,1.95L30,16V9.5Z" style="fill:#21a366"></path><path d="M8.512,9.5H19.581V16H8.512Z" style="fill:#107c41"></path><path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate"></path><path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate"></path><path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate"></path><path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate"></path><path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)"></path><path d="M5.7,19.873l2.511-3.884-2.3-3.862H7.758L9.013,14.6c.116.234.2.408.238.524h.017c.082-.188.169-.369.26-.546l1.342-2.447h1.7l-2.359,3.84,2.419,3.905H10.821l-1.45-2.711A2.355,2.355,0,0,1,9.2,16.8H9.176a1.688,1.688,0,0,1-.168.351L7.515,19.873Z" style="fill:#fff"></path><path d="M28.806,3H19.581V9.5H30V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#33c481"></path><path d="M19.581,16H30v6.5H19.581Z" style="fill:#107c41"></path></g></svg>
                    </div>
                    <div class="my-auto me-2" id="fileIconPpt">
                        <svg width="32px" height="32px" viewBox="0 -1.27 110.031 110.031" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M57.893 0h7.087v11.25c13.363.075 26.738-.138 40.088.062 2.875-.275 5.125 1.962 4.838 4.837.212 23.35-.05 46.712.125 70.075-.125 2.525.25 5.325-1.2 7.562-1.825 1.325-4.2 1.15-6.338 1.25-12.5-.062-25-.037-37.513-.037v12.5h-7.774c-19.05-3.475-38.138-6.65-57.2-10-.013-29.162 0-58.325 0-87.475C19.292 6.688 38.58 3.288 57.893 0z" fill="#d24625"></path><path d="M64.98 15h41.25v76.25H64.98v-10h30v-5h-30V70h30v-5H64.993c-.013-2.45-.013-4.9-.024-7.35 4.95 1.537 10.587 1.5 15.012-1.476 4.788-2.837 7.288-8.25 7.7-13.65-5.487-.038-10.975-.025-16.45-.025-.012-5.438.062-10.875-.112-16.3-2.05.4-4.1.825-6.138 1.262V15z" fill="#ffffff"></path><path d="M73.743 23.587c8.688.4 15.987 7.712 16.45 16.375-5.488.063-10.975.038-16.463.038 0-5.475-.012-10.95.013-16.413z" fill="#d24625"></path><path d="M20.055 33.025c6.788.325 15.013-2.688 20.638 2.4 5.388 6.538 3.963 18.562-4.025 22.476-2.837 1.449-6.087 1.25-9.175 1.149-.013 4.888-.024 9.775-.013 14.663a1323.27 1323.27 0 0 0-7.438-.625c-.112-13.351-.136-26.713.013-40.063z" fill="#ffffff"></path><path d="M27.48 39.788c2.463-.113 5.513-.562 7.176 1.75 1.425 2.45 1.35 5.675.162 8.2-1.425 2.575-4.65 2.325-7.138 2.625-.263-4.188-.237-8.376-.2-12.575z" fill="#d24625"></path></g></svg>
                    </div>
                    <div class="my-auto me-2" id="fileIconPdf">
                        <svg height="32px" width="32px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#E2E5E7;" d="M128,0c-17.6,0-32,14.4-32,32v448c0,17.6,14.4,32,32,32h320c17.6,0,32-14.4,32-32V128L352,0H128z"></path> <path style="fill:#B0B7BD;" d="M384,128h96L352,0v96C352,113.6,366.4,128,384,128z"></path> <polygon style="fill:#CAD1D8;" points="480,224 384,128 480,128 "></polygon> <path style="fill:#F15642;" d="M416,416c0,8.8-7.2,16-16,16H48c-8.8,0-16-7.2-16-16V256c0-8.8,7.2-16,16-16h352c8.8,0,16,7.2,16,16 V416z"></path> <g> <path style="fill:#FFFFFF;" d="M101.744,303.152c0-4.224,3.328-8.832,8.688-8.832h29.552c16.64,0,31.616,11.136,31.616,32.48 c0,20.224-14.976,31.488-31.616,31.488h-21.36v16.896c0,5.632-3.584,8.816-8.192,8.816c-4.224,0-8.688-3.184-8.688-8.816V303.152z M118.624,310.432v31.872h21.36c8.576,0,15.36-7.568,15.36-15.504c0-8.944-6.784-16.368-15.36-16.368H118.624z"></path> <path style="fill:#FFFFFF;" d="M196.656,384c-4.224,0-8.832-2.304-8.832-7.92v-72.672c0-4.592,4.608-7.936,8.832-7.936h29.296 c58.464,0,57.184,88.528,1.152,88.528H196.656z M204.72,311.088V368.4h21.232c34.544,0,36.08-57.312,0-57.312H204.72z"></path> <path style="fill:#FFFFFF;" d="M303.872,312.112v20.336h32.624c4.608,0,9.216,4.608,9.216,9.072c0,4.224-4.608,7.68-9.216,7.68 h-32.624v26.864c0,4.48-3.184,7.92-7.664,7.92c-5.632,0-9.072-3.44-9.072-7.92v-72.672c0-4.592,3.456-7.936,9.072-7.936h44.912 c5.632,0,8.96,3.344,8.96,7.936c0,4.096-3.328,8.704-8.96,8.704h-37.248V312.112z"></path> </g> <path style="fill:#CAD1D8;" d="M400,432H96v16h304c8.8,0,16-7.2,16-16v-16C416,424.8,408.8,432,400,432z"></path> </g></svg>
                    </div>
                    <div class="my-auto me-2" id="fileIconOther">
                        <svg width="32px" height="32px" viewBox="-3 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>file-document</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-154.000000, -99.000000)" fill="#000000"> <path d="M174,107 C172.896,107 172,106.104 172,105 L172,101 L178,107 L174,107 L174,107 Z M178,127 C178,128.104 177.104,129 176,129 L158,129 C156.896,129 156,128.104 156,127 L156,103 C156,101.896 156.896,101 158,101 L169.972,101 C169.954,103.395 170,105 170,105 C170,107.209 171.791,109 174,109 L178,109 L178,127 L178,127 Z M172,99 L172,99.028 C171.872,99.028 171.338,98.979 170,99 L158,99 C155.791,99 154,100.791 154,103 L154,127 C154,129.209 155.791,131 158,131 L176,131 C178.209,131 180,129.209 180,127 L180,109 L180,107 L172,99 L172,99 Z" id="file-document" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                    </div>
                    <div class="ps-0 text-start">
                        <div style="font-size: calc(0.7rem + 0.1vw);" id="fileName"></div>
                        <div style="font-size: calc(0.7rem + 0.1vw); color: #A3A3A5;" id="fileDesc"></div>
                    </div>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="task" value="send_file"/>
                <input type="hidden" name="file_id" id="file-id-input" value="{{ $fileId }}">
                <input type="hidden" name="file_name" id="file-name-input" value="">
                <input type="hidden" name="file_size" id="file-size-input" value="">
                <input type="hidden" name="file_extension" id="file-extension-input" value="">
                <input type="file" id="fileInput" name="fileInput" class="d-none">
                <div class="modal-footer">
                    <button type="submit" id="uploadBtn" class="btn btn-primary w-100">Upload Attachment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var maxFileSizeInBytes = 10 * 1024 * 1024; // 10 MB
    var file = null;
    
    var $testing = document.getElementById('fileInput')
    document.getElementById('fileInput').addEventListener('change', () => {setTimeout(function() {
        // alert($('#fileInput').html());
        
        var fleName = document.getElementById('fileName');
        var fileDesc = document.getElementById('fileDesc');
        file = $testing.files[0];
        // alert(file)
        
        if (file.size > maxFileSizeInBytes) {
            alert('File size exceeds the limit of 10 MB.');
            this.value = null; // Clear the file input
            fileName.innerHTML = 'No file selected';
            fileDesc.innerHTML = '';
            return;
        }
        
        fileName.innerHTML = file.name;
        fileDesc.innerHTML = getFileSize(file.size) + ', ' + getFileExtension(file.name).toUpperCase();

        var extension = getFileExtension(file.name).toUpperCase();
        var fileIconDoc = document.getElementById('fileIconDoc');
        var fileIconExcel = document.getElementById('fileIconExcel');
        var fileIconPpt = document.getElementById('fileIconPpt');
        var fileIconPdf = document.getElementById('fileIconPdf');
        var fileIconOther = document.getElementById('fileIconOther');

        fileIconDoc.classList.add('d-none');
        fileIconExcel.classList.add('d-none');
        fileIconPpt.classList.add('d-none');
        fileIconPdf.classList.add('d-none');
        fileIconOther.classList.add('d-none');
        
        var fileNameInput = document.getElementById('file-name-input');
        var fileSizeInput = document.getElementById('file-size-input');
        var fileExtensionInput = document.getElementById('file-extension-input');
        // var fileInput = document.getElementById('file-input');

        fileNameInput.value = file.name;
        fileSizeInput.value = getFileSize(file.size);
        fileExtensionInput.value = getFileExtension(file.name).toUpperCase();
        // fileInput.value = file;

        switch (extension) {
            case 'DOCX':
                fileIconDoc.classList.remove('d-none');
                break;
            case 'XLSX':
                fileIconExcel.classList.remove('d-none');
                break;
            case 'PPTX':
                fileIconPpt.classList.remove('d-none');
                break;
            case 'PDF':
                fileIconPdf.classList.remove('d-none');
                break;
            default:
                fileIconOther.classList.remove('d-none');
        }

        $('#file-upload-modal').modal('show');
    })}, 0);

    // $('#uploadBtn').click(function(e) {
    //         // e.preventDefault();
    //         // let url = URL.createObjectURL(e.target.files[0]);
    //         let fd = new FormData();
    //         console.log(file);
    //         fd = fd.append('fileInput', $testing.files[0]);
            
    //         $.post({
    //             data: fd,
    //             processData: false,
    //             contentType: false,
    //         });
    //     });

    function getFileSize(size) {
        var kilobytes = size / 1024;
        if (kilobytes < 1024) {
            return kilobytes.toFixed(0) + ' KB';
        } else {
            var megabytes = kilobytes / 1024;
            return megabytes.toFixed(2) + ' MB';
        }
    }

    function getFileExtension(filename) {
        return filename.split('.').pop();
    }
</script>
