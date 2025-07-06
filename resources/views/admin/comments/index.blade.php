@extends("admin.layouts.admin")

@section("title", "All Comments")

@section("content")
<div class="content-wrapper">
    <section class="content-header">
        <h1>All Comments</h1>
        <a href="{{ route('admin.comments.create') }}" class="btn btn-primary float-right">Add New Comment</a>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $key => $comment)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ Str::limit($comment->message, 50) }}</td>
                            <td>
                                <span class="badge {{ $comment->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $comment->status ? 'Approved' : 'Pending' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.comments.edit', $comment->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if($comments->isEmpty())
                        <tr><td colspan="6" class="text-center">No comments found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
