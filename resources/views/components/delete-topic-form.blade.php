<div id="delete-topic-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1" id="modal-title">Delete Topic</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="delete-topic-form" method="POST" action="">
                @csrf
                <input type="hidden" name="task" value="delete_topic">
                <input type="hidden" name="topic_id" id="delete-topic-id-input" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <p id="delete-topic-text" class="text-center fs-5"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn w-100 btn-danger" id="confirm-delete-topic-btn">Delete Topic</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteTopicModal = document.getElementById('delete-topic-modal');
        const confirmDeleteTopicBtn = document.getElementById('confirm-delete-topic-btn');
        const deleteTopicForm = document.getElementById('delete-topic-form');
        const topicIDInput = document.getElementById('delete-topic-id-input');

        confirmDeleteTopicBtn.addEventListener('click', function () {
            topicIDInput.value = deleteTopicModal.dataset.topicId;
            deleteTopicForm.submit();
            $('#delete-topic-modal').modal('hide');
        });

        deleteTopicModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const topicName = button.dataset.topicName;
            const topicId = button.dataset.topicId;

            deleteTopicModal.dataset.topicId = topicId;
            document.getElementById('delete-topic-text').textContent = `Are you sure you want to delete the topic "${topicName}"?`;
        });
    });
</script>

