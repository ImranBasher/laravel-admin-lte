@extends("admin.layouts.admin")

@section("title", "Edit Main Banner")

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Main Banner</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.main_banners.update', $mainBanner->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <!-- Short Title -->
                    <div class="form-group row">
                        <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="short_title" id="short_title" value="{{ old('short_title', $mainBanner->short_title) }}" required>
                        </div>
                    </div>

                    <!-- Long Title -->
                    <div class="form-group row">
                        <label for="long_title" class="col-sm-2 col-form-label">Long Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="long_title" id="long_title" value="{{ old('long_title', $mainBanner->long_title) }}" required>
                        </div>
                    </div>

                    <!-- Banner Image -->
                    <div class="form-group row">
                        <label for="banner_image" class="col-sm-2 col-form-label">Banner Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="banner_image" id="banner_image">
                            {{-- @if($mainBanner->multipleImages)
                                <small class="form-text text-muted">
                                    Current: <a href="{{ asset('storage/' . $mainBanner->banner_image) }}" target="_blank">View Banner</a>
                                </small>
                                <br>
                                <img src="{{ asset('storage/' . $mainBanner->banner_image) }}" width="120" alt="Banner Image">
                            @endif --}}

                    @foreach($mainBanner->multipleImages->where('type', 'banner_image') as $image)
                        <small class="form-text text-muted">
                            Current: <a href="{{ asset('storage/' . $image->image) }}" target="_blank">View Banner</a>
                        </small>
                        <br>
                        <img src="{{ asset('storage/' . $image->image) }}" alt="Blog Banner" width="120">
                    @endforeach


                        </div>
                    </div>

                    <!-- Animation Banner Image -->
                    <div class="form-group row">
                        <label for="animation_banner_image" class="col-sm-2 col-form-label">Animation Banner Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="animation_banner_image" id="animation_banner_image">
                            {{-- @if($mainBanner->animation_banner_image)
                                <small class="form-text text-muted">
                                    Current: <a href="{{ asset('storage/' . $mainBanner->animation_banner_image) }}" target="_blank">View Animation</a>
                                </small>
                                <br>
                                <img src="{{ asset('storage/' . $mainBanner->animation_banner_image) }}" width="120" alt="Animation Banner">
                            @endif --}}


                    @foreach($mainBanner->multipleImages->where('type', 'animation_banner_image') as $image)
                        <small class="form-text text-muted">
                            Current: <a href="{{ asset('storage/' . $image->image) }}" target="_blank">View Banner</a>
                        </small>
                        <br>
                        <img src="{{ asset('storage/' . $image->image) }}" alt="Blog Banner" width="120">
                    @endforeach
                        </div>
                    </div>

                <!-- Submit -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update Banner</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
