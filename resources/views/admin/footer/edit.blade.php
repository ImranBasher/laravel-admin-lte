@extends("admin.layouts.admin")

@section("title", "Edit Footer Banner")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Footer Banner</h3>
            </div>

            <form method="POST" action="{{ route('admin.footer_banners.update', $footerBanner->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('admin.footer.form', ['footerBanner' => $footerBanner])
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
