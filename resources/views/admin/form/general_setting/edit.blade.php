@extends("admin.layouts.admin")

@section("title","General Settings")

@section("content")

<!-- Full-width form container -->
<div class="row">
    <div class="col-12">
        <!-- Full-width Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">General Setting</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.general-settings.update', $settings->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <!-- Company Name Sections -->
                    <div class="form-group row">
                        <label for="company_name_start" class="col-sm-2 col-form-label">Company Name (Start)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="company_name_start" name="company_name_start" value="{{ old('company_name_start', $settings->company_name_start ?? '') }}" placeholder="Start of company name">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="company_name_middle" class="col-sm-2 col-form-label">Company Name (Middle)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="company_name_middle" name="company_name_middle" value="{{ old('company_name_middle', $settings->company_name_middle ?? '') }}" placeholder="Middle part of company name">
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="company_name_end" class="col-sm-2 col-form-label">Company Name (End)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="company_name_end" name="company_name_end" value="{{ old('company_name_end', $settings->company_name_end ?? '') }}" placeholder="End of company name">
                        </div>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $settings->phone ?? '') }}" placeholder="Phone number">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $settings->email ?? '') }}" placeholder="Email address">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="contact_title" class="col-sm-2 col-form-label">Contact Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contact_title" name="contact_title" value="{{ old('contact_title', $settings->contact_title ?? '') }}" placeholder="Contact section title">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="address" name="address" placeholder="Company address">{{ old('address', $settings->address ?? '') }}</textarea>
                        </div>
                    </div>
                    
                    <!-- Working Time -->
                    <div class="form-group row">
                        <label for="working_time" class="col-sm-2 col-form-label">Working Time</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="working_time" name="working_time" value="{{ old('working_time', $settings->working_time ?? '') }}" placeholder="Working hours (e.g., 9AM-5PM)">
                        </div>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="form-group row">
                        <label for="facebook_link" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link', $settings->facebook_link ?? '') }}" placeholder="Facebook page URL">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="twitter_link" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" id="twitter_link" name="twitter_link" value="{{ old('twitter_link', $settings->twitter_link ?? '') }}" placeholder="Twitter profile URL">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="instagram_link" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="{{ old('instagram_link', $settings->instagram_link ?? '') }}" placeholder="Instagram profile URL">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="linkedin_link" class="col-sm-2 col-form-label">LinkedIn</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link', $settings->linkedin_link ?? '') }}" placeholder="LinkedIn company URL">
                        </div>
                    </div>
                    
                    <!-- Map Link -->
                    <div class="form-group row">
                        <label for="map_link" class="col-sm-2 col-form-label">Map Embed</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="map_link" name="map_link" placeholder="Google Maps embed code">{{ old('map_link', $settings->map_link ?? '') }}</textarea>
                        </div>
                    </div>
                    
                    <!-- Logo Uploads -->
            <!-- Logo Uploads -->
            <div class="form-group row">
                <label for="logo" class="col-sm-2 col-form-label">Main Logo</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="logo" name="logo">

                    @foreach($settings->multipleImages->where('type', 'logo') as $image)
                        <small class="form-text text-muted">
                            Current: <a href="{{ asset('storage/' . $image->image) }}" target="_blank">View Logo</a>
                        </small>
                        <br>
                        <img src="{{ asset('storage/' . $image->image) }}" alt="Main Logo" width="120">
                    @endforeach
                </div>
            </div>

            <div class="form-group row">
                <label for="contact_us_logo" class="col-sm-2 col-form-label">Contact Us Logo</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="contact_us_logo" name="contact_us_logo">

                    @foreach($settings->multipleImages->where('type', 'contact_us_logo') as $image)
                        <small class="form-text text-muted">
                            Current: <a href="{{ asset('storage/' . $image->image) }}" target="_blank">View Logo</a>
                        </small>
                        <br>
                        <img src="{{ asset('storage/' . $image->image) }}" alt="Contact Logo" width="120">
                    @endforeach
                </div>
            </div>

            <div class="form-group row">
                <label for="blog_header_banner" class="col-sm-2 col-form-label">Blog Header Banner</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="blog_header_banner" name="blog_header_banner">

                    @foreach($settings->multipleImages->where('type', 'blog_header_banner') as $image)
                        <small class="form-text text-muted">
                            Current: <a href="{{ asset('storage/' . $image->image) }}" target="_blank">View Banner</a>
                        </small>
                        <br>
                        <img src="{{ asset('storage/' . $image->image) }}" alt="Blog Banner" width="120">
                    @endforeach
                </div>
            </div>


                {{-- @dd($settings) --}}

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
