@extends("admin.layouts.admin")

@section("title", "Edit Scrolling Heading")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Scrolling Heading</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.scrolling_headings.update', $scrollingHeading->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Heading Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ old('name', $scrollingHeading->name) }}" required>
                        
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Color</label>
                        <div class="col-sm-10">
                            <input type="text" name="color" class="form-control" value="{{ old('color', $scrollingHeading->color) }}">
                       
                        @error('color')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Background</label>
                        <div class="col-sm-10">
                            <input type="text" name="background" class="form-control" value="{{ old('background', $scrollingHeading->background) }}">
                         @error('background')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>


                    </div>

                        <!-- Motivation Image -->
                <div class="form-group row">
                    <label for="scrolling_heading_logo" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        @if(isset($scrollingHeading))
                            @foreach($scrollingHeading->multipleImages->where('type', 'scrolling_heading_logo') as $image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $image->image) }}" width="120" alt="scrolling heading logo">
                                </div>
                            @endforeach
                        @endif
                        <input type="file" name="scrolling_heading_logo" id="scrolling_heading_logo" class="form-control-file">
                    </div>
                </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update Heading</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
