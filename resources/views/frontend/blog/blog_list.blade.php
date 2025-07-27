@extends('frontend.layouts.master')

@section('content')

        <!-- Main Wrapper-->
        <main class="wrapper">
            <!-- Page Header -->
            <div class="wptb-page-heading" style="background-image: url('assets/img/background/page-header-bg.jpg');">
                <div class="container">
                    <div class="wptb-item--inner">
                        <h2 class="wptb-item--title ">Blog List</h2>
                        <div class="wptb-breadcrumb-wrap">
                            <ul class="wptb-breadcrumb">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('blog.list')}}">Blog List</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Grid -->
            <section class="pd-bottom-300">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="wptb-blog-grid2 wow fadeInLeft">

                                 @foreach ($blogs as $blog )
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image" style="width: 300px; height: 200px; overflow: hidden;">

                                            <a href="{{ route('frontend.blog.details', $blog->id) }}" class="wptb-item-link">
                                                                @php
                                                                    $firstImage = $blog->multipleImages->where('purpose', 'blog_images')->first();
                                                                @endphp
                                                                @if ($firstImage)
                                                                    <img src="{{ asset('storage/' . $firstImage->image) }}" alt="{{ $blog->title }}">
                                                                @else
                                                                    <img src="{{ asset('assets/img/default-blog.jpg') }}" alt="No image">
                                                                @endif
                                            </a>

                                            <div class="wptb-item--date">{{ $blog->created_at->format('F d, Y') }}</div>
                                        </div>
                                        <div class="wptb-item--holder">
                                            
                                            <div class="wptb-item--box">
                                                <div class="wptb-item--category"><a href="#">{{ $blog->title }}</a></div>
                                                <h3 class="wptb-item--title"><a href="{{ route('frontend.blog.details', $blog->id) }}">{{ $blog->short_title }}</a></h3>
                                                <div class="wptb-item--author">By <a href="#">{{ $blog->author ?? 'Unknown' }}</a></div>
                                            </div>
                                            
                                            <div class="wptb-item--meta">
                                                <div class="wptb-item--meta-right">
                                                    <div class="wptb-item--comments"><a href="#comments"><i class="bi bi-chat-left-dots"></i> 100 Comments</a></div>
                                                    <div class="wptb-item--share"><a href="#"><i class="bi bi-reply-fill"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div> 




                            <div class="wptb-pagination-wrap text-center">
                                {{ $blogs->links('pagination::bootstrap-4') }}
                                {{-- <ul class="pagination">
                                    <li><a class="disabled page-number previous" href="#"><i class="bi bi-chevron-left"></i></a></li>
                                    <li><span class="page-number current">1</span></li>
                                    <li><a class="page-number" href="#">2</a></li>
                                    <li><a class="page-number" href="#">3</a></li>
                                    <li>.....</li>
                                    <li><a class="page-number" href="#">9</a></li>
                                    <li><a class="page-number next" href="#"><i class="bi bi-chevron-right"></i></a></li>
                                </ul> --}}
                            </div>
                        </div>

                        <!-- Sidebar  -->
                        <div class="col-lg-4 col-md-8 mt-5 mt-lg-0 ps-lg-5">

                            <div class="sidebar">
								
                                {{-- <div class="widget widget_block widget_search">
                                    <form method="get" class="wp-block-search">
                                        <div class="wp-block-search__inside-wrapper ">
                                            <input type="search" class="wp-block-search__input" name="search" value="" placeholder="Search" required="">
                                            <button type="submit" class="wp-block-search__button"><i class="bi bi-search"></i></button>
                                        </div>
                                    </form>
                                </div> --}}
                                <!-- end widget -->
{{-- 
                                <div class="widget widget_block widget_custom">
									<h2 class="widget-title">About Author</h2>
									<div class="sidebar_author">
										<img src="{{ asset('assets/img/blog/author-2.jpg')}}" alt="img">
										<p class="intro">Sed ut perspiciatis unde omnis iste natus err or sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt</p>
										<div class="author_social">
											<ul>
												<li><a href="#"><i class="bi bi-facebook"></i></a></li>
												<li><a href="#"><i class="bi bi-twitter-x"></i></a></li>
												<li><a href="#"><i class="bi bi-pinterest"></i></a></li>
												<li><a href="#"><i class="bi bi-instagram"></i></a></li>
												<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
								</div> --}}
                                <!-- end widget -->

                                {{-- <div class="widget widget_block">
                                    <h2 class="widget-title">
                                        Archive
                                    </h2>
                                    <div class="sidebar_brand"> 
                                        <form action="https://wpthemebooster.com/demo/themeforest/html/ducatibox/checkout.php" method="post">
                                            <div class="form-check">
                                                <label for="checkbox1">2023 (32)</label>
                                                <input type="checkbox" class="form-check-input" id="checkbox1" name="checkbox1" value="">
                                            </div>                                
                                            <div class="form-check">
                                                <label for="checkbox2">2022 (09)</label>
                                                <input type="checkbox" class="form-check-input" id="checkbox2" name="checkbox2" checked value="">
                                            </div>
                                            <div class="form-check">
                                                <label for="checkbox3">2021 (02)</label>
                                                <input type="checkbox" class="form-check-input" id="checkbox3" name="checkbox3" value="">
                                            </div>
                                            <div class="form-check">
                                                <label for="checkbox4">2020 (12)</label>
                                                <input type="checkbox" class="form-check-input" id="checkbox4" name="checkbox4" value="">
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                                <!-- end widget -->

                                {{-- <div class="widget widget_block">
                                    <div class="wp-block-group__inner-container">
                                        <h2 class="widget-title">Categories</h2>
                                        <ul class="wp-block-categories-list wp-block-categories">
                                            <li class="cat-item"><a href="#">AUTOMOBILE</a> (10)</li>
                                            <li class="cat-item"><a href="#">TUNING</a> (12)</li>
                                            <li class="cat-item"><a href="#">MECHANIC</a> (08)</li>
                                            <li class="cat-item"><a href="#">CAR PARTS</a> (15)</li>
                                            <li class="cat-item"><a href="#">TIPS & TRICKS</a> (21)</li>
                                        </ul>
                                    </div>
                                </div> --}}
                                <!-- end widget -->

                                <div class="widget widget_block">
                                    <div class="wp-block-group__inner-container">
                                        <h2 class="widget-title">Recent Posts</h2>
                                        <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                                            @foreach($recentPosts as $post)
                                            <li>
												<div class="latest-posts-image" style="width: 50px; height: 35px; overflow: hidden;">

                                                             @php
                                                                    $firstImage = $post->multipleImages->where('purpose', 'blog_images')->first();
                                                             @endphp
                                                                @if ($firstImage)
                                                                    <img src="{{ asset('storage/' . $firstImage->image) }}" alt="{{ $post->title }}">
                                                                @else
                                                                    <img src="{{ asset('assets/img/default-blog.jpg') }}" alt="No image">
                                                                @endif
													
												</div>
												<div class="latest-posts-content">
													<h5><a href="{{ route('frontend.blog.details', $post->id) }}">{{ $post->short_title }}</a></h5>
													<h6>{{ $post->created_at->format('F d, Y') }}</h6>
												</div>
											</li>
											{{-- <li>
												<div class="latest-posts-image">
													<img src="{{asset('assets/img/blog/10.jpg')}}" alt="img">
												</div>
												<div class="latest-posts-content">
													<h5><a href="blog.html">Thing you should know
                                                        about basic car parts
                                                        before buying a car</a></h5>
													<h6>12/11/2023</h6>
												</div>
											</li>
											<li>
												<div class="latest-posts-image">
													<img src="{{asset('assets/img/blog/11.jpg')}}" alt="img">
												</div>
												<div class="latest-posts-content">
													<h5><a href="blog.html">Do’s & Don’ts when you are trying to change flat tires of your car</a></h5>
													<h6>02/10/2023</h6>
												</div>
											</li> --}}
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- end widget -->

                                <div class="widget widget_block">
                                    <h2 class="widget-title">
                                        Product Tag
                                    </h2>
                                    <div class="wp-block-tag-list wp-block-tag">
                                        <a href="#" class="tag-cloud-link">Automobile</a>
                                        <a href="#" class="tag-cloud-link">Engine</a>
                                        <a href="#" class="tag-cloud-link">Carwash</a>
                                        <a href="#" class="tag-cloud-link">Detailing</a>
                                        <a href="#" class="tag-cloud-link">Mechanic</a>
                                        <a href="#" class="tag-cloud-link">Motor</a>
                                        <a href="#" class="tag-cloud-link">Speed</a>
                                    </div>
                                </div>
                                <!-- end widget -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

@endsection