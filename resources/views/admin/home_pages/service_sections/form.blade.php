<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $section->title ?? '') }}" required>
    </div>
</div>
<div class="form-group row">
    <label for="title_start" class="col-sm-2 col-form-label">Title Start</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title_start" id="title_start" value="{{ old('title_start', $section->title_start ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="title_middle" class="col-sm-2 col-form-label">Title Middle</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title_middle" id="title_middle" value="{{ old('title_middle', $section->title_middle ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="title_end" class="col-sm-2 col-form-label">Title End</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title_end" id="title_end" value="{{ old('title_end', $section->title_end ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="description" id="description" rows="4">{{ old('description', $section->description ?? '') }}</textarea>
    </div>
</div>