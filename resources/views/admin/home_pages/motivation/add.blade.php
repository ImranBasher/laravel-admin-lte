@extends("admin.layouts.admin")

@section("title", "Add Motivation")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Motivation</h3>
            </div>

            <form method="POST" action="{{ route('admin.motivations.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('admin.home_pages.motivation.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
