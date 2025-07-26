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

                    <div class="form-group">
                        <label>Short Title</label>
                        <input type="text" name="short_title" class="form-control" value="{{ old('short_title') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Author Name</label>
                        <input type="text" name="author" class="form-control" value="{{ old('author') }}" placeholder="(max 20 letter)">
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
                    {{-- @foreach(['description',] as $field)
                        <div class="form-group">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <textarea name="{{ $field }}" class="form-control ckeditor">{{ old($field) }}</textarea>
                        </div>
                    @endforeach --}}

                    <div class="form-group">
                        <label>Blog Images</label>
                        <input type="file" name="blog_images[]" class="form-control-file" multiple>
                    </div>

                    <div class="form-group">
                        <label>Description 1</label>
                        <textarea name="description_1" class="form-control ckeditor">{{ old('description_1') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description_1 Images</label>
                        <input type="file" name="blog_description_1_images[]" class="form-control-file" multiple>
                    </div>


                    <div class="form-group">
                        <label>Description 2</label>
                        <textarea name="description_2" class="form-control ckeditor">{{ old('description_2') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description_2 Images</label>
                        <input type="file" name="blog_description_2_images[]" class="form-control-file" multiple>
                    </div>


                    <div class="form-group">
                        <label>Description 3</label>
                        <textarea name="description_3" class="form-control ckeditor">{{ old('description_3') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description_3 Images</label>
                        <input type="file" name="blog_description_3_images[]" class="form-control-file" multiple>
                    </div>


                    <div class="form-group">
                        <label>Description 4</label>
                        <textarea name="description_4" class="form-control ckeditor">{{ old('description_4') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description_4 Images</label>
                        <input type="file" name="blog_description_4_images[]" class="form-control-file" multiple>
                    </div>

                    <div class="form-group">
                        <label>Description 5</label>
                        <textarea name="description_5" class="form-control ckeditor">{{ old('description_5') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description_5 Images</label>
                        <input type="file" name="blog_description_5_images[]" class="form-control-file" multiple>
                    </div>                    
                    
                    <div class="form-group">
                        <label>Description 6</label>
                        <textarea name="description_6" class="form-control ckeditor">{{ old('description_6') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description_6 Images</label>
                        <input type="file" name="blog_description_6_images[]" class="form-control-file" multiple>
                    </div> 
                    
                    
                    <div class="form-group">
                        <label>Description 7</label>
                        <textarea name="description_7" class="form-control ckeditor">{{ old('description_7') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description_7 Images</label>
                        <input type="file" name="blog_description_7_images[]" class="form-control-file" multiple>
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
