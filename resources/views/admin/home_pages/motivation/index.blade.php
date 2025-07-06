@extends("admin.layouts.admin")

@section("title", "Motivation")

@section("content")
{{-- <div class="content-wrapper"> --}}
    <section class="content-header">
        <h1>Motivation List</h1>
        <a href="{{ route('admin.motivations.create') }}" class="btn btn-primary float-left">Add New</a>
    </section>
        <br>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($motivations as $key => $motivation)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $motivation->title }}</td>
                                <td>{{ Str::limit($motivation->description, 50) }}</td>
                                <td>
                                    <span class="badge {{ $motivation->status ? 'badge-success' : 'badge-danger' }}">
                                        {{ $motivation->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.motivations.edit', $motivation->id) }}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.motivations.destroy', $motivation->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this motivation?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center">No motivations found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
{{-- </div> --}}
@endsection
