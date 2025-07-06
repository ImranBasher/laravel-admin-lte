@extends("admin.layouts.admin")

@section("title","Scrolling Headings")

@section("content")
<div class="content-wrapper">
    <section class="content-header">
        <h1>Scrolling Headings</h1>
        <a href="{{ route('admin.scrolling_headings.create') }}" class="btn btn-primary float-right">Add New</a>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Background</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($headings as $key => $heading)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $heading->name }}</td>
                            <td><span style="color: {{ $heading->color }}">{{ $heading->color }}</span></td>
                            <td><span style="background: {{ $heading->background }}">{{ $heading->background }}</span></td>
                            <td>
                                <span class="badge {{ $heading->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $heading->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.scrolling_headings.edit', $heading->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('admin.scrolling_headings.destroy', $heading->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($headings->isEmpty())
                        <tr><td colspan="6" class="text-center">No headings found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
