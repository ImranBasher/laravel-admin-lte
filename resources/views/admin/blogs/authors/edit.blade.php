@extends("admin.layouts.admin")

@section("title", "Edit Author")

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Author</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.authors.update', $author->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">

                    @include('admin.home_pages.authors.partials.form', ['author' => $author])

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update Author</button>
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