@extends("admin.layouts.admin")

@section("title", "Edit Worker")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Worker</h3>
            </div>

            <form method="POST" action="{{ route('admin.workers.update', $worker->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('admin.workers.form', ['worker' => $worker])
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update Worker</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection