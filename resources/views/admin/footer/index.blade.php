@extends("admin.layouts.admin")

@section("title","Footer Banners")

@section("content")
<div class="content-wrapper">
    <section class="content-header">
        <h1>Footer Banners</h1>
        <a href="{{ route('admin.footer_banners.create') }}" class="btn btn-primary float-right">Add New</a>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title A</th>
                            <th>Title B</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($footerBanners as $key => $banner)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $banner->title_a }}</td>
                            <td>{{ $banner->title_b }}</td>
                            <td>{{ $banner->phone }}</td>
                            <td>
                                <span class="badge {{ $banner->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $banner->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.footer_banners.edit', $banner->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('admin.footer_banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($footerBanners->isEmpty())
                        <tr><td colspan="6" class="text-center">No Footer Banners found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
