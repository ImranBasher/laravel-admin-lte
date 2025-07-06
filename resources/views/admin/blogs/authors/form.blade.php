<!-- Name -->
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control" value="{{ old('name', $author->name ?? '') }}" required>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<!-- Email -->
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="email" name="email" class="form-control" value="{{ old('email', $author->email ?? '') }}" required>
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<!-- Phone -->
<div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $author->phone ?? '') }}">
        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<!-- Social Links -->
@foreach(['facebook', 'twitter', 'instagram', 'linkedin'] as $platform)
    <div class="form-group row">
        <label for="{{ $platform }}" class="col-sm-2 col-form-label">{{ ucfirst($platform) }}</label>
        <div class="col-sm-10">
            <input type="url" name="{{ $platform }}" class="form-control" value="{{ old($platform, $author->$platform ?? '') }}">
            @error($platform) <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
@endforeach

<!-- Bio with CKEditor -->
<div class="form-group row">
    <label for="bio" class="col-sm-2 col-form-label">Bio</label>
    <div class="col-sm-10">
        <textarea name="bio" class="form-control ckeditor" rows="5">{{ old('bio', $author->bio ?? '') }}</textarea>
        @error('bio') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<!-- Multiple Image Upload -->
<div class="form-group row">
    <label for="photos" class="col-sm-2 col-form-label">Photos</label>
    <div class="col-sm-10">
        <input type="file" class="form-control-file" name="author_photos[]" multiple>
        @error('author_photos') <span class="text-danger">{{ $message }}</span> @enderror
        @error('author_photos.*') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<!-- Show existing images (edit only) -->
@if(!empty($author->multipleImages))
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Existing Photos</label>
        <div class="col-sm-10">
            @foreach($author->multipleImages as $image)
                <img src="{{ asset('storage/' . $image->image) }}" alt="Author Image" width="100" class="mb-2">
            @endforeach
        </div>
    </div>
@endif
