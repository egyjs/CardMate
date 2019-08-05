@extends('fontend.master')

@section('content')
    <!-- testimonial page content area start-->
    <div class="testimonial-page-conent">
        <div class="container">
            <div class="row">


                   <div class="col-lg-4 col-md-6">
                       <a href="{{url('home/my-card')}}">
                       <div class="single-testimonial-item text-center" style="border: 1px solid #ba5adf;"><!-- single testimonial item -->

                           <div class="content">
                               <h4 class="name">{{ display('Total Bought Card') }}</h4>
                               <span class="post" style="font-size: 24px;">{{ \App\card::where('user_id', \Illuminate\Support\Facades\Auth::id())->count() }}</span>
                           </div>

                       </div><!-- //.single testimonial item -->
                       </a>
                   </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{url('home/used-card')}}">
                        <div class="single-testimonial-item text-center" style="border: 1px solid #ba5adf;"><!-- single testimonial item -->

                            <div class="content">
                                <h4 class="name">{{ display('Total Used Card')  }}</h4>
                                <span class="post" style="font-size: 24px;">{{ \App\card::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('status',0)->count() }}</span>
                            </div>

                        </div><!-- //.single testimonial item -->
                    </a>
                   </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{url('home/my-card')}}">
                        <div class="single-testimonial-item text-center" style="border: 1px solid #ba5adf;"><!-- single testimonial item -->

                            <div class="content">
                                <h4 class="name">{{ display('Total Unused Card')  }}</h4>
                                <span class="post" style="font-size: 24px;">{{ \App\card::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('status',1)->count() }}</span>
                            </div>

                        </div><!-- //.single testimonial item -->
                    </a>
                   </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{url('home/transaction')}}">
                        <div class="single-testimonial-item text-center" style="border: 1px solid #ba5adf;"><!-- single testimonial item -->

                            <div class="content">
                                <h4 class="name">{{ display('Transaction Log')  }}</h4>
                                <span class="post">{{ display('Current Balance')  }}: {{\Illuminate\Support\Facades\Auth::user()->balance}} {{$gnl->cur}}</span>
                            </div>

                        </div><!-- //.single testimonial item -->
                    </a>
                   </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{url('home/deposit')}}">
                        <div class="single-testimonial-item text-center" style="border: 1px solid #ba5adf;"><!-- single testimonial item -->

                            <div class="content">
                                <h4 class="name">{{ display('Deposit Now')  }}</h4>
                                <span class="post">{{ display('Total Payment Method')  }}: {{\App\Gateway::where('status', 1)->count()}}</span>
                            </div>

                        </div><!-- //.single testimonial item -->
                    </a>
                   </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{url('home/select-category')}}">
                        <div class="single-testimonial-item text-center" style="border: 1px solid #ba5adf;"><!-- single testimonial item -->

                            <div class="content">
                                <h4 class="name">{{ display('Buy Card')  }}</h4>
                                <span class="post">{{ display('Total Card Category')  }}: {{\App\cardcategory::where('status', 1)->count()}}</span>
                            </div>

                        </div><!-- //.single testimonial item -->
                    </a>
                   </div>



            </div>
        </div>
    </div>
    <!-- testimonial page content area end-->
@endsection



