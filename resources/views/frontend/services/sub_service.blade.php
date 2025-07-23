@extends('frontend.layouts.master')

@section('content')

{{-- @dd($subService); --}}
        <!-- Main Wrapper-->
        <main class="wrapper">
            <!-- Page Header -->
<div class="wptb-page-heading" style="background-image: url('{{ asset('assets/img/background/page-header-bg.jpg') }}');">

                <div class="container">
                    <div class="wptb-item--inner">
                        <h2 class="wptb-item--title ">{{$subService->sub_service_name}}</h2>
                        <div class="wptb-breadcrumb-wrap">
                            <ul class="wptb-breadcrumb">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="#">Services</a></li>
                                <li><span>{{$subService->sub_service_name}}</span></li>
                            </ul>
                        </div>
                    </div>

                   
                </div>
            </div>

			
			<!-- Details Content -->
			<section class="blog-details pd-bottom-300">
				<div class="container">
					<div class="row">
                        <div class="wptb-breadcrumb-wrap">
                            <p >{{$subService->banner_short_title}}</p>
                            <h2>{{$subService->banner_long_title}}</h2>
                            <p>{{$subService->banner_description}}</p>
                        </div> 
                        <div class="col-lg-9 col-md-8 mb-5 mb-md-0 pe-md-5">
                            <div class="blog-details-inner">
                                <div class="post-content">

                                    <div class="post-header">
                                        <h1 class="widget-title"> About Our Services</h1>
                                    </div>
                                    <div class="fulltext">
                                         <p>{!! $subService->service_introduction_description !!}</p>



                                        <!-- Start Section -->
                                        <h4 class="widget-title">{{$subService->key_services_list}}</h4>

                                        <p>{!! $subService->key_service_description !!}</p>

                                    <figure class="block-gallery mb-4">

                                    @foreach($subService->multipleImages->where('type', 'key_service_images') as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" class="mb-2">
                                    @endforeach

                                    </figure>


                                        <h4 class="widget-title">{{$subService->features_and_benefit_list}}</h4>

                                        <p>{!! $subService->features_and_benefit_description !!}</p>

                                    <figure class="block-gallery mb-4">

                                    @foreach($subService->multipleImages->where('type', 'features_and_benefit_images') as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" class="mb-2">
                                    @endforeach

                                    </figure>

                                    
                                        <h4 class="widget-title">{{$subService->how_do_we_work_list}}</h4>

                                        <p>{!! $subService->how_do_we_work_description !!}</p>

                                    <figure class="block-gallery mb-4">

                                    @foreach($subService->multipleImages->where('type', 'how_do_we_work_images') as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" class="mb-2">
                                    @endforeach

                                    </figure>

                                    
                                        <h4 class="widget-title">{{$subService->expected_result_list}}</h4>

                                        <p>{!! $subService->expected_result_description !!}</p>

                                    <figure class="block-gallery mb-4">

                                    @foreach($subService->multipleImages->where('type', 'expected_result_images') as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" class="mb-2">
                                    @endforeach

                                    </figure>




 <!-- FAQ Section -->
<div class="elementor-element elementor-element-098e316 elementor-widget elementor-widget-malensectiontitle" data-id="098e316" data-element_type="widget">
    <div class="elementor-widget-container">
        <div class="title-area text-center">
            <span class="sub-title th-sub">Have Any Questions?<span class="double-line"></span></span>
            <h2 class="sec-title th-title">Frequently Asked Questions</h2>
        </div>
    </div>
</div>

<div class="elementor-element elementor-element-9aff493 elementor-widget elementor-widget-malenfaq" data-id="9aff493" data-element_type="widget">
    <div class="elementor-widget-container">
        <div class="accordion-area accordion" id="faqAccordion1">
            @foreach ($subService->fAQs as $index => $faq)
                <div class="accordion-card">
                    <div class="accordion-header" id="collapse-item-{{ $index+1 }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index+1 }}" aria-expanded="false" aria-controls="collapse-1">
                            {{$faq->question}}
                        </button>
                    </div>
                    <div id="collapse-{{ $index+1 }}" class="accordion-collapse collapse" aria-labelledby="collapse-item-{{ $index+1 }}" data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            <p>{{$faq->answer}}</p>
                        </div>
                    </div>
                </div>
            @endforeach 
            
        </div>
    </div>
</div>








                                        <!-- Start Section -->
                                        <h4 class="widget-title">Clients Testimonial</h4>
                                        <div class="wptb-testimonial-one">
                                            <div class="container">                            
                                                <div class="swiper-container swiper-testimonial">    
                                                    <!-- swiper slides -->
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="wptb-testimonial1 style3">
                                                                <div class="wptb-item--inner">
                                                                    <div class="wptb-item--image">
                                                                        <img src="assets/img/testimonial/1.jpg" alt="img">
                                                                        <div class="wptb-item--icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="57" height="45" viewBox="0 0 57 45" fill="none">
                                                                                <path d="M51.5137 38.5537C56.8209 32.7938 56.2866 25.3969 56.2697 25.3125V2.8125C56.2697 2.06658 55.9734 1.35121 55.4459 0.823763C54.9185 0.296317 54.2031 0 53.4572 0H36.5822C33.48 0 30.9572 2.52281 30.9572 5.625V25.3125C30.9572 26.0584 31.2535 26.7738 31.781 27.3012C32.3084 27.8287 33.0238 28.125 33.7697 28.125H42.4266C42.3671 29.5155 41.9517 30.8674 41.22 32.0513C39.7913 34.3041 37.0997 35.8425 33.2156 36.6188L30.9572 37.0688V45H33.7697C41.5969 45 47.5678 42.8316 51.5137 38.5537ZM20.5566 38.5537C25.8666 32.7938 25.3294 25.3969 25.3125 25.3125V2.8125C25.3125 2.06658 25.0162 1.35121 24.4887 0.823763C23.9613 0.296317 23.2459 0 22.5 0H5.625C2.52281 0 0 2.52281 0 5.625V25.3125C0 26.0584 0.296316 26.7738 0.823762 27.3012C1.35121 27.8287 2.06658 28.125 2.8125 28.125H11.4694C11.41 29.5155 10.9945 30.8674 10.2628 32.0513C8.83406 34.3041 6.1425 35.8425 2.25844 36.6188L0 37.0688V45H2.8125C10.6397 45 16.6106 42.8316 20.5566 38.5537Z" fill="#D70006"/>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                        
                                                                    <div class="wptb-item--holder">
                                                                        <div class="wptb-item--meta-rating">
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                        </div>
                            
                                                                        <p class="wptb-item--description"> “I am extremely grateful to Ducatibox Visa Consultancy for making my dream true. The helped me process my visa for Canada. It has accepted in record time. Ducatibox are amazing so I Highly recommend them.”</p>
                                                                        <div class="wptb-item--meta">
                                                                            <div class="wptb-item--meta-left">
                                                                                <h4 class="wptb-item--title">Helen Jordan</h4>
                                                                                <h6 class="wptb-item--designation">Chicago</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                            
                                                        <div class="swiper-slide">
                                                            <div class="wptb-testimonial1 style3">
                                                                <div class="wptb-item--inner">
                                                                    <div class="wptb-item--image">
                                                                        <img src="assets/img/testimonial/2.jpg" alt="img">
                                                                        <div class="wptb-item--icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="57" height="45" viewBox="0 0 57 45" fill="none">
                                                                                <path d="M51.5137 38.5537C56.8209 32.7938 56.2866 25.3969 56.2697 25.3125V2.8125C56.2697 2.06658 55.9734 1.35121 55.4459 0.823763C54.9185 0.296317 54.2031 0 53.4572 0H36.5822C33.48 0 30.9572 2.52281 30.9572 5.625V25.3125C30.9572 26.0584 31.2535 26.7738 31.781 27.3012C32.3084 27.8287 33.0238 28.125 33.7697 28.125H42.4266C42.3671 29.5155 41.9517 30.8674 41.22 32.0513C39.7913 34.3041 37.0997 35.8425 33.2156 36.6188L30.9572 37.0688V45H33.7697C41.5969 45 47.5678 42.8316 51.5137 38.5537ZM20.5566 38.5537C25.8666 32.7938 25.3294 25.3969 25.3125 25.3125V2.8125C25.3125 2.06658 25.0162 1.35121 24.4887 0.823763C23.9613 0.296317 23.2459 0 22.5 0H5.625C2.52281 0 0 2.52281 0 5.625V25.3125C0 26.0584 0.296316 26.7738 0.823762 27.3012C1.35121 27.8287 2.06658 28.125 2.8125 28.125H11.4694C11.41 29.5155 10.9945 30.8674 10.2628 32.0513C8.83406 34.3041 6.1425 35.8425 2.25844 36.6188L0 37.0688V45H2.8125C10.6397 45 16.6106 42.8316 20.5566 38.5537Z" fill="#D70006"/>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                        
                                                                    <div class="wptb-item--holder">
                                                                        <div class="wptb-item--meta-rating">
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                        </div>
                            
                                                                        <p class="wptb-item--description"> “I am extremely grateful to Ducatibox Visa Consultancy for making my dream true. The helped me process my visa for Canada. It has accepted in record time. Ducatibox are amazing so I Highly recommend them.”</p>
                                                                        <div class="wptb-item--meta">
                                                                            <div class="wptb-item--meta-left">
                                                                                <h4 class="wptb-item--title">Ashley Jonathon</h4>
                                                                                <h6 class="wptb-item--designation">Toronto</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                            
                                                        <div class="swiper-slide">
                                                            <div class="wptb-testimonial1 style3">
                                                                <div class="wptb-item--inner">
                                                                    <div class="wptb-item--image">
                                                                        <img src="assets/img/testimonial/3.jpg" alt="img">
                                                                        <div class="wptb-item--icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="57" height="45" viewBox="0 0 57 45" fill="none">
                                                                                <path d="M51.5137 38.5537C56.8209 32.7938 56.2866 25.3969 56.2697 25.3125V2.8125C56.2697 2.06658 55.9734 1.35121 55.4459 0.823763C54.9185 0.296317 54.2031 0 53.4572 0H36.5822C33.48 0 30.9572 2.52281 30.9572 5.625V25.3125C30.9572 26.0584 31.2535 26.7738 31.781 27.3012C32.3084 27.8287 33.0238 28.125 33.7697 28.125H42.4266C42.3671 29.5155 41.9517 30.8674 41.22 32.0513C39.7913 34.3041 37.0997 35.8425 33.2156 36.6188L30.9572 37.0688V45H33.7697C41.5969 45 47.5678 42.8316 51.5137 38.5537ZM20.5566 38.5537C25.8666 32.7938 25.3294 25.3969 25.3125 25.3125V2.8125C25.3125 2.06658 25.0162 1.35121 24.4887 0.823763C23.9613 0.296317 23.2459 0 22.5 0H5.625C2.52281 0 0 2.52281 0 5.625V25.3125C0 26.0584 0.296316 26.7738 0.823762 27.3012C1.35121 27.8287 2.06658 28.125 2.8125 28.125H11.4694C11.41 29.5155 10.9945 30.8674 10.2628 32.0513C8.83406 34.3041 6.1425 35.8425 2.25844 36.6188L0 37.0688V45H2.8125C10.6397 45 16.6106 42.8316 20.5566 38.5537Z" fill="#D70006"/>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                        
                                                                    <div class="wptb-item--holder">
                                                                        <div class="wptb-item--meta-rating">
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                        </div>
                            
                                                                        <p class="wptb-item--description"> “I am extremely grateful to Ducatibox Visa Consultancy for making my dream true. The helped me process my visa for Canada. It has accepted in record time. Ducatibox are amazing so I Highly recommend them.”</p>
                                                                        <div class="wptb-item--meta">
                                                                            <div class="wptb-item--meta-left">
                                                                                <h4 class="wptb-item--title">Bob Garrison</h4>
                                                                                <h6 class="wptb-item--designation">Sydney</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- pagination dots -->
                                                    <div class="wptb-swiper-dots">
                                                        <div class="swiper-pagination text-start"></div>
                                                    </div>
                                                    <!-- !pagination dots -->
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                            
                        <!-- Service Navigation List -->
                        <div class="col-lg-3 col-md-4 p-md-0">
                            <div class="sidebar">
                                <div class="sidenav">
                                    <ul class="side_menu">
										<li class="menu-item active">
											<a href="service-details.html" class="d-flex align-items-center justify-content-between">
                                                <span>
                                                    Engine Oil Changing
                                                </span>
                                                <i class="bi bi-chevron-right"></i>
											</a>
										</li>

										<li class="menu-item">
											<a href="service-details.html" class="d-flex align-items-center justify-content-between">
                                                <span>
                                                    Ceramic Coating Services
                                                </span>
                                                <i class="bi bi-chevron-right"></i>
											</a>
										</li>
                                        
										<li class="menu-item">
											<a href="service-details.html" class="d-flex align-items-center justify-content-between">
                                                <span>
                                                    Engine Repair Services
                                                </span>
                                                <i class="bi bi-chevron-right"></i>
											</a>
										</li>

										<li class="menu-item">
											<a href="service-details.html" class="d-flex align-items-center justify-content-between">
                                                <span>
                                                    Battery Check & Repair
                                                </span>
                                                <i class="bi bi-chevron-right"></i>
											</a>
										</li>

										<li class="menu-item">
											<a href="service-details.html" class="d-flex align-items-center justify-content-between">
                                                <span>
                                                    Tire Disc Blade Changing
                                                </span>
                                                <i class="bi bi-chevron-right"></i>
											</a>
										</li>

										<li class="menu-item">
											<a href="service-details.html" class="d-flex align-items-center justify-content-between">
                                                <span>
                                                    Hydro Dripping
                                                </span>
                                                <i class="bi bi-chevron-right"></i>
											</a>
										</li>
									</ul>
                                </div>                             

                                <div class="wptb-banner2 mr-top-30"> 
                                    <div class="wptb-banner-inner"> 
                                        <a class="wptb-item--link" href="tel:+234567811"></a>
                                        <div class="wptb-item--image">
                                            <div class="wptb-item-img-primary " data-wow-delay="ms"> 
                                                <img src="assets/img/more/banner.jpg" alt="">
                                            </div>
                                        </div>
                                
                                        <div class="wptb-wrap-content">
                                            <div class="wptb-wrap-shape"> 
                                                <img src="assets/img/more/banner-shape.png" alt="">
                                            </div>
                                            
                                            <div class="wptb-content" style="background-image: url('assets/img/more/banner-shape.png');">
                                                <div class="wptb-item--title">Get best Car Mechanics</div>
                                                <div class="wptb-item-contact-info">
                                                    <div class="wptb-item--icon"> 
                                                        <i class="bi bi-telephone-fill"></i>
                                                    </div> 
                                                    <span class="wptb-item--desc">Need Help? Book Lab Visit</span>
                                                    <h5 class="wptb-item--number">+234 567 811</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
				</div>
			</section>
			<!-- End Details Content -->
			
		</main>





{{-- <div class="breadcumb-wrapper" id="breadcumbwrap">
    <div class="container">
        <div class="row">
            <div class="breadcumb-content">
                <h1 class="bread-title">{{ $subService->sub_service_name }}</h1>
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">{{ $subService->serviceCategory->service_name }}</a></li>
                    <li>{{ $subService->sub_service_name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="service-details-section pt-120 pb-120">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-8">
                <div class="service-details-wrap">
                    <!-- Banner Section -->
                    <section class="elementor-section elementor-top-section">
                        <div class="elementor-container">
                            <div class="title-area text-center">
                                <span class="sub-title th-sub">{{ $subService->banner_short_title }}</span>
                                <h1 class="sec-title th-title">{{ $subService->banner_long_title }}</h1>
                            </div>
                            <div class="elementor-widget-container">
                                <p>{{ $subService->banner_description }}</p>
                            </div>
                            <div class="btn-wrapper">
                                <a class="th-btn th_btn" href="tel:{{ $general_setting->phone }}">
                                    <i class="fas fa-car"></i> Book Your {{ $subService->sub_service_name }} Today 
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </section>

                    <!-- About Our Services -->
                    <div class="service-about-box">
                        <h4>About Our Services</h4>
                        <p>{{ $subService->service_introduction_description }}</p>
                    </div>

                    <!-- Key Services -->
                    <div class="service-key-box">
                        <h4>Our Key {{ $subService->sub_service_name }} Services:</h4>
                        <ul class="service-key-list">
                            @foreach(explode("\n", $subService->key_services_list) as $service)
                                @if(trim($service))
                                    <li><i class="fas fa-check"></i> {{ $service }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <p>{{ $subService->key_service_description }}</p>
                    </div>

                    <!-- Features and Benefits -->
                    <div class="service-features-box">
                        <h4>Features & Benefits of Our {{ $subService->sub_service_name }} Service</h4>
                        <ul class="service-features-list">
                            @foreach(explode("\n", $subService->features_and_benefit_list) as $feature)
                                @if(trim($feature))
                                    <li><i class="fas fa-check"></i> {{ $feature }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <p>{{ $subService->features_and_benefit_description }}</p>
                    </div>

                    <!-- How We Work -->
                    <div class="service-process-box">
                        <h4>How do we work?</h4>
                        <div class="process-steps">
                            @foreach(explode("\n", $subService->how_do_we_work_list) as $step)
                                @if(trim($step))
                                    <div class="process-step">
                                        <p>{{ $step }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <p>{{ $subService->how_do_we_work_description }}</p>
                    </div>

                    <!-- Expected Results -->
                    <div class="service-results-box">
                        <h4>Expected Results After Our Service:</h4>
                        <ul class="service-results-list">
                            @foreach(explode("\n", $subService->expected_result_list) as $result)
                                @if(trim($result))
                                    <li><i class="fas fa-check"></i> {{ $result }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <p>{{ $subService->expected_result_description }}</p>
                    </div>

                    <!-- Gallery -->
                    @if($subService->multipleImages->count() > 0)
                    <div class="service-gallery-box">
                        <h4>Our Work Gallery</h4>
                        <div class="gallery-slider swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($subService->multipleImages as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $subService->sub_service_name }}">
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-xl-4">
                <div class="service-sidebar">
                    <!-- Service Categories -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Our Services</h4>
                        <ul class="service-category-list">
                            @foreach($serviceCategories as $category)
                            <li>
                                <a href="#">{{ $category->service_name }}</a>
                                @if($category->subServiceCategories->count() > 0)
                                <ul class="sub-service-list">
                                    @foreach($category->subServiceCategories as $sub)
                                    <li><a href="{{ route('services.subcategory', ['sub_service_category' => $sub->id]) }}">{{ $sub->sub_service_name }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Contact Widget -->
                    <div class="sidebar-widget contact-widget">
                        <h4 class="widget-title">Need Help?</h4>
                        <div class="contact-info">
                            <p><i class="fas fa-phone"></i> <a href="tel:{{ $general_setting->phone }}">{{ $general_setting->phone }}</a></p>
                            <p><i class="fas fa-envelope"></i> <a href="mailto:{{ $general_setting->email }}">{{ $general_setting->email }}</a></p>
                            <p><i class="fas fa-map-marker-alt"></i> {{ $general_setting->address }}</p>
                        </div>
                        <div class="working-hours">
                            <h5>Working Hours</h5>
                            <p>{{ $general_setting->working_time }}</p>
                        </div>
                    </div>

                    <!-- Call to Action -->
                    <div class="sidebar-widget cta-widget">
                        <h4>Book Your Service Now!</h4>
                        <p>Don't wait until it's too late. Get your car serviced today by our experts.</p>
                        <a href="tel:{{ $general_setting->phone }}" class="th-btn th_btn">Call Now <i class="fa-solid fa-phone"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

{{-- @push('custom-scripts')
<script>
    // Initialize gallery slider
    var gallerySwiper = new Swiper('.gallery-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            }
        }
    });
</script>
@endpush --}}