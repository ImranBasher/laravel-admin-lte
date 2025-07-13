@extends("admin.layouts.admin")

@section("title", "Admin Profile")

@section("content")


{{-- @php
    dd(json_encode($admin, JSON_PRETTY_PRINT));
@endphp --}}
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>



            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}">
                    </div>

                    <div class="form-group">
                        <label>Profession</label>
                        <input type="text" name="profession" class="form-control" value="{{ old('profession', $admin->profile->profession) }}">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" name="phone" class="form-control" value="{{ old('phone', $admin->profile->phone) }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio" class="form-control" rows="4">{{ old('bio', optional($admin->profile)->bio) }}</textarea>
                    </div>

                    {{-- <div class="form-group">
                        <label>Profile Picture</label>
                        <input type="file" name="image" class="form-control-file">
                        @if($admin->image)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/admins/' . $admin->image) }}" alt="Current Image" width="100">
                            </div>
                        @endif
                    </div> --}}


                    <div class="form-group row">
                        <label for="profile_image" class="col-sm-2 col-form-label">Profile Picture</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="image" id="image" multiple>

                            @foreach($admin->multipleImages->where('type', 'profile_image') as $image)
                                <small class="form-text text-muted">
                                    Current: <a href="{{ asset('storage/' . $image->image) }}" target="_blank">View Image</a>
                                </small>
                                <br>
                                <img src="{{ asset('storage/' . $image->image) }}" width="120" alt="Product Image">
                            @endforeach
                        </div>
                    </div>




                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
