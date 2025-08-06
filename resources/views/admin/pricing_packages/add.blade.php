@extends("admin.layouts.admin")

@section("title", "Add Pricing Package")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header"><h3 class="card-title">Add New Package</h3></div>

            <form method="POST" action="{{ route('admin.pricing_packages.store') }}">
                @csrf
                <div class="card-body">
                    @include('admin.pricing_packages.form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create Package</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
