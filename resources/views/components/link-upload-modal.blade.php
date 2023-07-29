@props(['fileId'])

<div id="link-upload-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Link Upload</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="create-topic-form" method="POST" action="">
                @csrf
                <input type="hidden" name="task" value="send_link">
                <input type="hidden" name="file_id" id="file-id-input" value="{{ $fileId }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="linkInput" class="form-label">Attachment Link</label>
                        <input type="text" class="form-control" id="linkInput" name="linkInput" placeholder="Enter link URL here" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Attach Link</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('linkInput').addEventListener('click', () => {
        $('#link-upload-modal').modal('show');
    });
</script>