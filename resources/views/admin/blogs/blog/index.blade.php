@extends("admin.layouts.admin")

@section("title","All Blogs")

@section("content")
<div class="content-wrapper">
    <section class="content-header">
        <h1>All Blogs</h1>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary float-right">Add Blog</a>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Status</th>
                            {{-- <th>Published At</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blogs as $key => $blog)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    <span class="badge {{ $blog->status ? 'badge-success' : 'badge-danger' }}">
                                        {{ $blog->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                {{-- <td>{{ $blog->published_at ?? 'N/A' }}</td> --}}
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center">No blogs found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
