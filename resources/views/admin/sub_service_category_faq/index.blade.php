@extends("admin.layouts.admin")

@section("title","FAQs")

@section("content")
{{-- <div class="content-wrapper"> --}}
    <section class="content-header">
        <h1>FAQs</h1>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary float-left">Add New</a>
    </section>
 <br>
    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sub Category</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $key => $faq)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $faq->subServiceCategory->sub_service_name ?? 'N/A' }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{{ Str::limit($faq->answer, 50) }}</td>
                            <td><span class="badge {{ $faq->status ? 'badge-success' : 'badge-danger' }}">{{ $faq->status ? 'Active' : 'Inactive' }}</span></td>
                            <td>
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($faqs->isEmpty())
                        <tr><td colspan="6" class="text-center">No FAQs found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
{{-- </div> --}}
@endsection