<div id="edit-topic-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Edit Topic</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="edit-topic-form" method="POST" action="">
                @csrf
                <input type="hidden" name="task" value="edit_topic">
                <input type="hidden" name="topic_id" id="edit-topic-id-input" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTopicTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="editTopicTitle" name="editTopicTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTopicDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editTopicDescription" name="editTopicDescription" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100" id="saveTopicChangesBtn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editTopicModal = document.getElementById('edit-topic-modal');
        const editTopicForm = document.getElementById('edit-topic-form');
        const editTopicTitleInput = document.getElementById('editTopicTitle');
        const editTopicDescriptionTextarea = document.getElementById('editTopicDescription');
        const saveTopicChangesBtn = document.getElementById('saveTopicChangesBtn');
        const topicIDInput = document.getElementById('edit-topic-id-input');

        saveTopicChangesBtn.addEventListener('click', function () {
            topicIDInput.value = editTopicModal.dataset.topicId;
            editTopicForm.submit();
            $('#edit-topic-modal').modal('hide');
        });

        
        editTopicModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const topicId = button.dataset.topicId;
            const topicName = button.dataset.topicName;
            const topicDescription = button.dataset.topicDescription;

            editTopicModal.dataset.topicId = topicId;

            editTopicTitleInput.value = topicName;
            editTopicDescriptionTextarea.value = topicDescription;
        });
    });
</script>
