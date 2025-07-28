@php
    $editing = isset($aboutUs);
@endphp

<div class="form-group">
    <label>Description Start</label>
    <textarea class="form-control" name="description_start" required>{{ old('description_start', $editing ? $aboutUs->description_start : '') }}</textarea>
</div>

<div class="form-group">
    <label>Description Middle</label>
    <textarea class="form-control" name="description_middle" required>{{ old('description_middle', $editing ? $aboutUs->description_middle : '') }}</textarea>
</div>

<div class="form-group">
    <label>Description End</label>
    <textarea class="form-control" name="description_end" required>{{ old('description_end', $editing ? $aboutUs->description_end : '') }}</textarea>
</div>

<div class="form-group">
    <label>Mechanics Title Start</label>
    <input type="text" class="form-control" name="mechanics_title_start" value="{{ old('mechanics_title_start', $editing ? $aboutUs->mechanics_title_start : '') }}" required>
</div>

<div class="form-group">
    <label>Mechanics Title End</label>
    <input type="text" class="form-control" name="mechanics_title_end" value="{{ old('mechanics_title_end', $editing ? $aboutUs->mechanics_title_end : '') }}" required>
</div>

<div class="form-group">
    <label>Mechanics Description</label>
    <textarea class="form-control" name="mechanics_description" required>{{ old('mechanics_description', $editing ? $aboutUs->mechanics_description : '') }}</textarea>
</div>

<div class="form-group">
    <label>Video Link</label>
    <input type="url" class="form-control" name="video_link" value="{{ old('video_link', $editing ? $aboutUs->video_link ?? '' : '') }}">
</div>

<div class="form-group">
    <label>Upload Images</label>
    <input type="file" class="form-control-file" name="about_us_image[]" multiple>
</div>

@if($editing && $aboutUs->multipleImages)
    <div class="form-group">
        <label>Current Images</label><br>
        @foreach($aboutUs->multipleImages->where('type', 'about_us_image') as $image)
            <img src="{{ asset('storage/' . $image->image) }}" alt="Image" width="120" class="mr-2 mb-2">
        @endforeach
    </div>
@endif

