<!-- Button trigger modal -->
@if ($category->products()->count() > 0)
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategory{{ $category->id }}"
        disabled>
        Delete
    </button>
@else
    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
        data-bs-target="#deleteCategory{{ $category->id }}">
        Delete </button>
@endif



<!-- Modal -->
<div class="modal fade" id="deleteCategory{{ $category->id }}" tabindex="-1"
    aria-labelledby="deleteCategoryLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteCategoryLabel{{ $category->id }}">Delete Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <p>Are you sure?</p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>
