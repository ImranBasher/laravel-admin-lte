@extends('frontend.layouts.master')

@section('content')       

                            @php
                                $fullCompanyName = trim(
                                    ($general_setting->company_name_start ?? '') . ' ' .
                                    ($general_setting->company_name_middle ?? '') . ' ' .
                                    ($general_setting->company_name_end ?? '')
                                );
                            @endphp



            <!-- Slider Section -->
            <section class="wptb-slider p-0">

@if (session('success'))
{{-- <div class="toast-container position-fixed top-10 end-0 p-5"> --}}
    <div class="toast-container position-fixed" style="top: 110px; right: 8px; ">
    <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif



				<div class="swiper-container swiper-main-slider">    
                    <!-- swiper slides -->
                    <div class="swiper-wrapper">

                    @foreach ($main_banners as $banner)
                        @php
                            $image = $banner->multipleImages->first(); // get the first image
                            $imagePath = $image ? asset('storage/' . $image->image) : asset('assets/img/slider/placeholder.jpg'); // fallback if no image
                        @endphp

                        <div class="swiper-slide">
                            <div class="wptb-slider--item">
                                <div class="wptb-slider--image" style="background-image: url('{{ $imagePath }}');"></div>
                                <div class="container">
                                    <div class="wptb-slider--inner">
                                        <div class="row">
                                            <div class="col-xxl-7 col-lg-6 col-md-10 col-sm-12">
                                                <div class="wptb-heading">
                                                    <div class="wptb-item--inner">
                                                        <h6 class="wptb-item--subtitle"> {{ $banner->short_title }} </h6>
                                                        <h1 class="wptb-item--title"> {{ $banner->long_title }} </h1>
                                                        <div class="wptb-item--button"> 
                                                            <a class="btn-two" href="#">
                                                                <div class="btn-wrap">
                                                                    <span class="text-first"> Contact Us </span> 
                                                                    <span class="text-second"> <i class="bi bi-plus"></i> </span> 
                                                                </div> 
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wptb-item-layer wptb-item-layer-one">
                                            <img src="{{ asset('assets/img/slider/layer-1.png') }}" alt="img">
                                        </div>
                                        <div class="wptb-item-layer wptb-item-layer-two">
                                            <img src="{{ asset('assets/img/slider/layer-2.png') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>

                    <!-- pagination dots -->
                    <div class="wptb-swiper-dots">
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- !pagination dots -->
                </div>
			</section>

            <!-- Services Grid -->
            <section class="wptb-service-one z-index-2 bg-image-2 position-relative" style="background-image: url('assets/img/background/bg-1.png');">
                <div class="wptb-item-layer wptb-item-layer-four slide-top-to-bottom">
                    <img src="assets/img/more/object4.png" alt="img">
                </div>
                <div class="container">
                    <div class="wptb-heading">
                        <div class="wptb-item--inner">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-7">
                                    <h6 class="wptb-item--subtitle">
                                        Our Service List
                                    </h6>
                                    <h1 class="wptb-item--title"> {{$service_section->title}} <br>
                                        {{$service_section->title_first}} <span>{{$service_section->title_middle}}</span> {{$service_section->title_end}}</h1>
                                    <div class="wptb-item--divider"></div>
                                </div>
                                <div class="col-lg-5 col-md-5">
                                    <div class="wptb-item--button text-md-end">
                                        <a class="btn-two" href="services-1.html">
                                            <span class="btn-wrap">
                                                <span class="text-first">All Services</span>
                                                <span class="text-second"> <i class="bi bi-plus"></i> </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        @foreach($services_category as $category)
                            @php
                                $image = $category->multipleImages->first(); // First related image
                                $imagePath = $image ? asset('storage/' . $image->image) : asset('assets/img/services/placeholder.jpg'); // Fallback image
                            @endphp

                            <div class="col-lg-4 col-sm-6">
                                <div class="wptb-image-box1 wow fadeInLeft">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--holder">
                                            <h3 class="wptb-item--title">
<a href="{{ route('services.subcategory', ['sub_service_category' => $category->id]) }}">
                                                    {{ $category->sub_service_name }}
                                                </a>
                                            </h3>

                                            <p class="wptb-item--description">
                                                {{ Str::limit(strip_tags($category->banner_description), 100) }}
                                            </p>

                                            <div class="wptb-item--icon">
                                                {{-- Keep your existing SVG here --}}

                                                @if(!empty($category->svg_icon))
                                                    {!! $category->svg_icon !!}
                                                @endif
                                                
                                            </div>

                                            <div class="wptb-item--image">
                                                {{-- <a href="{{ route('service.details', $category->id) }}" class="wptb-item-link"> --}}
                                                    <img src="{{ $imagePath }}" alt="service">
                                                {{-- </a> --}}
                                            </div>

                                            <div class="wptb-item--button">
                                                {{-- <a class="btn-three black" href="{{ route('service.details', $category->id) }}"> --}}
                                                    <span class="btn-wrap">
                                                        <span class="text-first">Get Services</span>
                                                        {{-- <span class="text-second">Get Services</span> --}}
                                                    </span>
                                                {{-- </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </section>




            <!-- Funfacts -->
            <section class="wptb-funfacts-one has-before-bg py-0">
                <div class="container">
                    <div class="wptb-funfacts--inner">
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
            </section>


            <!-- About Company -->
            <section class="wptb-about-company-one bg-image-2" style="background-image: url('assets/img/background/bg-2.png');">
                <div class="container">
                    <div class="row pd-top-140">
                        <div class="col-md-6">
                            <!-- Single Image -->
                            <div class="wptb-image-single wow skewIn">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                                    @php
                                        $image = $motivation->multipleImages->first(); // get the first image
                                        $imagePath = $image ? asset('storage/' . $image->image) : asset('assets/img/slider/placeholder.jpg'); // fallback if no image
                                    @endphp
                                        <img src="{{$imagePath}}" alt="img" class="image-main">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5 mt-md-0">
                            <div class="wptb-about-company--inner">
                                <div class="wptb-heading">
                                    <div class="wptb-item--inner">
                                        <h6 class="wptb-item--subtitle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" viewBox="0 0 110 110" fill="none">
                                                <g clip-path="url(#clip0_1_48600)">
                                                  <path d="M78.4937 61.3448L78.4936 47.7922C78.4936 47.1684 77.9879 46.6627 77.3642 46.6629L72.8468 46.6629C72.5472 46.6627 72.2599 46.7818 72.0482 46.9936C71.8364 47.2054 71.7173 47.4927 71.7174 47.7922L71.7174 61.3449C71.7174 61.6567 71.8438 61.9392 72.0482 62.1436C72.2525 62.3479 72.5349 62.4744 72.8468 62.4743H77.3642C77.6638 62.4744 77.951 62.3554 78.1628 62.1436C78.3746 61.9318 78.4936 61.6444 78.4937 61.3448ZM73.976 48.9215L76.2349 48.9216L76.235 51.1804H73.976L73.976 48.9215ZM73.976 53.4391L76.235 53.4391L76.235 55.698L73.976 55.698L73.976 53.4391ZM73.976 60.2155L73.976 57.9565L76.235 57.9565V60.2155L73.976 60.2155Z" fill="#D70006"/>
                                                  <path d="M99.6653 61.7718C99.8075 61.4235 99.7669 61.0273 99.5571 60.7151C99.3474 60.4026 98.9959 60.2155 98.6197 60.2154L82.9658 60.2154L82.9658 48.9216L98.6586 48.9216C99.0337 48.9216 99.3842 48.7355 99.5943 48.4249C99.8043 48.1142 99.8466 47.7194 99.7069 47.3715C98.2983 43.8631 95.9039 40.869 92.783 38.7128C89.5859 36.504 85.8346 35.3311 81.9315 35.3209C81.9066 35.3209 81.8817 35.3217 81.8568 35.3217C81.8501 35.3216 81.8435 35.3208 81.8368 35.3207C81.8257 35.3207 81.8149 35.3221 81.8039 35.3223C76.7236 35.3551 71.9521 37.3482 68.3561 40.9448L62.6852 46.6147L11.1804 46.6153C9.06886 46.6151 7.08338 47.4374 5.59028 48.9305C4.09717 50.4236 3.2747 52.4088 3.2746 54.5205C3.27459 56.7002 4.16106 58.6766 5.59262 60.1082C7.02418 61.5398 9.00061 62.4262 11.1802 62.4263L62.5902 62.4263L68.2609 68.096C71.8881 71.7229 76.7093 73.72 81.8337 73.72C85.732 73.7303 89.4882 72.578 92.696 70.3878C95.8275 68.2498 98.2374 65.2704 99.6653 61.7718ZM96.8975 46.663H82.9659L82.966 37.6157C88.9101 37.9888 94.1594 41.4138 96.8975 46.663ZM69.8592 66.5001C69.8581 66.4989 63.8564 60.4983 63.8564 60.4983C63.6446 60.2865 63.3573 60.1676 63.0578 60.1675L11.1803 60.1675C8.06676 60.1675 5.53342 57.6342 5.53341 54.5206C5.53341 53.0122 6.12099 51.5943 7.18752 50.5277C8.25416 49.4611 9.67209 48.8739 11.1805 48.8739L63.1528 48.8738C63.4523 48.8738 63.7396 48.755 63.9514 48.5432L69.9533 42.5426C72.8631 39.6321 76.6451 37.9114 80.7074 37.6235L80.7074 71.4235C76.6078 71.1552 72.7912 69.432 69.8592 66.5001ZM82.9659 71.4265L82.9659 62.4743L96.8466 62.4743C94.0929 67.672 88.8695 71.0557 82.9659 71.4265Z" fill="#D70006"/>
                                                  <path d="M14.5669 54.5209C14.5669 53.6158 14.2144 52.765 13.5744 52.1249C12.9344 51.4849 12.0834 51.1325 11.1786 51.1326C9.31025 51.1326 7.79041 52.6524 7.79041 54.5208C7.79041 55.4259 8.14287 56.2767 8.78273 56.9165C9.42269 57.5565 10.2735 57.9089 11.1787 57.909C13.0468 57.9088 14.5668 56.3889 14.5669 54.5209ZM11.1787 55.6501C10.8769 55.6501 10.5934 55.5327 10.38 55.3193C10.1666 55.1059 10.0491 54.8223 10.0491 54.5205C10.0491 53.8978 10.5559 53.3911 11.1786 53.3911C11.4804 53.3911 11.7639 53.5085 11.9773 53.7219C12.1907 53.9353 12.3082 54.2189 12.3082 54.5204C12.3082 55.1434 11.8014 55.6501 11.1787 55.6501Z" fill="#D70006"/>
                                                  <path d="M61.7383 54.5465C61.7382 52.6783 60.2184 51.1582 58.3501 51.1582L40.222 51.1582C39.5982 51.1582 39.0925 51.6639 39.0926 52.2876C39.0926 52.9114 39.5983 53.417 40.222 53.4169L58.3501 53.4169C58.9728 53.4171 59.4794 53.9236 59.4795 54.5464C59.4795 55.1691 58.9728 55.6759 58.3501 55.6759L18.9996 55.6758C19.0556 55.2948 19.0838 54.909 19.0838 54.5203C19.0838 54.1498 19.058 53.7813 19.0067 53.4169L35.7042 53.4168C36.328 53.4168 36.8337 52.9111 36.8336 52.2875C36.8336 51.6637 36.3279 51.158 35.7042 51.1581L17.5761 51.1581C17.2102 51.1581 16.8671 51.3352 16.6553 51.6337C16.4435 51.9321 16.3893 52.3143 16.5098 52.6597C16.7189 53.259 16.8251 53.885 16.8251 54.5203C16.8251 55.1728 16.714 55.8135 16.4953 56.4245C16.3715 56.7705 16.4236 57.155 16.6351 57.4556C16.6728 57.5091 16.7147 57.5586 16.7601 57.6041C16.97 57.8139 17.2566 57.9348 17.5588 57.9348L58.3503 57.9348C60.2183 57.9349 61.7383 56.4149 61.7383 54.5465Z" fill="#D70006"/>
                                                </g>
                                                <defs>
                                                  <clipPath id="clip0_1_48600">
                                                    <rect width="77.1019" height="77.1019" fill="white" transform="translate(54.5195) rotate(45)"/>
                                                  </clipPath>
                                                </defs>
                                            </svg>
                                        </h6>
                                        <h1 class="wptb-item--title"> {{$motivation->title}}</h1>

                                        <p class="wptb-item--description">
                                            {{$motivation->description}}
                                        </p>
                                        <div class="wptb-item--button">
                                            <a class="btn-two" href="{{route('contact.us')}}">
                                                <span class="btn-wrap">
                                                    <span class="text-first">Contact Us</span>
                                                    <span class="text-second"> <i class="bi bi-plus"></i> </span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Why Choose -->
            <section class="wptb-why-choose-one">
                <div class="container-fluid p-0">
                    <div class="wptb-heading">
                        <div class="wptb-item--inner text-center">
                            <h6 class="wptb-item--subtitle">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="18" viewBox="0 0 70 18" fill="none">
                                        <g clip-path="url(#clip0_421_4730)">
                                          <path d="M30.4781 0.857422H21.0473L3.69531 18.0003H13.1261L30.4781 0.857422Z" fill="#D70006"/>
                                          <path d="M48.6968 0.857422H39.2661L21.9141 18.0003H31.3448L48.6968 0.857422Z" fill="#D70006"/>
                                          <path d="M66.9156 0.857422H57.4767L40.1328 18.0003H49.5555L66.9156 0.857422Z" fill="#D70006"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_421_4730">
                                            <rect width="70" height="17.1429" fill="white" transform="translate(0 0.857422)"/>
                                          </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                Why Choose Us
                            </h6>
                            <h1 class="wptb-item--title">{{$why_choose->title_start}}<span>{{$why_choose->title_end}}</span></h1>
                            <div class="wptb-item--divider"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xxl-7 col-xl-5 p-0">

                            @php
                                $image = $why_choose->multipleImages->first(); // get the first image
                                $imagePath = $image ? asset('storage/' . $image->image) : asset('assets/img/background/bg-5.jpg'); // fallback if no image
                            @endphp

                            <div class="wptb-video-player1 wow zoomIn" style="background-image: url('{{$imagePath}}');">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--holder">
                                        <div class="wptb-item--button">
                                            <a class="btn" data-fancybox href="{{$why_choose->video_link}}">
                                                <span class="text-second"> Play </span>
                                                <span class="line-video-animation line-video-1"></span> 
                                                <span class="line-video-animation line-video-2"></span> 
                                                <span class="line-video-animation line-video-3"></span>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-5 col-xl-7 p-0">
                            <div class="wptb-why-choose--inner">
                                <div class="row g-0">

                                    @foreach($services_category->take(4) as $category)
                                    <!-- Iconbox -->
                                        <div class="col-sm-6 p-0 wow fadeInLeft">
                                            <div class="wptb-icon-box2 mb-0 active highlight">
                                                <div class="wptb-item--inner">
                                                    <div class="wptb-item--holder">
                                                        <div class="wptb-item--icon">
                                                        @if(!empty($category->svg_icon))
                                                    {!! $category->svg_icon !!}
                                                @endif
                                                            
                                                        </div>
                                                        <h3 class="wptb-item--title">
                                                            {{ $category->sub_service_name }}
                                                        </h3>
                                                        <p class="wptb-item--description mb-0"> 
                                                            {{ Str::limit(strip_tags($category->banner_description), 100) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
            <!-- Pricetable -->
            <div class="wptb-pricetable-one" style="background-image: url('assets/img/more/object1.png'); background-position: 25% 100%; background-repeat: no-repeat;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="wptb-heading">
                                <div class="wptb-item--inner">
                                    <h6 class="wptb-item--subtitle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="35" viewBox="0 0 70 35" fill="none">
                                            <path d="M30.4781 17.8574H21.0473L3.69531 35.0003H13.1261L30.4781 17.8574Z" fill="#D70006"/>
                                            <path d="M48.6968 17.8574H39.2661L21.9141 35.0003H31.3448L48.6968 17.8574Z" fill="#D70006"/>
                                            <path d="M66.9195 17.8574H57.4806L40.1367 35.0003H49.5594L66.9195 17.8574Z" fill="#D70006"/>
                                            <path d="M30.4781 18.0002H21.0473L3.69531 0.857386H13.1261L30.4781 18.0002Z" fill="#D70006"/>
                                            <path d="M48.6968 18.0002H39.2661L21.9141 0.857386H31.3448L48.6968 18.0002Z" fill="#D70006"/>
                                            <path d="M66.9195 18.0002H57.4806L40.1367 0.857386H49.5594L66.9195 18.0002Z" fill="#D70006"/>
                                        </svg>
                                    </h6>
                                    <h1 class="wptb-item--title"> Great Packages
                                        For Car Detailing</h1>
                                    <p class="wptb-item--description">Save <span>30%</span> On Yearly Packages</p>
                                </div>
                            </div>

                            <div class="wptb-package-switcher">
                                <label class="toggler toggler--is-active" id="filt-monthly">Monthly</label>
                                <div class="toggle">
                                    <input type="checkbox" id="switcher" class="check">
                                    <b class="b switch"></b>
                                </div>
                                <label class="toggler" id="filt-yearly">Yearly</label>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div id="monthly" class="wptb-price-wrpper">
                                @foreach($packages as $package)
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="wptb-packages1 {{ $package->is_popular ? 'active highlight' : '' }}">
                                        @if($package->is_popular)
                                            <h6 class="wptb-item--tag">{{ $package->tag_text ?? 'Most Popular' }}</h6>
                                        @endif
                                            <div class="wptb-item--inner">
                                                <div class="wptb-item--holder">
                                                    <h6 class="wptb-item--subtitle">{{ $package->subtitle }}</h6>
                                                    <h4 class="wptb-item--title">${{ number_format($package->monthly_price, 2) }}<sub>/car</sub></h4>
                                                    <div class="wptb-list1">
                                                        @foreach($package->features as $feature)
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">{{ $feature }}</div>
                                                        </div>
                                                        @endforeach
                                                        {{-- <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Color Changing Indoor Light</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Heavy Duty Bumper</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Tinting & Polish</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Water Proofing</div>
                                                        </div> --}}

                                                    </div>
    
                                                    <div class="wptb-item--button"> 
                                                       
                                                        <a class="btn-three" href="{{route('contact.us')}}"> 
                                                            <div class="btn-wrap">

                                                                <span class="text-first"> Contact Us </span> 
                                                                <span class="text-second"> Contact Us </span> 
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{-- <div class="col-lg-6">
                                        <div class="wptb-packages1">
                                            <div class="wptb-item--inner">
                                                <div class="wptb-item--holder">
                                                    <h6 class="wptb-item--subtitle">PREMIUM FIT</h6>
                                                    <h4 class="wptb-item--title">$335.99/<sub>car</sub></h4>
                                                    <div class="wptb-list1">
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Water Proofing of Glass</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Seat Cover Installation</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Color Changing Indoor Light</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Heavy Duty Bumper</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Tinting & Polish</div>
                                                        </div>                                            
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Wheel Alignment Checking</div>
                                                        </div>
                                                    </div>
    
                                                    <div class="wptb-item--button"> 
                                                        <a class="btn-three" href="#"> 
                                                            <div class="btn-wrap">
                                                                <span class="text-first"> Get Membership </span> 
                                                                <span class="text-second"> Get Membership </span> 
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <div id="yearly" class="wptb-price-wrpper d-none">
                                <div class="row"> 
                                    @foreach($packages as $package)   
                                    <div class="col-lg-6">
                                        <div class="wptb-packages1 {{ $package->is_popular ? 'active highlight' : '' }}">
                                        @if($package->is_popular)
                                            <h6 class="wptb-item--tag">{{ $package->tag_text ?? 'Most Popular' }}</h6>
                                        @endif
                                            <div class="wptb-item--inner">
                                                <div class="wptb-item--holder">
                                                    <h6 class="wptb-item--subtitle">{{ $package->subtitle }}</h6>
                                                    <h4 class="wptb-item--title">${{ number_format($package->yearly_price, 2) }}<sub>/car</sub></h4>
                                                    <div class="wptb-list1">
                                                       @foreach($package->features as $feature)
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">{{ $feature }}</div>
                                                        </div>
                                                      @endforeach
                                                        {{-- <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Seat Cover Installation</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Color Changing Indoor Light</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Heavy Duty Bumper</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Tinting & Polish</div>
                                                        </div>                                            
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Wheel Alignment Checking</div>
                                                        </div> --}}

                                                    </div>
    
                                                    <div class="wptb-item--button"> 
                                                        <a class="btn-three" href="{{route('contact.us')}}"> 
                                                            <div class="btn-wrap">

                                                                <span class="text-first"> Contact Us </span> 
                                                                <span class="text-second"> Contact Us </span> 
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    {{-- <div class="col-lg-6">
                                        <div class="wptb-packages1 active highlight">
                                            <h6 class="wptb-item--tag">Most Popular</h6>
                                            <div class="wptb-item--inner">
                                                <div class="wptb-item--holder">
                                                    <h6 class="wptb-item--subtitle">Detailing BASIC</h6>
                                                    <h4 class="wptb-item--title">$250/<sub>car</sub></h4>
                                                    <div class="wptb-list1">
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Ceramic Coating</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Color Changing Indoor Light</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Heavy Duty Bumper</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Tinting & Polish</div>
                                                        </div>
    
                                                        <div class="wptb--item">
                                                            <div class="wptb-item--icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="7" viewBox="0 0 30 7" fill="none">
                                                                    <g clip-path="url(#clip0_1_31097)">
                                                                        <path d="M12.0643 0H8.02251L0.585938 7H4.6277L12.0643 0Z" fill="#D70006"/>
                                                                        <path d="M19.8729 0H15.8311L8.39453 7H12.4363L19.8729 0Z" fill="#D70006"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                        <rect width="30" height="7" fill="white"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <div class="wptb-item--text">Water Proofing</div>
                                                        </div>
                                                    </div>
    
                                                    <div class="wptb-item--button"> 
                                                        <a class="btn-three" href="#"> 
                                                            <div class="btn-wrap">
                                                                <span class="text-first"> Get Membership </span> 
                                                                <span class="text-second"> Get Membership </span> 
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Partners -->
            <div class="mr-top-90">    
                <div class="swiper-container swiper-clients">    
                    <!-- swiper slides -->
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="wptb-partner--image1">
                                <a href="#">
                                    <img src="assets/img/clients/logo-01.png" alt="" class="img-fluid">
                                    <img src="assets/img/clients/logo-01.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="wptb-partner--image1">
                                <a href="#">
                                    <img src="assets/img/clients/logo-02.png" alt="" class="img-fluid">
                                    <img src="assets/img/clients/logo-02.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                            <div class="wptb-partner--image1">
                                <a href="#">
                                    <img src="assets/img/clients/logo-03.png" alt="" class="img-fluid">
                                    <img src="assets/img/clients/logo-03.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                            <div class="wptb-partner--image1">
                                <a href="#">
                                    <img src="assets/img/clients/logo-04.png" alt="" class="img-fluid">
                                    <img src="assets/img/clients/logo-04.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                            <div class="wptb-partner--image1">
                                <a href="#">
                                    <img src="assets/img/clients/logo-05.png" alt="" class="img-fluid">
                                    <img src="assets/img/clients/logo-05.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                            <div class="wptb-partner--image1">
                                <a href="#">
                                    <img src="assets/img/clients/logo-06.png" alt="" class="img-fluid">
                                    <img src="assets/img/clients/logo-06.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                            <div class="wptb-partner--image1">
                                <a href="#">
                                    <img src="assets/img/clients/logo-02.png" alt="" class="img-fluid">
                                    <img src="assets/img/clients/logo-02.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- !swiper slides -->
                </div>
            </div>

            <!-- Service Carousel -->
            <section class="wptb-service-carousel pb-0">
                <div class="swiper-container swiper-imagebox">    
                    <!-- swiper slides -->
                    <div class="swiper-wrapper">

                       @foreach($services_category_for_slide as $cate)
                        <div class="swiper-slide">
                            <div class="wptb-image-box3 wow fadeInLeft">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                        
                            @php
                                $image = $cate->multipleImages->first(); // First related image
                                $imagePath = $image ? asset('storage/' . $image->image) : asset('assets/img/services/placeholder.jpg'); // Fallback image
                            @endphp 


                                         <img src="{{ $imagePath }}" alt="img"> 
                                        <div class="wptb-item--button"> 
                                            <a class="btn-three" href="{{ route('services.subcategory', ['sub_service_category' => $cate->id]) }}"> 
                                                <span class="btn-wrap">
                                                    <span class="text-first"><i class="bi bi-arrow-right"></i></span>
                                                    <span class="text-second"><i class="bi bi-arrow-right"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="wptb-item--holder">
                                        <div class="wptb-item--wrap-content">
                                            {{-- <p class="wptb-item--description"> Repair</p> --}}
                                            <h2 class="wptb-item--title">
                                                <a href="{{ route('services.subcategory', ['sub_service_category' => $cate->id]) }}">
                                                    {{ $cate->sub_service_name }}
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>

            <!-- Testimonial -->
            <section class="wptb-testimonial-one bg-image" style="background-image: url('assets/img/background/bg-3.jpg');">
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
                                <div class="wptb-testimonial1">
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
                            </div> --}}


                        </div>
                    </div>
                </div>
            </section>

            <!-- Blog Grid -->
            <section class="wptb-blog-grid-one">
                <div class="container">
                    <div class="wptb-heading">
                        <div class="wptb-item--inner text-center">
                            <h6 class="wptb-item--subtitle">
                                Latest News
                            </h6>
                            <h1 class="wptb-item--title">Read Latest Blogs By Car Experts</h1>
                            <div class="wptb-item--divider"></div>
                        </div>
                    </div>
                    
                    <div class="swiper-container swiper-blog">    
                        <!-- swiper slides -->
                        <div class="swiper-wrapper">

                            @foreach ($blogs as $blog )
                                <div class="swiper-slide">
                                    <div class="wptb-blog-grid1 wow fadeInLeft">
                                        <div class="wptb-item--inner">


                                            <div class="wptb-item--image">
                                                {{-- <a href="blog-details.html" class="wptb-item-link">
                                                    <img src="assets/img/blog/1.jpg" alt="img"></a> --}}
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
                                                
                                                <h3 class="wptb-item--title"><a href="{{ route('frontend.blog.details', $blog->id) }}">{{ $blog->short_title }}</a></h3>
                                                
                                                <div class="wptb-item--meta">
                                                    <div class="wptb-item--author">By <a href="#">{{ $blog->author ?? 'Unknown' }}</a></div>
                                                    {{-- <div class="wptb-item--meta-right">
                                                        <div class="wptb-item--comments"><a href="#comments"><i class="bi bi-chat-left-dots"></i> 243 Comments</a></div>
                                                        <div class="wptb-item--share"><a href="#"><i class="bi bi-reply-fill"></i></a></div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach


                            {{-- <div class="swiper-slide">
                                <div class="wptb-blog-grid1 wow fadeInLeft">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <a href="blog-details.html" class="wptb-item-link"><img src="assets/img/blog/2.jpg" alt="img"></a>
                                            <div class="wptb-item--date">October 19, 2023</div>
                                        </div>
                                        <div class="wptb-item--holder">
                                            
                                            <h3 class="wptb-item--title"><a href="blog-details.html">Useful Tips For Maintaing balance & Allignment in your vehicles</a></h3>
                                            
                                            <div class="wptb-item--meta">
                                                <div class="wptb-item--author">By <a href="#">Marina Willums</a></div>
                                                <div class="wptb-item--meta-right">
                                                    <div class="wptb-item--comments"><a href="#comments"><i class="bi bi-chat-left-dots"></i> 243 Comments</a></div>
                                                    <div class="wptb-item--share"><a href="#"><i class="bi bi-reply-fill"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="swiper-slide">
                                <div class="wptb-blog-grid1 wow fadeInLeft">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <a href="blog-details.html" class="wptb-item-link"><img src="assets/img/blog/3.jpg" alt="img"></a>
                                            <div class="wptb-item--date">October 19, 2023</div>
                                        </div>
                                        <div class="wptb-item--holder">
                                            
                                            <h3 class="wptb-item--title"><a href="blog-details.html">Useful Tips For Maintaing balance & Allignment in your vehicles</a></h3>
                                            
                                            <div class="wptb-item--meta">
                                                <div class="wptb-item--author">By <a href="#">Marina Willums</a></div>
                                                <div class="wptb-item--meta-right">
                                                    <div class="wptb-item--comments"><a href="#comments"><i class="bi bi-chat-left-dots"></i> 243 Comments</a></div>
                                                    <div class="wptb-item--share"><a href="#"><i class="bi bi-reply-fill"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="swiper-slide">
                                <div class="wptb-blog-grid1 wow fadeInLeft">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <a href="blog-details.html" class="wptb-item-link"><img src="assets/img/blog/4.jpg" alt="img"></a>
                                            <div class="wptb-item--date">October 19, 2023</div>
                                        </div>
                                        <div class="wptb-item--holder">
                                            
                                            <h3 class="wptb-item--title"><a href="blog-details.html">Useful Tips For Maintaing balance & Allignment in your vehicles</a></h3>
                                            
                                            <div class="wptb-item--meta">
                                                <div class="wptb-item--author">By <a href="#">Marina Willums</a></div>
                                                <div class="wptb-item--meta-right">
                                                    <div class="wptb-item--comments"><a href="#comments"><i class="bi bi-chat-left-dots"></i> 243 Comments</a></div>
                                                    <div class="wptb-item--share"><a href="#"><i class="bi bi-reply-fill"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        
                        
                        </div>
                        <!-- !swiper slides -->

                        <!-- pagination dots -->
                        <div class="wptb-swiper-dots">
                            <div class="swiper-pagination"></div>
                        </div>
                        <!-- !pagination dots -->
                    </div>
                </div>
            </section>

            <!-- Blog Grid -->
            <section class="wptb-contact-one" style="background-image: url('assets/img/background/bg-4.png');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="wptb-heading">
                                <div class="wptb-item--inner">
                                    <h6 class="wptb-item--subtitle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="35" viewBox="0 0 70 35" fill="none">
                                            <path d="M30.4781 17.8574H21.0473L3.69531 35.0003H13.1261L30.4781 17.8574Z" fill="#D70006"/>
                                            <path d="M48.6968 17.8574H39.2661L21.9141 35.0003H31.3448L48.6968 17.8574Z" fill="#D70006"/>
                                            <path d="M66.9195 17.8574H57.4806L40.1367 35.0003H49.5594L66.9195 17.8574Z" fill="#D70006"/>
                                            <path d="M30.4781 18.0002H21.0473L3.69531 0.857386H13.1261L30.4781 18.0002Z" fill="#D70006"/>
                                            <path d="M48.6968 18.0002H39.2661L21.9141 0.857386H31.3448L48.6968 18.0002Z" fill="#D70006"/>
                                            <path d="M66.9195 18.0002H57.4806L40.1367 0.857386H49.5594L66.9195 18.0002Z" fill="#D70006"/>
                                        </svg>
                                    </h6>
                                    <h1 class="wptb-item--title">Feel Free To Ask Us Anything
                                        For Car Servicing</h1>

                                    <p class="wptb-item--description">
                                        We're here to help with all your car maintenance, repairs, or service inquiries. Drop us a message, and our team will get back to you as soon as possible.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">

                                    <form class="wptb-form" action="{{route('send.customer.mail')}}" method="post">
                                        @csrf
                                        <div class="wptb-form--inner">        
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 mb-4">
                                                    <div class="form-group">
                                                        <input type="text" name="name" class="form-control" placeholder="Name*" required>
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-6 col-md-6 mb-4">
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control" placeholder="E-mail*" required>
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-12 col-md-12 mb-4">
                                                    <div class="form-group">
                                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                                    </div>
                                                </div>
        
                                                <div class="col-md-12 col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <textarea name="message" class="form-control" placeholder="Text"></textarea>
                                                    </div>
                                                </div>
        
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="wptb-item--button"> 
                                                        <button class="btn-two white" type="submit">
                                                            <div class="btn-wrap">
                                                                <span class="text-first"> Send Mail </span> 
                                                                <span class="text-second"> <i class="bi bi-plus"></i> </span> 
                                                            </div> 
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                            {{-- <form class="wptb-form ps-md-5" action="https://wpthemebooster.com/demo/themeforest/html/ducatibox/contact.php" method="post">
                                <div class="wptb-form--inner">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 mb-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Full Name*" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12 mb-4">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="E-mail Address*" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <div class="form-group">
                                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" placeholder="Text"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12">
                                            <div class="wptb-item--button"> 
                                                <button type="submit" class="btn-three gray"> 
                                                    <span class="btn-wrap">
                                                        <span class="text-first">Send Mail</span>
                                                        <span class="text-second">Send Mail</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}

                        </div>
                    </div>
                </div>
            </section>

 <script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif
</script>           
        
@endsection