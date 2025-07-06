@extends('admin.layouts.admin')

@section('title', 'Add Sub Service Category')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-info">
      <div class="card-header"><h3 class="card-title">Add Sub Service Category</h3></div>
      <form method="POST" action="{{ route('admin.sub_service_categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          @include('admin.sub_service_category.form')
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-info">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
  ['service_introduction_description','key_service_description','features_and_benefit_description','how_do_we_work_description','expected_result_description']
    .forEach(field => CKEDITOR.replace(field));
</script>
@endsection
