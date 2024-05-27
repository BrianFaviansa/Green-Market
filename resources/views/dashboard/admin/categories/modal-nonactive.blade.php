@if ($category->status == 'Active')
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#changeStatus{{ $category->id }}">
        Nonactive </button>
@else
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#changeStatus{{ $category->id }}">
        Activate</button>
@endif





<!-- Modal -->
<div class="modal fade" id="changeStatus{{ $category->id }}" tabindex="-1"
    aria-labelledby="changeStatusLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="changeStatusLabel{{ $category->id }}">Delete Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.status', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <p>Are you sure you want to change the category status?</p>
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
