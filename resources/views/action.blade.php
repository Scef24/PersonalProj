
<!-- Modal -->
<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $gened->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('book.update', $gened->id) }}">
                    @method('PATCH')
                    @csrf

                    <div class="mb-3">
                        <label for="accession_num" class="form-label">Accession Number</label>
                        <input type="text" name="accession_num" value="{{ $gened->accession_num }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="call_num" class="form-label">Call Number</label>
                        <input type="text" name="call_num" value="{{ $gened->call_num }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $gened->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="publisher" class="form-label">Publisher</label>
                        <input type="text" name="publisher" value="{{ $gened->publisher }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" value="{{ $gened->author }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="General Education" {{ $gened->category == 'General Education' ? 'selected' : '' }}>General Education</option>
                            <option value="IT Books" {{ $gened->category == 'IT Books' ? 'selected' : '' }}>IT Books</option>
                            <option value="Filipiniana Book" {{ $gened->category == 'Filipiniana Book' ? 'selected' : '' }}>Filipiniana Books</option>
                            <option value="Fiction" {{ $gened->category == 'Fiction' ? 'selected' : '' }}>Fiction Books</option>
                            <option value="Research Studies" {{ $gened->category == 'Research Studies' ? 'selected' : '' }}>Research Studies</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--delete-->

<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $gened->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('book.delete', $gened->id) }}">
                    @method('DELETE')
                    @csrf
                    <h4 class="text-center">Are you sure you want to delete this Book?</h4>
                    <h5 class="text-center">Book: {{ $gened->title }} by {{ $gened->author }}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- ADD a copy modal --}}
<div class="modal fade" id="addCopy{{$gened->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('book.addCopy',$gened->id)}}">
                    @method('PATCH')
                    @csrf
                        <h4>Are you sure you want to Add a copy of this book?</h4>
                    <div class="mb-3">
                        <label for="accession_num" class="form-label">Accession Number</label>
                        <input type="text" name="accession_num" value="{{ $gened->accession_num }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="call_num" class="form-label">Call Number</label>
                        <input type="text" name="call_num" value="{{ $gened->call_num }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $gened->title }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" value="{{ $gened->author }}" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Add </button>
                </form>
            </div>
        </div>
    </div>
</div>
