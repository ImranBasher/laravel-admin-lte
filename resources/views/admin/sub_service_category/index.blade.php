@extends('admin.layouts.admin')

@section('title', 'Sub Service Categories')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Sub Service Categories</h1>
    <a href="{{ route('admin.sub_service_categories.create') }}" class="btn btn-primary float-right">Add New</a>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Category</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subServiceCategories as $i => $item)
              <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->sub_service_name }}</td>
                <td>{{ $item->serviceCategory->service_name ?? '-' }}</td>
                <td><span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">
                  {{ $item->status ? 'Active' : 'Inactive' }}</span></td>
                <td class="text-right">
                  <a href="{{ route('admin.sub_service_categories.edit', $item->id) }}" class="btn btn-sm btn-info">
                    <i class="fas fa-pencil-alt"></i> Edit
                  </a>
                  <form action="{{ route('admin.sub_service_categories.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i> Delete
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
            @if($subServiceCategories->isEmpty())
              <tr><td colspan="5" class="text-center">No sub-service categories found.</td></tr>
            @endif
          </tbody>
        </table>
        {{ $subServiceCategories->links() }}
      </div>
    </div>
  </section>
</div>
@endsection
