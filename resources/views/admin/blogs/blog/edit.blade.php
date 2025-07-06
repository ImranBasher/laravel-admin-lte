@extends("admin.layouts.admin")

@section("title", "Edit Blog")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header"><h3 class="card-title">Edit Blog</h3></div>
            <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="card-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                    </div>


                    {{-- <div class="form-group">
                        <label>Author</label>
                        <select name="author_id" class="form-control" required>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ $blog->author_id == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
{{-- 
                    <div class="form-group">
                        <label>Published At</label>
                        <input type="date" name="published_at" class="form-control" value="{{ old('published_at', $blog->published_at) }}">
                    </div> --}}

                    {{-- CKEditor Fields --}}
                    @foreach([
                        'description',
                    ] as $field)
                        <div class="form-group">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <textarea name="{{ $field }}" class="form-control ckeditor">{{ old($field, $blog->$field) }}</textarea>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label>Blog Images</label>
                        <input type="file" name="blog_images[]" class="form-control-file" multiple>
                        @foreach($blog->multipleImages->where('purpose', 'blog') as $image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $image->image) }}" width="100">
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-info">Update Blog</button>
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
