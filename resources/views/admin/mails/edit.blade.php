@extends("admin.layouts.admin")

@section("title", "Edit Mail")

@section("content")
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit Mail</h3>
    </div>

    <form method="POST" action="{{ route('admin.send_mails.update', $mail->id) }}">
        @csrf
        @method('PUT')
        <div class="card-body">
            @include('admin.mails.form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </form>
</div>
@endsection
