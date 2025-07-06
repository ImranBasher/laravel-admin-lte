@extends("admin.layouts.admin")

@section("title","Authors")

@section("content")

<div class="content-wrapper">
    <section class="content-header">
        <h1>Authors</h1>
        <a href="{{ route('admin.authors.create') }}" class="btn btn-primary float-right">Add New</a>
    </section>

    <section class="content">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $key => $author)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>
                                <span class="badge {{ $author->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $author->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.authors.edit', $author->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($authors->isEmpty())
                        <tr><td colspan="5" class="text-center">No authors found.</td></tr>
                        @endif
                    </tbody>
                </table>
                <div class="card-footer clearfix">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
