<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $mail->name ?? '') }}" required>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $mail->email ?? '') }}" required>
</div>

<div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $mail->phone ?? '') }}">
</div>

<div class="form-group">
    <label>Subject</label>
    <input type="text" name="subject" class="form-control" value="{{ old('subject', $mail->subject ?? '') }}" required>
</div>

<div class="form-group">
    <label>Message</label>
    <textarea name="message" class="form-control" rows="4" required>{{ old('message', $mail->message ?? '') }}</textarea>
</div>
