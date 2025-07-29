@extends('frontend.layouts.master')

@section('content')       

                            @php
                                $fullCompanyName = trim(
                                    ($general_setting->company_name_start ?? '') . ' ' .
                                    ($general_setting->company_name_middle ?? '') . ' ' .
                                    ($general_setting->company_name_end ?? '')
                                );
                            @endphp



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

        <!-- Main Wrapper-->
        <main class="wrapper">
            <!-- Page Header -->
            <div class="wptb-page-heading" style="background-image: url('assets/img/background/page-header-bg.jpg');">
                <div class="container">
                    <div class="wptb-item--inner">
                        <h2 class="wptb-item--title ">Contact Us</h2>
                        <div class="wptb-breadcrumb-wrap">
                            <ul class="wptb-breadcrumb">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><span>Contact Us</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Us -->
            <section class="pd-bottom-300">
				<div class="container">
                    <div class="wptb-office-address mr-bottom-90">
                        <div class="row">
                            <div class="col-md-4 pe-md-0">
                                <div class="widget">
                                    <h2 class="widget-title">Phone No</h2>
                                    
                                    <div class="wptb-office">
                                        <div class="wptb-item--inner">
                                            <div class="wptb-item--subtitle">
                                                Call Us Anytime
                                            </div>
                                            <h5 class="wptb-item--title"><a href="tel:{{$general_setting->phone}}">{{$general_setting->phone}}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-4 p-md-0">
                                <div class="widget">
                                    <h2 class="widget-title">Email</h2>
    
                                    <div class="wptb-office">
                                        <div class="wptb-item--inner">
                                            <div class="wptb-item--subtitle">
                                                SEND US MAIL
                                            </div>
                                            <h5 class="wptb-item--title"><a href="mailto:{{$general_setting->email}}">{{$general_setting->email}}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-4 ps-md-0">
                                <div class="widget">
                                    <h2 class="widget-title">Address</h2>
    
                                    <div class="wptb-office">
                                        <div class="wptb-item--inner">
                                            <div class="wptb-item--subtitle">
                                                VISIT OUR WORKSHOP
                                            </div>
                                            <h5 class="wptb-item--title"><a href="#">{{$general_setting->address}}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gmapbox wow fadeInUp">
                        <div id="googleMap" class="map"></div>

                        <div class="wptb-office-time">
                            <div class="wptb-item--inner">
                                <div class="wptb-item">
                                    <span class="wptb-item--day">Monday</span> <span class="wptb-item--time">{{$general_setting->working_time}}</span>
                                </div>
                                <div class="wptb-item">
                                    <span class="wptb-item--day">Tuesday</span> <span class="wptb-item--time">{{$general_setting->working_time}}</span>
                                </div>
                                <div class="wptb-item">
                                    <span class="wptb-item--day">Wednesday</span> <span class="wptb-item--time">{{$general_setting->working_time}}</span>
                                </div>
                                <div class="wptb-item">
                                    <span class="wptb-item--day">Thursday</span> <span class="wptb-item--time">{{$general_setting->working_time}}</span>
                                </div>
                                <div class="wptb-item">
                                    <span class="wptb-item--day">Friday</span> <span class="wptb-item--time">{{$general_setting->working_time}}</span>
                                </div>
                                <div class="wptb-item">
                                    <span class="wptb-item--day">Saturday</span> <span class="wptb-item--time">{{$general_setting->working_time}}</span>
                                </div>
                                <div class="wptb-item holiday">
                                    <span class="wptb-item--day">Sunday</span> <span class="wptb-item--time">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="wptb-contact-form-two mr-top-100">
                        <div class="wptb-form--wrapper">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="wptb-heading">
                                        <div class="wptb-item--inner">
                                            <h6 class="wptb-item--subtitle">
                                                SEND US MAIL
                                            </h6>
                                            <h1 class="wptb-item--title"> Feel Free To Ask Anything
                                                For Car Servicing</h1>
                                            <div class="wptb-item--divider"></div>
                                            <div class="wptb-item--description">
                                                We're here to help with all your car maintenance, repairs, or service inquiries. Drop us a message, and our team will get back to you as soon as possible.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-6">
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
                                </div>
                            </div>
                        </div>
                    </div>					
				</div>
			</section>

            

        </main>
<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif
</script>

@endsection