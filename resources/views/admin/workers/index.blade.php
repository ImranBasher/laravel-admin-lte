@extends("admin.layouts.admin")

@section("title","Workers")

@section("content")
<div class="content-wrapper">
    <section class="content-header">
        <h1>Workers</h1>
        <a href="{{ route('admin.workers.create') }}" class="btn btn-primary float-right">Add New</a>
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
                            <th>Phone</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workers as $key => $worker)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $worker->name }}</td>
                            <td>{{ $worker->email }}</td>
                            <td>{{ $worker->phone ?? 'N/A' }}</td>
                            <td>{{ $worker->designation }}</td>
                            <td><span class="badge {{ $worker->status ? 'badge-success' : 'badge-danger' }}">{{ $worker->status ? 'Active' : 'Inactive' }}</span></td>
                            <td>
                                <a href="{{ route('admin.workers.edit', $worker->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.workers.destroy', $worker->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($workers->isEmpty())
                        <tr><td colspan="7" class="text-center">No workers found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection