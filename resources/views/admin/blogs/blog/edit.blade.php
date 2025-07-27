@extends('admin.layouts.admin')

@section('title', 'Edit Blog')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Blog</h3>
                </div>
                <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $blog->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Short Title</label>
                            <input type="text" name="short_title" class="form-control"
                                value="{{ old('short_title', $blog->short_title) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Author Name</label>
                            <input type="text" name="author" class="form-control"
                                value="{{ old('author', $blog->author) }}" required>
                        </div>


                        {{-- <div class="form-group">
                        <label>Author</label>
                        <select name="author_id" class="form-control" required>
                            @foreach ($authors as $author)
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
                        {{-- @foreach (['description'] as $field)
                        <div class="form-group">
                            <label>{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <textarea name="{{ $field }}" class="form-control ckeditor">{{ old($field, $blog->$field) }}</textarea>
                        </div>
                    @endforeach --}}

                        <div class="form-group">
                            <label>Blog Images</label>
                            <input type="file" name="blog_images[]" class="form-control-file" multiple>
                            @foreach ($blog->multipleImages->where('purpose', 'blog_images') as $image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image->image) }}" width="100">

                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label>Description 1</label>
                            <textarea name="description_1" id="description_1" class="form-control ckeditor">{{ old('description_1', $blog->description_1) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description_1 Images</label>
                            <input type="file" name="blog_description_1_images[]" class="form-control-file" multiple>
                            @foreach ($blog->multipleImages->where('purpose', 'blog_description_1_images') as $image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image->image) }}" width="100">
                                    <form action="{{ route('admin.blogs.images.destroy', $image->id) }}" method="POST"
                                        style="position: absolute; top: 0; right: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">X</button>
                                    </form>
                                </div>
                            @endforeach

                        </div>


                        <div class="form-group">
                            <label>Description 2</label>
                            <textarea name="description_2" id="description_2" class="form-control ckeditor">{{ old('description_2', $blog->description_2) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description_2 Images</label>
                            <input type="file" name="blog_description_2_images[]" class="form-control-file" multiple>
                            @foreach ($blog->multipleImages->where('purpose', 'blog_description_2_images') as $image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image->image) }}" width="100">
                                    <form action="{{ route('admin.blogs.images.destroy', $image->id) }}" method="POST"
                                        style="position: absolute; top: 0; right: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">X</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>


                        <div class="form-group">
                            <label>Description 3</label>
                            <textarea name="description_3" id="description_3" class="form-control ckeditor">{{ old('description_3', $blog->description_3) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description_3 Images</label>
                            <input type="file" name="blog_description_3_images[]" class="form-control-file" multiple>
                            @foreach ($blog->multipleImages->where('purpose', 'blog_description_3_images') as $image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image->image) }}" width="100">
                                    <form action="{{ route('admin.blogs.images.destroy', $image->id) }}" method="POST"
                                        style="position: absolute; top: 0; right: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">X</button>
                                    </form>
                                </div>
                            @endforeach

                        </div>


                        <div class="form-group">
                            <label>Description 4</label>
                            <textarea name="description_4" id="description_4" class="form-control ckeditor">{{ old('description_4', $blog->description_4) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description_4 Images</label>
                            <input type="file" name="blog_description_4_images[]" class="form-control-file" multiple>
                            @foreach ($blog->multipleImages->where('purpose', 'blog_description_4_images') as $image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image->image) }}" width="100">
                                    <form action="{{ route('admin.blogs.images.destroy', $image->id) }}" method="POST"
                                        style="position: absolute; top: 0; right: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">X</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label>Description 5</label>
                            <textarea name="description_5" id="description_5" class="form-control ckeditor">{{ old('description_5', $blog->description_5) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description_5 Images</label>
                            <input type="file" name="blog_description_5_images[]" class="form-control-file" multiple>
                            @foreach ($blog->multipleImages->where('purpose', 'blog_description_5_images') as $image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image->image) }}" width="100">
                                    <form action="{{ route('admin.blogs.images.destroy', $image->id) }}" method="POST"
                                        style="position: absolute; top: 0; right: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">X</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>


                        <div class="form-group">
                            <label>Description 6</label>
                            <textarea name="description_6" id="description_6" class="form-control ckeditor">{{ old('description_6', $blog->description_6) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description_6 Images</label>
                            <input type="file" name="blog_description_6_images[]" class="form-control-file" multiple>
                            @foreach ($blog->multipleImages->where('purpose', 'blog_description_6_images') as $image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image->image) }}" width="100">
                                    <form action="{{ route('admin.blogs.images.destroy', $image->id) }}" method="POST"
                                        style="position: absolute; top: 0; right: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">X</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label>Description 7</label>
                            <textarea name="description_7" id="description_7" class="form-control ckeditor">{{ old('description_7', $blog->description_7) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description_7 Images</label>
                            <input type="file" name="blog_description_7_images[]" class="form-control-file" multiple>
                            @foreach ($blog->multipleImages->where('purpose', 'blog_description_7_images') as $image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $image->image) }}" width="100">
                                    <form action="{{ route('admin.blogs.images.destroy', $image->id) }}" method="POST"
                                        style="position: absolute; top: 0; right: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">X</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info"  type="submit" >Update Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>


        document.querySelectorAll('.ckeditor').forEach(el => {
            if (!el.id) {
                el.id = 'ckeditor-' + Math.random().toString(36).substring(2, 15);
            }

            // Prevent CKEditor duplication
            if (!CKEDITOR.instances[el.id]) {
                CKEDITOR.replace(el.id);
            }
        });
    </script>
@endsection


{{-- @section('scripts')
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.ckeditor').forEach(el => CKEDITOR.replace(el));
    </script>
@endsection  --}}


{{-- @section('scripts')
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.ckeditor').forEach(el => {
            if (!el.id) {
                // Give each textarea a unique ID if not already present
                el.id = 'ckeditor-' + Math.random().toString(36).substring(2, 15);
            }

            // Only replace if an instance doesn't already exist
            if (!CKEDITOR.instances[el.id]) {
                CKEDITOR.replace(el.id);
            }
        });
    </script>
@endsection --}}
