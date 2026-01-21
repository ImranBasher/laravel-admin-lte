@extends('admin.layouts.admin')

@section('title', 'Edit Blog')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-info">

            <div class="card-header">
                <h3 class="card-title">Edit Blog</h3>
            </div>

            {{-- ===================== UPDATE BLOG FORM ===================== --}}
            <form method="POST"
                  action="{{ route('admin.blogs.update', $blog->id) }}"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="card-body">

                    {{-- ================= BASIC INFO ================= --}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title', $blog->title) }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Short Title</label>
                        <input type="text"
                               name="short_title"
                               class="form-control"
                               value="{{ old('short_title', $blog->short_title) }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Author Name</label>
                        <input type="text"
                               name="author"
                               class="form-control"
                               value="{{ old('author', $blog->author) }}"
                               required>
                    </div>

                    {{-- ================= BLOG IMAGES ================= --}}
                    <div class="form-group">
                        <label>Blog Images</label>
                        <input type="file" name="blog_images[]" class="form-control-file" multiple>

                        <div class="mt-3">
                            @foreach ($blog->multipleImages->where('purpose','blog_images') as $image)
                                <div class="d-inline-block position-relative m-2 image-box">

                                    <img src="{{ asset('storage/'.$image->image) }}"
                                         width="120"
                                         class="border rounded">

                                    <button type="button"
                                            class="btn btn-danger btn-sm image-delete-btn"
                                            data-url="{{ route('admin.blogs.images.destroy',$image->id) }}">
                                        ✕
                                    </button>

                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- ================= DESCRIPTIONS ================= --}}
                    @for ($i = 1; $i <= 7; $i++)

                        <div class="form-group mt-4">
                            <label>Description {{ $i }}</label>
                            <textarea name="description_{{ $i }}"
                                      id="description_{{ $i }}"
                                      class="form-control ckeditor">
                                {{ old("description_$i", $blog["description_$i"]) }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Description {{ $i }} Images</label>
                            <input type="file"
                                   name="blog_description_{{ $i }}_images[]"
                                   class="form-control-file"
                                   multiple>

                            <div class="mt-3">
                                @foreach (
                                    $blog->multipleImages->where(
                                        'purpose',
                                        "blog_description_{$i}_images"
                                    ) as $image
                                )
                                    <div class="d-inline-block position-relative m-2 image-box">

                                        <img src="{{ asset('storage/'.$image->image) }}"
                                             width="120"
                                             class="border rounded">

                                        <button type="button"
                                                class="btn btn-danger btn-sm image-delete-btn"
                                                data-url="{{ route('admin.blogs.images.destroy',$image->id) }}">
                                            ✕
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    @endfor

                    {{-- ================= SEO ================= --}}
                    <hr>

                    <div class="form-group">
                        <label>Meta Title</label>
                        <input type="text"
                               name="meta_title"
                               class="form-control"
                               value="{{ old('meta_title',$blog->meta_title) }}">
                    </div>

                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text"
                               name="meta_keywords"
                               class="form-control"
                               value="{{ old('meta_keywords',$blog->meta_keywords) }}">
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea name="meta_description"
                                  class="form-control ckeditor">
                            {{ old('meta_description',$blog->meta_description) }}
                        </textarea>
                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-info" type="submit">
                        Update Blog
                    </button>
                </div>

            </form>
            {{-- ================= END UPDATE FORM ================= --}}

        </div>
    </div>
</div>

@endsection
@section('scripts')

<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

<script>
/* ================= CKEDITOR ================= */
document.querySelectorAll('.ckeditor').forEach(el => {
    if (!el.id) {
        el.id = 'ckeditor_' + Math.random().toString(36).substr(2, 9);
    }
    if (!CKEDITOR.instances[el.id]) {
        CKEDITOR.replace(el.id);
    }
});

/* ================= IMAGE DELETE AJAX ================= */
document.querySelectorAll('.image-delete-btn').forEach(btn => {

    btn.addEventListener('click', async function () {

        if (!confirm('Delete this image?')) return;

        const url = this.dataset.url;
        const box = this.closest('.image-box');

        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                _method: 'DELETE'
            })
        });

        if (response.ok) {
            box.remove();
        } else {
            alert('Failed to delete image');
        }
    });

});
</script>

@endsection
