@extends("admin.layouts.admin")

@section("title", "Edit About Us")

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit About Us</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.about_us.update', $aboutUs->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('admin.about_us.form', ['aboutUs' => $aboutUs])
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
