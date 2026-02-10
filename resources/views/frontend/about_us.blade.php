@extends('frontend.layouts.master')

@section('content')

            <main class="wrapper">
            <!-- Page Header -->
           <div class="wptb-page-heading" style="background-image: url('{{ asset('assets/img/background/page-header-bg.jpg') }}')">

                <div class="container">
                    <div class="wptb-item--inner">
                        <h2 class="wptb-item--title ">About Us</h2>
                        <div class="wptb-breadcrumb-wrap">
                            <ul class="wptb-breadcrumb">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="#">Pages</a></li>
                                <li><span>About Us</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Intro -->
            <section class="wptb-intro-one pd-bottom-50">
                <div class="container">
                    <!-- Single Image -->
                    <div class="wptb-image-single mb-4 d-inline-block wow fadeInUp">
                        <div class="wptb-item--inner">
                            <div class="wptb-item--image">
                                <img src="{{asset('assets/img/background/bg-11.jpg')}}" alt="img">
                            </div>
                        </div>
                    </div>

                    <div class="wptb-heading mb-0 mt-3">
                        <div class="wptb-item--inner">

                            @php
                                $fullCompanyName = trim(
                                    ($general_setting->company_name_start ?? '') . ' ' .
                                    ($general_setting->company_name_middle ?? '') . ' ' .
                                    ($general_setting->company_name_end ?? '')
                                );
                            @endphp

                            <h1 class="wptb-item--title"> About {{ $fullCompanyName }}</h1>
                            
                            <p class="wptb-item--description">{{$about_us->description_start}} </p>
                            <p class="wptb-item--description">{{$about_us->description_middle}} </p>
                            <p class="wptb-item--description">{{$about_us->description_end}} </p>
                            
                            {{-- <h5 class="text-one mt-2 mb-4">
                                We understand that wellbeing is a multifaceted concept, which is why we offer holistic solutions that integrate physical, mental, and spiritual fitness.
                            </h5>

                            <p class="wptb-item--description">When you bring your vehicle to Ducatibox Car Mechanic Center, you can rest easy knowing that your vehicle is in professional hands. We take every possible step to ensure that your experience with us is pleasant and efficient.</p> --}}
                        </div>
                    </div>

                </div>
            </section>

            <!-- Funfacts -->
            <div class="wptb-funfacts-one mr-top-25">
                <div class="container">
                    <div class="wptb-funfacts--inner mb-0">
                        <div class="row">

                        @foreach($services_category as $category)   
                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <div class="wptb-counter1 style1 wow skewIn">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--icon">

                                                @if(!empty($category->svg_icon))
                                                    {!! $category->svg_icon !!}
                                                @endif
                                        </div>
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--text">{{ $category->sub_service_name }}</div>
                                            <div class="wptb-item--value"><span class="odometer" data-count="{{ $category->quantity }}"></span><span class="suffix">+</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>


            <!-- Why Choose -->
            <section class="wptb-service-two bg-image" style="background-image: url('{{ asset('assets/img/background/bg-11.png') }}')">

            {{-- <section class="wptb-service-two bg-image" style="background-image: url('{{asset('assets/img/background/bg-11.png')"> --}}
                <div class="container">
                    <div class="wptb-heading">
                        <div class="wptb-item--inner text-center">
                            <h6 class="wptb-item--subtitle">
                                Our Service List
                            </h6>
                            <h1 class="wptb-item--title"> Why Choose <span>{{ $fullCompanyName }}</span></h1>
                            <div class="wptb-item--divider"></div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-4 col-sm-6 pe-lg-5">
                            <!-- Iconbox Start -->

                            @foreach ($categories->slice(0, 3) as $category )
                                
                            
                            <div class="wptb-icon-box2 style2 text-lg-end wow fadeInRight">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--holder">
                                        <div class="wptb-item--icon">

                                @php
                                    $logoFirst = $category->multipleImages->where('type', 'logo_first')->first();
                                @endphp


                                             <img src="{{ $logoFirst ? asset('storage/' . $logoFirst->image) : asset('assets/img/services/icon-1.png') }}" alt="{{ $category->service_name }}"
                                             >
                                        </div>
                                        <h3 class="wptb-item--title">{{ $category->service_name }}</h3>
                                        <p class="wptb-item--description mb-0"> {{ $category->short_title ?? 'No description available.' }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                        <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                            <!-- Single Image -->
                            <div class="wptb-image-single slide-bottom-to-top">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                                        <img src="{{asset('assets/img/more/car.png')}}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 ps-lg-5">
                            <!-- Iconbox Start -->

                            @foreach ($categories->slice(3, 3) as $category)
                                <div class="wptb-icon-box2 style2 wow fadeInLeft">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--icon">
                                            @php
                                                $logoFirst = $category->multipleImages->where('purpose', 'logo_first')->first();
                                            @endphp
                                             <img src="{{ $logoFirst ? asset('storage/' . $logoFirst->image) : asset('assets/img/services/icon-1.png') }}" alt="{{ $category->service_name }}"
                                             >

                                            </div>
                                            <h3 class="wptb-item--title">{{ $category->service_name }}</h3>
                                            <p class="wptb-item--description mb-0"> {{ $category->short_title ?? 'No description available.' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            
            </section>

            <!-- Team Grid -->
            <!-- Our Team -->
            <section class="wptb-team-one">
                <div class="container">

                    <div class="wptb-timeline--inner">
                        <div class="row clearfix">
                            
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="wptb-heading">
                                    <div class="wptb-item--inner">
                                        <h6 class="wptb-item--subtitle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="18" viewBox="0 0 70 18" fill="none">
                                                <g clip-path="url(#clip0_322_42674)">
                                                  <path d="M30.4781 0.857422H21.0473L3.69531 18.0003H13.1261L30.4781 0.857422Z" fill="#D70006"/>
                                                  <path d="M48.6968 0.857422H39.2661L21.9141 18.0003H31.3448L48.6968 0.857422Z" fill="#D70006"/>
                                                  <path d="M66.9195 0.857422H57.4806L40.1367 18.0003H49.5594L66.9195 0.857422Z" fill="#D70006"/>
                                                </g>
                                                <defs>
                                                  <clipPath id="clip0_322_42674">
                                                    <rect width="70" height="17.1429" fill="white" transform="translate(0 0.857422)"/>
                                                  </clipPath>
                                                </defs>
                                            </svg>
                                        </h6>
                                        <h1 class="wptb-item--title"> {{$about_us->mechanics_title_start}} <span>{{$about_us->mechanics_title_end}}</span></h1>
                                        <p class="wptb-item--description">  {{$about_us->mechanics_description}} </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Team Block -->

                            @foreach ($workers as $worker )
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="wptb-team-grid2">
                                        <div class="wptb-item--inner">
                                            <div class="wptb-item--image">
                                @php
                                    $workerImage = $worker->multipleImages->where('purpose', 'worker_profile')->first();
                                @endphp

                                        <img src="{{ $workerImage ? asset('storage/' . $workerImage->image) : asset('assets/img/team/1.jpg') }}" alt="{{ $category->service_name }}"
                                             >
                                               
                                                <div class="wptb-item--social">
                                                    @if (!empty($worker->linkedin))
                                                        <a href="{{$worker->linkedin}}"><i class="bi bi-linkedin"></i></a>
                                                    @endif
                                                    @if (!empty($worker->twitter))
                                                        <a href="{{$worker->twitter}}"><i class="bi bi-twitter-x"></i></a>
                                                    @endif
                                                    @if (!empty($worker->instagram))                                                    
                                                        <a href="{{$worker->instagram}}"><i class="bi bi-instagram"></i></a>
                                                    @endif
                                                    @if (!empty($worker->facebook))                                                    
                                                        <a href="{{$worker->facebook}}"><i class="bi bi-facebook"></i></a>
                                                    @endif
                                                                                                     
                                                </div>
                                            </div>

                                            <div class="wptb-item--holder">
                                                <div class="wptb-item--meta">
                                                    <p class="wptb-item--position">{{$worker->designation}}</p>
                                                    <h5 class="wptb-item--title"><a href="team-details.html">{{$worker->name}}</a></h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                           


                        </div>
                    </div>
                </div>
            </section>


            <!-- Testimonial -->
            <section class="wptb-testimonial-one bg-image" style="background-image: url('{{asset('assets/img/background/bg-3.jpg')}}');">
                <div class="container">
                    <div class="wptb-heading">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="wptb-item--inner">
                                    <h6 class="wptb-item--subtitle">
                                        Clients Testimonial
                                    </h6>
                                    <h1 class="wptb-item--title"> What Our Clients Say
                                        About {{ $fullCompanyName }} </h1>
                                </div>
                            </div>
                            
                            {{-- <div class="col-md-6">
                                <div class="wptb-item--button text-md-end">
                                    <a class="btn-two" href="contact-1.html">
                                        <span class="btn-wrap">
                                            <span class="text-first">See All reviews</span>
                                            <span class="text-second"> <i class="bi bi-plus"></i> </span>
                                        </span>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="swiper-container swiper-testimonial">    
                        <!-- swiper slides -->
                        <div class="swiper-wrapper">
                                                        @foreach ($reviews as $review )
                                                            
                                                        
                                                        <div class="swiper-slide">
                                                            <div class="wptb-testimonial1 style3">



                                                                <div class="wptb-item--inner">
                                                                    <div class="wptb-item--image">
                                                                        @php
                                                                            $image = $review->multipleImages->where('type', 'customer_image')->first();
                                                                        @endphp

                                                                        @if ($image)
                                                                            <img src="{{ asset('storage/' . $image->image) }}" alt="img">
                                                                        @endif

                                                                        {{-- <img src="{{ asset('assets/img/testimonial/1.jpg') }}" alt="img"> --}}




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
                            
                                                                        <p class="wptb-item--description"> “{{$review->customer_message}}”</p>
                                                                        <div class="wptb-item--meta">
                                                                            <div class="wptb-item--meta-left">
                                                                                <h4 class="wptb-item--title">{{$review->customer_name}}</h4>
                                                                                <h6 class="wptb-item--designation">{{$review->place}}</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>
                                                    @endforeach

                            {{-- <div class="swiper-slide">
                                <div class="wptb-testimonial1">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="{{asset('assets/img/testimonial/2.jpg')}}" alt="img">
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
                                <div class="wptb-testimonial1">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="{{asset('assets/img/testimonial/3.jpg')}}" alt="img">
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
                            </div> --}}


                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection