@extends("admin.layouts.admin")

@section("title", "Add Product")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" name="price" id="price" value="{{ old('price') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_image" class="col-sm-2 col-form-label">Images</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="product_image[]" id="product_image" multiple>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection