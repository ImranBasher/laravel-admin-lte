@extends("admin.layouts.admin")

@section("title", "Service Categories")

@section("content")

<div class="content-wrapper">
    <section class="content-header">
        <h1>Service Categories</h1>
        <a href="{{ route('admin.service_categories.create') }}" class="btn btn-primary float-right">Add New</a>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Service Name</th>
                            <th>Title</th>
                            {{-- <th>Quantity</th> --}}
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($serviceCategories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->service_name }}</td>
                            <td>{{ $category->short_title }}</td>
                            {{-- <td>{{ $category->quantity }}</td> --}}
                            <td>
                                <span class="badge {{ $category->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $category->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.service_categories.edit', $category->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('admin.service_categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($serviceCategories->isEmpty())
                        <tr><td colspan="6" class="text-center">No categories found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
