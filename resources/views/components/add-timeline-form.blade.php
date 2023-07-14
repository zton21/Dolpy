<div id="add-timeline-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Create New Timeline</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="add-timeline-form" method="POST" action="">
                <input type="hidden" name="task" value="add_timeline">
                <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="timeline-name" class="form-label">Timeline Title</label>
                            <input type="text" class="form-control" id="timeline-name" name="timeline_name" placeholder="Enter timeline title" required>
                        </div>
                        <div class="mb-3">
                            <label for="timeline-description" class="form-label">Timeline Description <span class="text-secondary">(Optional)</span></label>
                            <textarea class="form-control" id="timeline-description" name="timeline_description" placeholder="Enter timeline description" rows="1"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="timeline" class="btn btn-primary w-100">Create New Timeline</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openAddTimelineFormModal() {
        var modal = new bootstrap.Modal(document.getElementById('add-timeline-modal'));
        var form = document.getElementById(`add-timeline-form`);
        form.reset();
        modal.show();
    }
</script>