@extends('admin.layouts.admin')

@section('title', 'Customer Reviews')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Customer Reviews</h1>
        <a href="{{ route('admin.customer_reviews.create') }}" class="btn btn-primary float-right">Add New</a>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Place</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $key => $review)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $review->customer_name }}</td>
                            <td>{{ $review->place }}</td>
                            <td>{{ $review->rating }} ⭐</td>
                            <td>
                                <span class="badge {{ $review->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $review->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.customer_reviews.edit', $review->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('admin.customer_reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($reviews->isEmpty())
                        <tr><td colspan="6" class="text-center">No reviews found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection