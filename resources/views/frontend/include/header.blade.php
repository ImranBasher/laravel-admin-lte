        <!-- Color Mode Switcher -->
		<div id="mode_switcher">
			<span><i class="bi bi-moon-fill"></i></span>
		</div>

        <!-- Main Header -->

    <header class="header">
        {{-- ================= TOP BAR ================= --}}
        <div class="header-top">
            <div class="container-fluid pe-4">
                <div class="header-top--inner d-none d-xl-flex justify-content-between align-items-center flex-wrap">

                    {{-- LEFT INFO --}}
                    <div class="left-box d-flex align-items-center">
                        <ul class="info-list">

                            <li>
                                <a href="mailto:{{ $general_setting?->email  }}">
                                    <span class="icon bi bi-envelope-fill"></span>
                                    {{ $general_setting?->email  }}
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="icon bi bi-clock"></span>
                                    {{ $general_setting?->working_time ?? '8.00am - 10.00pm' }}
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="icon bi bi-geo-alt-fill"></span>
                                    {{ $general_setting?->address ?? ' ' }}
                                </a>
                            </li>

                        </ul>
                    </div>

                    {{-- RIGHT SOCIAL --}}
                    <div class="right-box d-flex align-items-center">
                        <div class="social-box">
                            <ul>

                                @if(!empty($general_setting?->facebook_link))
                                    <li><a href="{{ $general_setting->facebook_link }}" class="bi bi-facebook"></a></li>
                                @endif

                                @if(!empty($general_setting?->instagram_link))
                                    <li><a href="{{ $general_setting->instagram_link }}" class="bi bi-instagram"></a></li>
                                @endif

                                @if(!empty($general_setting?->twitter_link))
                                    <li><a href="{{ $general_setting->twitter_link }}" class="bi bi-twitter-x"></a></li>
                                @endif

                                @if(!empty($general_setting?->linkedin_link))
                                    <li><a href="{{ $general_setting->linkedin_link }}" class="bi bi-linkedin"></a></li>
                                @endif

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- ================= LOWER BAR ================= --}}
        <div class="header-inner">
            <div class="container-fluid pe-0">
                <div class="d-flex align-items-center justify-content-between">

                    {{-- LEFT LOGO --}}
                    <div class="header_left_part d-flex align-items-center">

                        @php
                            $nav_logo = $general_setting?->multipleImages
                                ?->where('purpose', 'general_setting')
                                ->where('type', 'logo')
                                ->first();
                        @endphp

                        <div class="logo">
                            <a href="{{ url('/') }}" class="light_logo">
                                <img src="{{ urlVersion($nav_logo?->image, true) }}"
                                    loading="lazy"
                                    alt="Company Logo">
                            </a>
                        </div>

                    </div>

                    {{-- RIGHT MENU --}}
                    <div class="header_right_part d-flex align-items-center">

                        {{-- MAIN NAV --}}
                        <div class="mainnav d-none d-xl-block">
                            <ul class="main-menu">

                                <li class="menu-item">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>

                                <li class="menu-item menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item">
                                            <a href="{{ route('about.us') }}">About Us</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('our.team') }}">Our Team</a>
                                        </li>
                                    </ul>
                                </li>

                                {{-- SERVICES --}}
                                <li class="menu-item menu-item-has-children">
                                    <a href="#">Services</a>
                                    <ul class="sub-menu">

                                        @forelse($serviceCategories ?? [] as $category)

                                            @if($category->subServiceCategories->count())
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">{{ $category->service_name }}</a>

                                                    <ul class="sub-menu">
                                                        @foreach($category->subServiceCategories ?? [] as $sub)
                                                            <li class="menu-item">
                                                                <a href="{{ route('services.subcategory', $sub->id) }}">
                                                                    {{ $sub->sub_service_name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li class="menu-item">
                                                    <a href="#">{{ $category->service_name }}</a>
                                                </li>
                                            @endif

                                        @empty
                                            <li class="menu-item">
                                                <a href="#">No Services Available</a>
                                            </li>
                                        @endforelse

                                    </ul>
                                </li>

                                {{-- BLOG --}}
                                <li class="menu-item">
                                    <a href="{{ route('blog.list') }}">Blog</a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('contact.us') }}">Contact-Us</a>
                                </li>

                            </ul>
                        </div>

                        {{-- CALL INFO --}}
                        <div class="wptb-icon-box1 live-chat d-none d-md-block">
                            <div class="wptb-item--inner flex-start">
                                <div class="wptb-item--icon">
                                    {{-- @include('frontend.partials.phone-svg') --}}
                                </div>
                                <div class="wptb-item--holder">
                                    <p class="wptb-item--description">Need Help</p>
                                    <h5 class="wptb-item--title">
                                        <a href="tel:{{ $general_setting?->phone }}">
                                            {{ $general_setting?->phone  }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        {{-- ASIDE --}}
                        <div class="aside_open d-none d-xl-block">
                            <div class="aside-open--inner">
                                <span></span><span></span><span></span>
                            </div>
                        </div>

                        {{-- MOBILE --}}
                        <button type="button" class="mr_menu_toggle d-xl-none">
                            <i class="bi bi-list"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>

    </header>





        <!-- End Main Header -->

        <!-- Mobile Responsive Menu -->
		<div class="mr_menu">
			<button type="button" class="mr_menu_close"><i class="bi bi-x-lg"></i></button>
            <div class="logo"></div> <!-- Keep this div empty. Logo will come here by JavaScript -->
			<div class="mr_navmenu"></div> <!-- Keep this div empty. Menu will come here by JavaScript -->
		</div>

        <div class="aside_info_wrapper">
			<button class="aside_close"><i class="bi bi-x-lg"></i></button>
            <div class="aside_logo">
                {{-- <a href="index.html"><img src="assets/img/logo.svg" alt="logo"></a> --}}
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('storage/' . $nav_logo->image) }}" alt="logo"  class="nav-logo" >
                                </a>
            </div>
			<div class="aside_info_inner">

                <p>When you bring your vehicle to Dubai Online Car Mechanic Center, you can rest easy knowing that your vehicle is in professional hands.</p>

                <div class="aside_info_inner_box">
                    <div class="wptb-office">
                        <div class="wptb-item--inner">
                            <div class="wptb-item--subtitle">
                                Call Us Anytime
                            </div>
                            <h5 class="wptb-item--title"><a href="tel:{{$general_setting?->phone}}">{{$general_setting?->phone}}</a></h5>
                        </div>
                    </div>

                    <div class="wptb-office">
                        <div class="wptb-item--inner">
                            <div class="wptb-item--subtitle">
                                SEND US MAIL
                            </div>
                            <h5 class="wptb-item--title"><a href="mailto:{{$general_setting?->email}}">{{$general_setting?->email}}</a></h5>
                        </div>
                    </div>

                    <div class="wptb-office">
                        <div class="wptb-item--inner">
                            <div class="wptb-item--subtitle">
                                VISIT OUR WORKSHOP
                            </div>2
                            <h5 class="wptb-item--title"><a href="#">{{$general_setting?->address}}</a></h5>
                        </div>
                    </div>
                </div>
                <div class="social_sites">
                    <ul class="d-flex align-items-center">
                        <li><a href="{{$general_setting?->facebook_link}}" class="bi bi-facebook"></a></li>
                        <li><a href="{{$general_setting?->instagram_link}}" class="bi bi-instagram"></a></li>
                        <li><a href="{{$general_setting?->twitter_link}}" class="bi bi-twitter-x"></a></li>
                        <li><a href="{{$general_setting?->linkedin_link}}" class="bi bi-linkedin"></a></li>
                    </ul>

                </div>
			</div>
		</div>
