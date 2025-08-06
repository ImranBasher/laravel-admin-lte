@php $p = $package ?? null; @endphp

<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $p->name ?? '') }}" required>
</div>

<div class="form-group">
    <label>Subtitle</label>
    <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle', $p->subtitle ?? '') }}" required>
</div>

<div class="form-group">
    <label>Monthly Price</label>
    <input type="number" step="0.01" class="form-control" name="monthly_price" value="{{ old('monthly_price', $p->monthly_price ?? '') }}" required>
</div>

<div class="form-group">
    <label>Yearly Price</label>
    <input type="number" step="0.01" class="form-control" name="yearly_price" value="{{ old('yearly_price', $p->yearly_price ?? '') }}" required>
</div>
@php
    $features = old('features');

    if (empty($features) && isset($p) && !empty($p->features)) {
        $features = implode(',', $p->features);
    }
@endphp
<div class="form-group">
    <label>Features (comma separated)</label>
    <input type="text" class="form-control" name="features" value="{{ $features }}" required>
</div>

<div class="form-group">
    <label>Popular?</label>
    <select class="form-control" name="is_popular">
        <option value="0" {{ old('is_popular', $p->is_popular ?? 0) == 0 ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('is_popular', $p->is_popular ?? 0) == 1 ? 'selected' : '' }}>Yes</option>
    </select>
</div>

<div class="form-group">
    <label>Tag Text</label>
    <input type="text" class="form-control" name="tag_text" value="{{ old('tag_text', $p->tag_text ?? '') }}">
</div>
