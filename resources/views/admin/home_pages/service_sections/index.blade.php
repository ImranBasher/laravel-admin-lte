@extends("admin.layouts.admin")

@section("title","Service Sections")

@section("content")
{{-- <div class="content-wrapper"> --}}
    <section class="content-header">
        <h1>Service Sections</h1>
        <a href="{{ route('admin.service_sections.create') }}" class="btn btn-primary float-left">Add New</a>
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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $key => $section)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $section->title }}</td>
                            <td>
                                <span class="badge {{ $section->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $section->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.service_sections.edit', $section->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('admin.service_sections.destroy', $section->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($sections->isEmpty())
                        <tr><td colspan="4" class="text-center">No service sections found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
{{-- </div> --}}
@endsection