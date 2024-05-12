<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editproduct{{ $product->id }}">
    Edit
</button>


<!-- Modal -->
<div class="modal fade" id="editproduct{{ $product->id }}" tabindex="-1"
    aria-labelledby="editproductLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editproductLabel{{ $product->id }}">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Name</label>
                            <input type="text" name="product_name" value="{{ $product->product_name }}"
                                class="form-control" id="product_name">
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select"
                                aria-label="Default select example">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Image</label>
                            <input class="form-control" id="product_image" name="product_image" type="file">
                            <span class="text-sm text-muted">Leave it empty if you dont want to update the product image</span>
                            @if(!$product->product_image)
                                <img src="{{ asset('storage/product_images/' . $product->product_image) }}" alt="Old Image" style="max-width: 50px">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="product_desc" class="form-label">Description</label>
                            <input type="text" name="product_desc" value="{{ $product->product_desc }}" class="form-control" id="product_desc">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}" id="price">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
