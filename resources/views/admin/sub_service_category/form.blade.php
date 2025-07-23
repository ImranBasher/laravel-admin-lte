@php
    $isEdit = isset($subServiceCategory);
@endphp

<!-- Service Category -->
<div class="form-group row">
    <label for="service_category_id" class="col-sm-2 col-form-label">Service Category</label>
    <div class="col-sm-10">
        <select name="service_category_id" id="service_category_id" class="form-control" required>
            <option value="">Select Category</option>
            @foreach($serviceCategories as $id => $name)
                <option value="{{ $id }}" {{ old('service_category_id', $subServiceCategory->service_category_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>
</div>







<!-- Sub Service Name -->
<div class="form-group row">
    <label for="sub_service_name" class="col-sm-2 col-form-label">Sub Service Name</label>
    <div class="col-sm-10">
        <input type="text" name="sub_service_name" id="sub_service_name" class="form-control" required
               value="{{ old('sub_service_name', $subServiceCategory->sub_service_name ?? '') }}">
    </div>
</div>

<!-- Logo -->
<div class="form-group row">
    <label for="logo" class="col-sm-2 col-form-label">Logo</label>
    <div class="col-sm-10">

        @if($isEdit && $subServiceCategory->multipleImages->where('type', 'logo')->first())
            <img src="{{ asset('storage/' . $subServiceCategory->multipleImages->where('type', 'logo')->first()->image) }}" width="120" class="mb-2">
        @endif

        <input type="file" name="logo" id="logo" class="form-control-file">
    </div>
</div>

<!-- Banner Short Title -->
<div class="form-group row">
    <label for="banner_short_title" class="col-sm-2 col-form-label">Banner Short Title</label>
    <div class="col-sm-10">
        <input type="text" name="banner_short_title" id="banner_short_title" class="form-control"
               value="{{ old('banner_short_title', $subServiceCategory->banner_short_title ?? '') }}">
    </div>
</div>

<!-- Banner Long Title -->
<div class="form-group row">
    <label for="banner_long_title" class="col-sm-2 col-form-label">Banner Long Title</label>
    <div class="col-sm-10">
        <input type="text" name="banner_long_title" id="banner_long_title" class="form-control"
               value="{{ old('banner_long_title', $subServiceCategory->banner_long_title ?? '') }}">
    </div>
</div>

<!-- Banner Description -->
<div class="form-group row">
    <label for="banner_description" class="col-sm-2 col-form-label">Banner Description</label>
    <div class="col-sm-10">
        <textarea name="banner_description" id="banner_description" class="form-control">{{ old('banner_description', $subServiceCategory->banner_description ?? '') }}</textarea>
    </div>
</div>

<!-- Banner -->
<div class="form-group row">
    <label for="banner" class="col-sm-2 col-form-label">Banner</label>
    <div class="col-sm-10">
        @if($isEdit && $subServiceCategory->multipleImages->where('type', 'banner')->first())
            <img src="{{ asset('storage/' . $subServiceCategory->multipleImages->where('type', 'banner')->first()->image) }}" width="120" class="mb-2">
        @endif
        <input type="file" name="banner" id="banner" class="form-control-file">
    </div>
</div>

<!-- Service Introduction Description (CKEditor) -->
<div class="form-group row">
    <label for="service_introduction_description" class="col-sm-2 col-form-label">Service Introduction Description</label>
    <div class="col-sm-10">
        <textarea name="service_introduction_description" id="service_introduction_description" class="form-control ckeditor">{{ old('service_introduction_description', $subServiceCategory->service_introduction_description ?? '') }}</textarea>
    </div>
</div>

<!-- Key Services List -->
<div class="form-group row">
    <label for="key_services_list" class="col-sm-2 col-form-label">Key Services List</label>
    <div class="col-sm-10">
        <input type="text" name="key_services_list" id="key_services_list" class="form-control"
               value="{{ old('key_services_list', $subServiceCategory->key_services_list ?? '') }}">
    </div>
</div>

<!-- Key Service Description (CKEditor) -->
<div class="form-group row">
    <label for="key_service_description" class="col-sm-2 col-form-label">Key Service Description</label>
    <div class="col-sm-10">
        <textarea name="key_service_description" id="key_service_description" class="form-control ckeditor">{{ old('key_service_description', $subServiceCategory->key_service_description ?? '') }}</textarea>
    </div>
</div>

<!-- Key Service Images (Multiple) -->
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Key Service Images</label>
    <div class="col-sm-10">
        @if($isEdit)
            @foreach($subServiceCategory->multipleImages->where('type', 'key_service_images') as $image)
                <img src="{{ asset('storage/' . $image->image) }}" width="120" class="mb-2">
            @endforeach
        @endif
        <input type="file" name="key_service_images[]" class="form-control-file" multiple>
    </div>
</div>

<!-- Features and Benefit List -->
<div class="form-group row">
    <label for="features_and_benefit_list" class="col-sm-2 col-form-label">Features and Benefit List</label>
    <div class="col-sm-10">
        <input type="text" name="features_and_benefit_list" id="features_and_benefit_list" class="form-control"
               value="{{ old('features_and_benefit_list', $subServiceCategory->features_and_benefit_list ?? '') }}">
    </div>
</div>

<!-- Features and Benefit Description (CKEditor) -->
<div class="form-group row">
    <label for="features_and_benefit_description" class="col-sm-2 col-form-label">Features and Benefit Description</label>
    <div class="col-sm-10">
        <textarea name="features_and_benefit_description" id="features_and_benefit_description" class="form-control ckeditor">{{ old('features_and_benefit_description', $subServiceCategory->features_and_benefit_description ?? '') }}</textarea>
    </div>
</div>

<!-- Features and Benefit Image -->
<div class="form-group row">
    <label for="features_and_benefit_image" class="col-sm-2 col-form-label">Features and Benefit Image</label>
    <div class="col-sm-10">
        @if($isEdit)
            @foreach($subServiceCategory->multipleImages->where('type', 'features_and_benefit_images') as $image)
                <img src="{{ asset('storage/' . $image->image) }}" width="120" class="mb-2">
            @endforeach
        @endif
        <input type="file" name="features_and_benefit_images[]" id="features_and_benefit_image" class="form-control-file" multiple>
    </div>
</div>

<!-- How Do We Work List -->
<div class="form-group row">
    <label for="how_do_we_work_list" class="col-sm-2 col-form-label">How Do We Work List</label>
    <div class="col-sm-10">
        <input type="text" name="how_do_we_work_list" id="how_do_we_work_list" class="form-control"
               value="{{ old('how_do_we_work_list', $subServiceCategory->how_do_we_work_list ?? '') }}">
    </div>
</div>

<!-- How Do We Work Description (CKEditor) -->
<div class="form-group row">
    <label for="how_do_we_work_description" class="col-sm-2 col-form-label">How Do We Work Description</label>
    <div class="col-sm-10">
        <textarea name="how_do_we_work_description" id="how_do_we_work_description" class="form-control ckeditor">{{ old('how_do_we_work_description', $subServiceCategory->how_do_we_work_description ?? '') }}</textarea>
    </div>
</div>

<!-- How Do We Work Image -->
<div class="form-group row">
    <label for="how_do_we_work_image" class="col-sm-2 col-form-label">How Do We Work Image</label>
    <div class="col-sm-10">
        @if($isEdit)
            @foreach($subServiceCategory->multipleImages->where('type', 'how_do_we_work_images') as $image)
                <img src="{{ asset('storage/' . $image->image) }}" width="120" class="mb-2">
            @endforeach
        @endif
        <input type="file" name="how_do_we_work_images[]" id="how_do_we_work_image" class="form-control-file" multiple>
    </div>
</div>

<!-- Expected Result List -->
<div class="form-group row">
    <label for="expected_result_list" class="col-sm-2 col-form-label">Expected Result List</label>
    <div class="col-sm-10">
        <input type="text" name="expected_result_list" id="expected_result_list" class="form-control"
               value="{{ old('expected_result_list', $subServiceCategory->expected_result_list ?? '') }}">
    </div>
</div>

<!-- Expected Result Description (CKEditor) -->
<div class="form-group row">
    <label for="expected_result_description" class="col-sm-2 col-form-label">Expected Result Description</label>
    <div class="col-sm-10">
        <textarea name="expected_result_description" id="expected_result_description" class="form-control ckeditor">{{ old('expected_result_description', $subServiceCategory->expected_result_description ?? '') }}</textarea>
    </div>
</div>

<!-- Expected Result Image -->
<div class="form-group row">
    <label for="expected_result_image" class="col-sm-2 col-form-label">Expected Result Image</label>
    <div class="col-sm-10">
        @if($isEdit)
            @foreach($subServiceCategory->multipleImages->where('type', 'expected_result_images') as $image)
                <img src="{{ asset('storage/' . $image->image) }}" width="120" class="mb-2">
            @endforeach
        @endif
        <input type="file" name="expected_result_images[]" id="expected_result_image" class="form-control-file" multiple>
    </div>
</div>





<!-- Quantity -->
<div class="form-group row">
    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
    <div class="col-sm-10">
        <input type="number" name="quantity" id="quantity" class="form-control"
               value="{{ old('quantity', $subServiceCategory->quantity ?? '') }}">
    </div>
</div>

<!-- Quantity Logo -->
<div class="form-group row">
    <label for="quantity_logo" class="col-sm-2 col-form-label">Quantity Logo</label>
    <div class="col-sm-10">
        @if($isEdit && $subServiceCategory->multipleImages->where('type', 'quantity_logo')->first())
            <img src="{{ asset('storage/' . $subServiceCategory->multipleImages->where('type', 'quantity_logo')->first()->image) }}" width="120" class="mb-2">
        @endif

        <input type="file" name="quantity_logo" id="quantity_logo" class="form-control-file">
    </div>
</div>


<!-- SVG Icon -->
<div class="form-group row">
    <label for="svg_icon" class="col-sm-2 col-form-label">SVG Icon</label>
    <div class="col-sm-10">
        <textarea name="svg_icon" id="svg_icon" class="form-control">{{ old('svg_icon', $subServiceCategory->svg_icon ?? '') }}</textarea>
    </div>
</div>
