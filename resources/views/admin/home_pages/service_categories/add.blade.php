@extends("admin.layouts.admin")

@section("title", "Add New Service Category")

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Service Category</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.service_categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    @include('admin.home_pages.service_categories.form')

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
