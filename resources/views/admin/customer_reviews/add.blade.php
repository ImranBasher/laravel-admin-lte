@extends('admin.layouts.admin')

@section('title', 'Add Customer Review')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Customer Review</h3>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('admin.customer_reviews.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="customer_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Place</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="place" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="customer_message" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="rating" min="1" max="5" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="customer_image">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create Review</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection