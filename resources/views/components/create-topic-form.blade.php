<div id="create-topic-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Create New Topic</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="create-topic-form" method="POST" action="">
                <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="topic-name" class="form-label">Topic Title</label>
                            <input type="text" class="form-control" id="topic-name" name="topic_name" placeholder="Enter topic title" required>
                        </div>
                        <div class="mb-3">
                            <label for="topic-description" class="form-label">Topic Description <span class="text-secondary">(Optional)</span></label>
                            <textarea class="form-control" id="topic-description" name="topic_description" placeholder="Enter topic description" rows="1"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="topic" class="btn btn-primary w-100">Create New Topic</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openCreateTopicFormModal() {
        var modal = new bootstrap.Modal(document.getElementById('create-topic-modal'));
        var form = document.getElementById(`create-topic-form`);
        form.reset();
        modal.show();
    }
</script>