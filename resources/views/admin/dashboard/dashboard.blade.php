@extends("admin.layouts.admin")

@section("title","Dashboard")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $serviceCategoryCount ?? 0 }}</h3>
                    <p>Service Categories</p>
                </div>
                <div class="icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <a href="{{ route('admin.service_categories.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $subServiceCategoryCount ?? 0 }}</h3>
                    <p>Sub Service Categories</p>
                </div>
                <div class="icon">
                    <i class="fas fa-sitemap"></i>
                </div>
                <a href="{{ route('admin.sub_service_categories.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $serviceSectionCount ?? 0 }}</h3>
                    <p>Service Sections</p>
                </div>
                <div class="icon">
                    <i class="fas fa-toolbox"></i>
                </div>
                <a href="{{ route('admin.service_sections.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $blogCount ?? 0 }}</h3>
                    <p>Blog Posts</p>
                </div>
                <div class="icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <a href="{{ route('admin.blogs.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $commentCount ?? 0 }}</h3>
                    <p>Comments</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comments"></i>
                </div>
                <a href="{{ route('admin.comments.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $userCount ?? 0 }}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.dashboard.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>{{ $productCount ?? 0 }}</h3>
                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer text-white">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ $workerCount ?? 0 }}</h3>
                    <p>Workers</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-cog"></i>
                </div>
                <a href="{{ route('admin.workers.index') }}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.service_categories.index') }}" class="btn btn-outline-secondary">
                            Service Categories
                        </a>
                        <a href="{{ route('admin.sub_service_categories.index') }}" class="btn btn-outline-secondary">
                            Sub Service Categories
                        </a>
                        <a href="{{ route('admin.service_sections.index') }}" class="btn btn-outline-secondary">
                            Service Sections
                        </a>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                            Blogs
                        </a>
                        <a href="{{ route('admin.comments.index') }}" class="btn btn-outline-secondary">
                            Comments
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                            Products
                        </a>
                        <a href="{{ route('admin.workers.index') }}" class="btn btn-outline-secondary">
                            Workers
                        </a>
                        {{-- <form action="{{ route('admin.dashboard.generate_missing_images') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-dark">
                                Generate Missing Images
                            </button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Recent Blogs</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($recentBlogs ?? [] as $blog)
                                <tr>
                                    <td>{{ $blog->title ?? 'Untitled' }}</td>
                                    <td>{{ $blog->author_name ?? ($blog->user->name ?? '—') }}</td>
                                    <td>{{ optional($blog->created_at)->format('M d, Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">No recent blogs found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.blogs.index') }}" class="uppercase">View All Blogs</a>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Recent Comments</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($recentComments ?? [] as $comment)
                                <tr>
                                    <td>{{ $comment->author_name ?? ($comment->user->name ?? '—') }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($comment->body ?? $comment->comment ?? '', 60) }}</td>
                                    <td>{{ optional($comment->created_at)->format('M d, Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">No recent comments found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.comments.index') }}" class="uppercase">View All Comments</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
