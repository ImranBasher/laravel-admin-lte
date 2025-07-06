@extends("admin.layouts.admin")

@section("title", "Add New Mail")

@section("content")
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add Mail</h3>
    </div>

    <form method="POST" action="{{ route('admin.send_mails.store') }}">
        @csrf
        <div class="card-body">
            @include('admin.mails.form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
</div>
@endsection
