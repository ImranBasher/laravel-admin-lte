@extends("admin.layouts.admin")

@section("title", "Pricing Packages")

@section("content")
<div class="content-wrapper">
    <section class="content-header">
        <h1>Pricing Packages</h1>
        <a href="{{ route('admin.pricing_packages.create') }}" class="btn btn-primary float-right">Add New</a>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Subtitle</th>
                            <th>Monthly Price</th>
                            <th>Yearly Price</th>
                            <th>Popular</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $key => $package)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $package->name }}</td>
                            <td>{{ $package->subtitle }}</td>
                            <td>{{ $package->monthly_price }}</td>
                            <td>{{ $package->yearly_price }}</td>
                            <td>
                                <span class="badge {{ $package->is_popular ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $package->is_popular ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.pricing_packages.edit', $package->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.pricing_packages.destroy', $package->id) }}" method="POST" style="display:inline-block;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($packages->isEmpty())
                            <tr><td colspan="7" class="text-center">No packages found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
