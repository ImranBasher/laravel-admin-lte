@extends('frontend.layouts.master')

@section('content')

        <!-- Main Wrapper-->
        <main class="wrapper">
            <!-- Page Header -->
            <div class="wptb-page-heading" style="background-image: url('assets/img/background/page-header-bg.jpg');">
                <div class="container">
                    <div class="wptb-item--inner">
                        <h2 class="wptb-item--title ">Blog Details</h2>
                        <div class="wptb-breadcrumb-wrap">
                            <ul class="wptb-breadcrumb">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><span><a href="{{route('blog.ph')}}">Blog Details</a></span></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			
			<!-- Details Content -->
			<section class="blog-details pd-bottom-300">
				<div class="container">
					<div class="row">

                        <div class="col-lg-9 col-md-8 pe-md-5">
                            <div class="blog-details-inner">
                                <div class="post-content">
									<div class="post-header">
										<h2 class="post-title">What are the first steps when your car breakdown middle of the road</h2>
                                        <div class="wptb-item--meta d-flex align-items-center gap-4">
                                            <div class="wptb-item wptb-item--author"><a href="#"><i class="bi bi-pencil-square"></i> <span>Marina Willums</span></a></div>
                                            <div class="wptb-item wptb-item--date"><a href="#"><i class="bi bi-calendar3"></i> <span>March 28, 2022</span></a></div>
                                            <div class="wptb-item wptb-item--comments"><a href="#comments"><i class="bi bi-chat-square-text"></i> <span>2k</span></a></div>
                                            <div class="wptb-item wptb-item--hits"><a href="#"><i class="bi bi-eye"></i> <span>1.38k</span></a></div>
                                        </div>
									</div>

                                    <div class="intro">
                                        <p> Our business consulting programs helps to break the performance of your business down into customers and product groups so you know exactly which customers or product groups are working and which ones aren’t you can make the changes needed to get the best results out of your business.</p>
                                    </div>

                                    <!-- Post Image -->
                                    <figure class="block-gallery mt-4">
                                        <img src="assets/img/blog/details.jpg" alt="img">
                                    </figure>

									<div class="fulltext">
                                        <h4 class="widget-title">Repair Tips</h4>
										<p> Our business consulting programs helps to break the performance of your business down into customers and product groups so you know exactly which customers or product groups are working and which ones aren’t you can make the changes needed to get the best results out of your business.</p>
										
                                        <ul class="point-order">
                                            <li><i class="bi bi-check2-all"></i> We seize opportunities to innovate and grow</li>
                                            <li><i class="bi bi-check2-all"></i> We are one firm with a shared sense of purpose</li>
                                            <li><i class="bi bi-check2-all"></i> We care about each other and the world around us</li>
                                        </ul>
                                        
                                        <p> These are the concepts that shape our distinctive culture & differentiate us from others. They ture the unique spirit of our Firm guide the behaviors that enable us to deliver  the promises we make to our clients and our people.</p>
                                        
                                        <figure class="block-gallery">
											<ul class="blocks-gallery-grid">
												<li class="blocks-gallery-item">
                                                    <figure>
                                                        <a href="#"><img src="assets/img/blog/17.jpg" alt="img" class="block-image"></a>
                                                    </figure>
                                                </li>
                                                <li class="blocks-gallery-item">
                                                    <figure>
                                                        <a href="#"><img src="assets/img/blog/18.jpg" alt="img" class="block-image"></a>
                                                    </figure>
                                                </li>
                                                <li class="blocks-gallery-item">
                                                    <figure>
                                                        <a href="#"><img src="assets/img/blog/19.jpg" alt="img" class="block-image"></a>
                                                    </figure>
                                                </li>
											</ul>
										</figure>

                                        
										<p>We guide our clients through difficult issues, bringing our insight and judgment to each situa- tion. Our innovative approaches create original solutions to our clients' most complex domestic & multi jurisdic tional deals and disputes.</p>
                                            
                                        <p>By thinking on behalf of our clients every day, we anticipate what they want, provide what they need & build lasting relationships. These are the concept that shape our distinctive culture and differentiate us from others.</p>
                                        
                                        <figure class="block-gallery mt-4">
                                            <a href="#"><img src="assets/img/blog/details2.jpg" alt="img" class="block-image"></a>
                                        </figure>

                                        <p>By thinking on behalf of our clients every daywe anticipate what they want provide what they need & build lasting relationships.These are the concepts that shape our distinctive culture & differentiate us from others.</p>
                                            
                                        <p>Our clients every day wanticipate what they want, provide what they need & build relationships. These are the concepts that shape our distinctive culture & differentiate us from others.</p>
                                        
                                        <div class="post-footer">
                                            <div class="post-share">
                                                <ul class="share-list">
                                                    <li>Share:</li>
                                                    <li class="facebook"><a href="#">Facebook</a></li>
                                                    <li class="twitter"><a href="#">Twitter</a></li>
                                                    <li class="pinterest"><a href="#">Pinterest</a></li>
                                                    <li class="instagram"><a href="#">Instagram</a></li>
                                                    <li class="linkedin"><a href="#">Linkedin</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Comment List -->
                                        <div class="comments-area">
											<h3 class="comments-title">Comments</h3>
											<ul class="comment-list">
												<li class="comment even thread-even depth-1">
													<div class="commenter-block">
														<div class="comment-avatar">
															<img alt="img" src="assets/img/blog/commenter-1.jpg" class="avatar">
														</div>
														<div class="comment-content">
															<div class="comment-author-name">Barret Simpson <span class="comment-date">January 29, 2023</span></div>
															<div class="comment-author-comment">
																<p>Lorem ipsum dolor sit amet, consectetur. Ut enim ad minima veniam quis nostrum exercitationem mosequatu autem.</p>
                                                                <span class="comment-reply"><a href="#" class="comment-reply-link">Reply</a></span>
															</div>
														</div>
													</div>
		
													<ul class="children">
														<li class="comment even thread-even depth-2">
															<div class="commenter-block">
																<div class="comment-avatar">
																	<img alt="img" src="assets/img/blog/commenter-2.jpg" class="avatar">
																</div>
																<div class="comment-content">
                                                                    <div class="comment-author-name">Parker Ballinger <span class="comment-date">January 22, 2023</span></div>
                                                                    <div class="comment-author-comment">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur. Ut enim ad minima veniam quis nostrum exercitationem mosequatu autem.</p>
                                                                        <span class="comment-reply"><a href="#" class="comment-reply-link">Reply</a></span>
                                                                    </div>
                                                                </div>
															</div>
														</li><!-- #comment-## -->
													</ul><!-- .children -->
												</li><!-- #comment-## -->
												<li class="comment odd thread-odd depth-1">
													<div class="commenter-block">
														<div class="comment-avatar">
															<img alt="img" src="assets/img/blog/commenter-1.jpg" class="avatar">
														</div>
														<div class="comment-content">
															<div class="comment-author-name">Barret Simpson <span class="comment-date">January 01, 2023</span></div>
															<div class="comment-author-comment">
																<p>Lorem ipsum dolor sit amet, consectetur. Ut enim ad minima veniam quis nostrum exercitationem mosequatu autem.</p>
                                                                <span class="comment-reply"><a href="#" class="comment-reply-link">Reply</a></span>
															</div>
														</div>
													</div>
												</li><!-- #comment-## -->
											</ul>
											<div class="wptb-pagination-wrap">
                                                <ul class="pagination mt-0">
                                                    <li><span class="page-number current">1</span></li>
                                                    <li><a class="page-number" href="#">2</a></li>
                                                    <li>.....</li>
                                                    <li><a class="page-number" href="#">5</a></li>
                                                </ul>
                                            </div>
										</div>

                                        <div class="comment-respond">
											<h3 class="comment-reply-title">Make A Comment <span class="title-line"></span></h3>
											<form class="comment-form" action="https://wpthemebooster.com/demo/themeforest/html/ducatibox/register.php" method="post">
												<p class="logged-in-as">Your email address will not be published. Required fields are marked *</p>
												<div class="form-container">
													<div class="row">
														<div class="col-md-6 col-lg-6">
															<div class="form-group">
																<input type="text" name="name" class="form-control" placeholder="Name*" required>
															</div>
														</div>
														<div class="col-md-6 col-lg-6">
															<div class="form-group">
																<input type="email" name="email" class="form-control" placeholder="E-mail*" required>
															</div>
														</div>
														<div class="col-md-12 col-lg-12">
															<div class="form-group">
																<textarea name="message" class="form-control" placeholder="Text Here*" required></textarea>
															</div>
														</div>
														<div class="col-md-12 col-lg-12">
                                                            <div class="wptb-item--button"> 
                                                                <button type="submit" class="btn-three"> 
                                                                    <span class="btn-wrap">
                                                                        <span class="text-first">Make Comment</span>
                                                                        <span class="text-second">Make Comment</span>
                                                                    </span>
                                                                </button>
                                                            </div>
														</div>
													</div>
												</div>
											</form>
										</div>
                                    </div>
								</div>
                            </div>

                        </div>

                        <!-- Sidebar  -->
                        <div class="col-lg-3 col-md-4 p-0 mt-5 mt-md-0">

                            <div class="sidebar">
								
                                <div class="widget widget_block widget_search">
                                    <form method="get" class="wp-block-search">
                                        <div class="wp-block-search__inside-wrapper ">
                                            <input type="search" class="wp-block-search__input" name="search" value="" placeholder="Search" required="">
                                            <button type="submit" class="wp-block-search__button"><i class="bi bi-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end widget -->

                                <div class="widget widget_block widget_custom">
									<h2 class="widget-title">About Author</h2>
									<div class="sidebar_author">
										<img src="assets/img/blog/author-2.jpg" alt="img">
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
								</div>
                                <!-- end widget -->

                                <div class="widget widget_block">
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
                                </div>
                                <!-- end widget -->

                                <div class="widget widget_block">
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
                                </div>
                                <!-- end widget -->

                                <div class="widget widget_block">
                                    <div class="wp-block-group__inner-container">
                                        <h2 class="widget-title">Recent Posts</h2>
                                        <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                                            <li>
												<div class="latest-posts-image">
													<img src="assets/img/blog/9.jpg" alt="img">
												</div>
												<div class="latest-posts-content">
													<h5><a href="blog.html">What are the first steps when your car breakdown middle of the road</a></h5>
													<h6>02/11/2023</h6>
												</div>
											</li>
											<li>
												<div class="latest-posts-image">
													<img src="assets/img/blog/10.jpg" alt="img">
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
													<img src="assets/img/blog/11.jpg" alt="img">
												</div>
												<div class="latest-posts-content">
													<h5><a href="blog.html">Do’s & Don’ts when you are trying to change flat tires of your car</a></h5>
													<h6>02/10/2023</h6>
												</div>
											</li>
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
			<!-- End Details Content -->
			
		</main>

@endsection

