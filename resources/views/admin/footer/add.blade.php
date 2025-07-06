@extends("admin.layouts.admin")

@section("title", "Add Footer Banner")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Footer Banner</h3>
            </div>

            <form method="POST" action="{{ route('admin.footer_banners.store') }}">
                @csrf
                <div class="card-body">
                    @include('admin.footer.form')
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
