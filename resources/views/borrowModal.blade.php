<div class="modal fade" id="b" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Borrow Books</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('saveborrowedBooks', ['book' => $book->id ]) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <label for="book_title" class="form-label">{{ $book->title }}</label>
                    <div class="mb-3">
                        <label for="borrow_date" class="form-label">GET BOOK IN: </label>
                        <input type="date" name="date" class="form-control">
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
