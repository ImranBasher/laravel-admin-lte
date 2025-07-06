@extends("admin.layouts.admin")

@section("title", "Edit Service Category")

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Service Category</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.service_categories.update', $serviceCategory->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">

                    @include('admin.home_pages.service_categories.form', ['serviceCategory' => $serviceCategory])

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
