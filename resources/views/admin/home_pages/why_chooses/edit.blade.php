@extends("admin.layouts.admin")

@section("title", "Edit Why Choose")

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Why Choose</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.why_chooses.update', $whyChoose->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title Start</label>
                        <div class="col-sm-10">
                            <input type="text" name="title_start" class="form-control" value="{{ old('title_start', $whyChoose->title_start) }}" required>
                            @error('title_start')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title End</label>
                        <div class="col-sm-10">
                            <input type="text" name="title_end" class="form-control" value="{{ old('title_end', $whyChoose->title_end) }}" required>
                            @error('title_end')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Video Link</label>
                        <div class="col-sm-10">
                            <input type="url" name="video_link" class="form-control" value="{{ old('video_link', $whyChoose->video_link) }}">
                            @error('video_link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Why Choose Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="why_choose_image" class="form-control-file">
                            @foreach($whyChoose->multipleImages->where('type', 'why_choose_image') as $image)
                                <small class="form-text text-muted">
                                    Current: <a href="{{ asset('storage/' . $image->image) }}" target="_blank">View</a>
                                </small>
                                <br>
                                <img src="{{ asset('storage/' . $image->image) }}" alt="Image" width="120">
                            @endforeach
                            @error('why_choose_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
