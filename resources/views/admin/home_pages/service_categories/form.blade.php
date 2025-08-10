@php
    $edit = isset($serviceCategory);
@endphp

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Service Name</label>
    <div class="col-sm-10">
        <input type="text" name="service_name" class="form-control" required
               value="{{ old('service_name', $edit ? $serviceCategory->service_name : '') }}">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        <input type="text" name="short_title" class="form-control"
               value="{{ old('short_title', $edit ? $serviceCategory->short_title : '') }}">
    </div>
</div>

{{-- <div class="form-group row">
    <label class="col-sm-2 col-form-label">Long Title</label>
    <div class="col-sm-10">
        <input type="text" name="long_title" class="form-control"
               value="{{ old('long_title', $edit ? $serviceCategory->long_title : '') }}">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <textarea name="description" class="form-control">{{ old('description', $edit ? $serviceCategory->description : '') }}</textarea>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Quantity</label>
    <div class="col-sm-10">
        <input type="number" name="quantity" class="form-control"
               value="{{ old('quantity', $edit ? $serviceCategory->quantity : '') }}">
    </div>
</div> --}}

{{-- File Uploads --}}
{{-- @foreach(['logo_first', 'logo_second', 'banner', 'quantity_logo'] as $field) --}}
@foreach(['logo_first'] as $field)
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
        <div class="col-sm-10">
            <input type="file" class="form-control-file" name="{{ $field }}">
            @if($edit)
                @foreach($serviceCategory->multipleImages->where('type', $field) as $image)
                    <small class="form-text text-muted">
                        Current: <a href="{{ asset('storage/' . $image->image) }}" target="_blank">View</a>
                    </small>
                    <img src="{{ asset('storage/' . $image->image) }}" width="120" alt="{{ $field }}">
                @endforeach
            @endif
        </div>
    </div>
@endforeach


                    <div class="form-group">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $subServiceCategory->meta_title ?? '' ) }}" >
                    </div>

                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $subServiceCategory->meta_keywords ?? '') }}" >
                    </div>    
                    
                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control ckeditor">{{ old('meta_description',$subServiceCategory->meta_description ?? '' ) }}</textarea>
                    </div> 
