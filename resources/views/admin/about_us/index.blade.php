@extends("admin.layouts.admin")

@section("title","About Us")

@section("content")

<div class="content-wrapper">
    <section class="content-header">
        <h1>About Us</h1>
        <a href="{{ route('admin.about_us.create') }}" class="btn btn-primary float-right">Add New</a>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mechanics Title Start</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aboutUs as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->mechanics_title_start }}</td>
                            <td>
                                <span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $item->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.about_us.edit', $item->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('admin.about_us.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($aboutUs->isEmpty())
                        <tr><td colspan="4" class="text-center">No records found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
