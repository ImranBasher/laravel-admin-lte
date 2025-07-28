<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $worker->name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $worker->email ?? '') }}" >
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $worker->phone ?? '') }}">
</div>

<div class="form-group">
    <label for="designation">Designation</label>
    <input type="text" name="designation" class="form-control" value="{{ old('designation', $worker->designation ?? '') }}" >
</div>

<div class="form-group">
    <label for="facebook">Facebook</label>
    <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $worker->facebook ?? '') }}">
</div>

<div class="form-group">
    <label for="instagram">Instagram</label>
    <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $worker->instagram ?? '') }}">
</div>

<div class="form-group">
    <label for="twitter">Twitter</label>
    <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $worker->twitter ?? '') }}">
</div>

<div class="form-group">
    <label for="linkedin">LinkedIn</label>
    <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $worker->linkedin ?? '') }}">
</div>

<div class="form-group">
    <label for="bio">Bio</label>
    <textarea name="bio" class="form-control" rows="4">{{ old('bio', $worker->bio ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" name="photo" class="form-control-file">
    @if(isset($worker) && $worker->multipleImages)
        @foreach($worker->multipleImages->where('type', 'photo') as $image)
            <br>
            <img src="{{ asset('storage/' . $image->image) }}" width="100">
        @endforeach
    @endif
</div>
