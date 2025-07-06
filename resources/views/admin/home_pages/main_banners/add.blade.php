@extends("admin.layouts.admin")

@section("title", "Add New Main Banner")

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Main Banner</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.main_banners.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <!-- Short Title -->
                    <div class="form-group row">
                        <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="short_title" id="short_title" value="{{ old('short_title') }}" required>
                        </div>
                    </div>

                    <!-- Long Title -->
                    <div class="form-group row">
                        <label for="long_title" class="col-sm-2 col-form-label">Long Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="long_title" id="long_title" value="{{ old('long_title') }}" required>
                        </div>
                    </div>

                    <!-- Banner Image -->
                    <div class="form-group row">
                        <label for="banner_image" class="col-sm-2 col-form-label">Banner Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="banner_image" id="banner_image">
                        </div>
                    </div>

                    <!-- Animation Banner Image -->
                    <div class="form-group row">
                        <label for="animation_banner_image" class="col-sm-2 col-form-label">Animation Banner Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="animation_banner_image" id="animation_banner_image">
                        </div>
                    </div>

                </div>

                <!-- Submit -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create Banner</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
