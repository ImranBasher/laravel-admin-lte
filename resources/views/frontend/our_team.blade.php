@extends('frontend.layouts.master')

@section('content')       

                            @php
                                $fullCompanyName = trim(
                                    ($general_setting->company_name_start ?? '') . ' ' .
                                    ($general_setting->company_name_middle ?? '') . ' ' .
                                    ($general_setting->company_name_end ?? '')
                                );
                            @endphp


        <!-- Main Wrapper-->
        <main class="wrapper">
            <!-- Page Header -->
            <div class="wptb-page-heading" style="background-image: url('{{asset('assets/img/background/page-header-bg.jpg')}}'">
                <div class="container">
                    <div class="wptb-item--inner">
                        <h2 class="wptb-item--title ">Our Team</h2>
                        <div class="wptb-breadcrumb-wrap">
                            <ul class="wptb-breadcrumb">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><span>Our Team</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Team -->
            <section class="wptb-team-one pd-bottom-300">
                <div class="container">

                    <div class="wptb-team--inner">
                        <div class="row clearfix">
                            
                           

                            @foreach ($workers as $worker )
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="wptb-team-grid2">
                                        <div class="wptb-item--inner">
                                            <div class="wptb-item--image">
                                @php
                                    $workerImage = $worker->multipleImages->where('purpose', 'worker_profile')->first();
                                @endphp

                                        <img src="{{ $workerImage ? asset('storage/' . $workerImage->image) : asset('assets/img/team/1.jpg') }}" alt="{{ $worker->name }}"
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
    
                           
                            {{-- <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="wptb-team-grid2">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="assets/img/team/2.jpg" alt="img">
                                            <div class="wptb-item--social">
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-instagram"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                            </div>
                                        </div>
    
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <p class="wptb-item--position">Chief Mechanic</p>
                                                <h5 class="wptb-item--title"><a href="team-details.html">Sarah Smith</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                           
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="wptb-team-grid2">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="assets/img/team/3.jpg" alt="img">
                                            <div class="wptb-item--social">
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-instagram"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                            </div>
                                        </div>
    
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <p class="wptb-item--position">Consultant</p>
                                                <h5 class="wptb-item--title"><a href="team-details.html">Helen Mirren</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="wptb-team-grid2">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="assets/img/team/4.jpg" alt="img">
                                            <div class="wptb-item--social">
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-instagram"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                            </div>
                                        </div>
    
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <p class="wptb-item--position">Consultant</p>
                                                <h5 class="wptb-item--title"><a href="team-details.html">Hazel Grace</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                           
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="wptb-team-grid2">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="assets/img/team/5.jpg" alt="img">
                                            <div class="wptb-item--social">
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-instagram"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                            </div>
                                        </div>
    
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <p class="wptb-item--position">Assistant</p>
                                                <h5 class="wptb-item--title"><a href="team-details.html">Jackson Miller</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                           
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="wptb-team-grid2">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="assets/img/team/6.jpg" alt="img">
                                            <div class="wptb-item--social">
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-instagram"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                            </div>
                                        </div>
    
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <p class="wptb-item--position">Consultant</p>
                                                <h5 class="wptb-item--title"><a href="team-details.html">Garrison Hall</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="wptb-team-grid2">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="assets/img/team/7.jpg" alt="img">
                                            <div class="wptb-item--social">
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-instagram"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                            </div>
                                        </div>
    
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <p class="wptb-item--position">Consultant</p>
                                                <h5 class="wptb-item--title"><a href="team-details.html">Oakland Miller</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                           
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="wptb-team-grid2">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="assets/img/team/8.jpg" alt="img">
                                            <div class="wptb-item--social">
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-instagram"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                            </div>
                                        </div>
    
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <p class="wptb-item--position">Consultant</p>
                                                <h5 class="wptb-item--title"><a href="team-details.html">John Johnson</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="wptb-team-grid2">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <img src="assets/img/team/9.jpg" alt="img">
                                            <div class="wptb-item--social">
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-instagram"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                            </div>
                                        </div>
    
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <p class="wptb-item--position">Consultant</p>
                                                <h5 class="wptb-item--title"><a href="team-details.html">Sarah Pellin</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                            <div class="wptb-pagination-wrap text-center">
                                {{ $workers->links('pagination::bootstrap-4') }}
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
                </div>
            </section>

            

        </main>




@endsection