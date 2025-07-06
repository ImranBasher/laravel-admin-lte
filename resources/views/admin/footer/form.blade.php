<div class="form-group row">
    <label class="col-sm-2 col-form-label">Title A</label>
    <div class="col-sm-10">
        <input type="text" name="title_a" class="form-control" value="{{ old('title_a', $footerBanner->title_a ?? '') }}" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Title B</label>
    <div class="col-sm-10">
        <input type="text" name="title_b" class="form-control" value="{{ old('title_b', $footerBanner->title_b ?? '') }}" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $footerBanner->phone ?? '') }}" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Button Text</label>
    <div class="col-sm-10">
        <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $footerBanner->button_text ?? '') }}">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Button Link</label>
    <div class="col-sm-10">
        <input type="url" name="button_link" class="form-control" value="{{ old('button_link', $footerBanner->button_link ?? '') }}">
    </div>
</div>
