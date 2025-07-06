@extends("admin.layouts.admin")

@section("title", "Edit Service Section")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Service Section</h3>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('admin.service_sections.update', $section->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('admin.home_pages.service_sections.form', ['section' => $section])
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update Section</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection