@extends("admin.layouts.admin")

@section("title", "Add Blog")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header"><h3 class="card-title">Add Blog</h3></div>
            <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>



                    {{-- <div class="form-group">
                        <label>Author</label>
                        <select name="author_id" class="form-control" required>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label>Published At</label>
                        <input type="date" name="published_at" class="form-control" value="{{ old('published_at') }}">
                    </div> --}}


                    {{-- Description with CKEditor --}}
                    @foreach([
                        'description',
                    ] as $field)
                        <div class="form-group">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <textarea name="{{ $field }}" class="form-control ckeditor">{{ old($field) }}</textarea>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label>Blog Images</label>
                        <input type="file" name="blog_images[]" class="form-control-file" multiple>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-info">Create Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    document.querySelectorAll('.ckeditor').forEach(el => CKEDITOR.replace(el));
</script>
@endsection
