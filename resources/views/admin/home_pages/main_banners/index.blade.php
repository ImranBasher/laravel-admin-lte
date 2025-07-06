@extends("admin.layouts.admin")

@section("title","Main Banner")

@section("content")

<div class="content-wrapper">
    <section class="content-header">
        <h1>Main Banners</h1>
        <a href="{{ route('admin.main_banners.create') }}" class="btn btn-primary float-right">Add New</a>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Short Title</th>
                            <th>Long Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $key => $banner)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $banner->short_title }}</td>
                            <td>{{ $banner->long_title }}</td>
                            <td>
                                <span class="badge {{ $banner->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $banner->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder"></i> View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('admin.main_banners.edit', $banner->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('admin.main_banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($banners->isEmpty())
                        <tr><td colspan="5" class="text-center">No banners found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>



@endsection