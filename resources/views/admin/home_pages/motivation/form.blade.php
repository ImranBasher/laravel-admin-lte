<!-- Title -->
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        <input type="text" name="title" id="title" class="form-control"
            value="{{ old('title', $motivation->title ?? '') }}" required>
    </div>
</div>

<!-- Description -->
<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <textarea name="description" id="description" class="form-control" required>{{ old('description', $motivation->description ?? '') }}</textarea>
    </div>
</div>

<!-- Icon -->
<div class="form-group row">
    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
    <div class="col-sm-10">
        <input type="text" name="icon" id="icon" class="form-control"
            value="{{ old('icon', $motivation->icon ?? '') }}">
    </div>
</div>

<!-- Motivation Image -->
<div class="form-group row">
    <label for="motivation_image" class="col-sm-2 col-form-label">Motivation Image</label>
    <div class="col-sm-10">
        @if(isset($motivation))
            @foreach($motivation->multipleImages->where('type', 'motivation_image') as $image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $image->image) }}" width="120" alt="Motivation Image">
                </div>
            @endforeach
        @endif
        <input type="file" name="motivation_image" id="motivation_image" class="form-control-file">
    </div>
</div>
