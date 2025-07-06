@extends("admin.layouts.admin")

@section("title", "Add Worker")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Worker</h3>
            </div>

            <form method="POST" action="{{ route('admin.workers.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('admin.workers.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create Worker</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection