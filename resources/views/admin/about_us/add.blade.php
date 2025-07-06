@extends("admin.layouts.admin")

@section("title", "Add About Us")

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add About Us</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.about_us.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('admin.about_us.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
