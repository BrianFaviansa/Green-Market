<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategory{{ $product->id }}">
    Delete
</button>


<!-- Modal -->
<div class="modal fade" id="deleteproduct{{ $product->id }}" tabindex="-1" aria-labelledby="deleteproductLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteproductLabel{{ $product->id }}">Delete product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.destroy', $product) }}" method="POST">
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
