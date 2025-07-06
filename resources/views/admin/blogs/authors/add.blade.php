@extends("admin.layouts.admin")

@section("title", "Add New Author")

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Author</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.authors.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    @include('admin.blogs.authors.form')

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create Author</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    document.querySelectorAll('.ckeditor').forEach(el => {
        CKEDITOR.replace(el);
    });
</script>
@endsection