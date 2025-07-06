@extends("admin.layouts.admin")

@section("title", "Add Scrolling Heading")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Scrolling Heading</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.scrolling_headings.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Heading Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" required>
                                                    @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Color</label>
                        <div class="col-sm-10">
                            <input type="text" name="color" class="form-control">
                                                    @error('color')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Background</label>
                        <div class="col-sm-10">
                            <input type="text" name="background" class="form-control">
                                                    @error('background')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="scrolling_heading_logo" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">

                            <input type="file" name="scrolling_heading_logo" id="scrolling_heading_logo" class="form-control-file">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Add Heading</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

