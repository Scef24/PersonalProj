<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Books</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('save') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="accession_num" class="form-label">Accession Number</label>
                        <input type="number" name="accession_num" class="form-control" placeholder="Input Accession Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="call_num" class="form-label">Call Number</label>
                        <input type="text" name="call_num" class="form-control" placeholder="Input Call Number" required>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Input Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="publisher" class="form-label">Publisher</label>
                        <input type="text" name="publisher" class="form-control" placeholder="Input Publisher">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Input Author">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="General Education">General Education</option>
                            <option value="IT Books">IT Books</option>
                            <option value="Filipiniana">Filipiniana Books</option>
                            <option value="Fiction">Fiction Books</option>
                            <option value="Research Studies">Research Studies</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Add Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Input Image">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
