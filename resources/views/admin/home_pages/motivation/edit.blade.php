@extends("admin.layouts.admin")

@section("title", "Edit Motivation")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Motivation</h3>
            </div>

            <form method="POST" action="{{ route('admin.motivations.update', $motivation->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('admin.home_pages.motivation.form', ['motivation' => $motivation])
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
