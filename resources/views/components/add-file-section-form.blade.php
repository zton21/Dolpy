<div id="add-file-section-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Create New File Section</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="add-file-section-form" method="POST" action="">
                @csrf
                <input type="hidden" name="task" value="create_file">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file-section-name" class="form-label">File Section Title</label>
                        <input type="text" class="form-control" id="file-section-name" name="file_section_name" placeholder="Enter file section title" required>
                    </div>
                    <div class="mb-3">
                        <label for="file-section-description" class="form-label">File Section Description <span class="text-secondary">(Optional)</span></label>
                        <textarea class="form-control" id="file-section-description" name="file_section_description" placeholder="Enter file section description" rows="1"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="file-section" class="btn btn-primary w-100">Create New File Section</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openAddFileSectionFormModal() {
        var modal = new bootstrap.Modal(document.getElementById('add-file-section-modal'));
        var form = document.getElementById(`add-file-section-form`);
        form.reset();
        modal.show();
    }
</script>