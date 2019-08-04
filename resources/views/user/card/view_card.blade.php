@extends('fontend.master')
@section('css')

@endsection
@section('content')
    <!-- about page content area start -->
    <section class="about-page-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-page-content-inner"><!-- about page content inner -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-rm-12">
                            <div class="single-practise-box margin-bottom-40">
                                <div class="content text-center" style="padding: 21px 30px 17px 30px;">

                                    <form action="{{route('user.card.store')}}" method="post">
                                        @csrf

                                        <input type="hidden" name="qty" value="{{$qty}}">
                                        <input type="hidden" name="sub_cat" value="{{$sub->id}}">

                                        @php $balance = Auth::user()->balance @endphp
                                        <h4 class="title">{{$sub->sub_cat->cat_name}}</h4>
                                        <hr>
                                        <h5 class="title">{{$sub->name}}</h5>
                                        <hr>
                                        <strong class="title">Price: {{$sub->price}} {{$gnl->cur}} / card</strong>
                                        <hr>
                                        <strong class="title">Your Quantity: {{$qty}}</strong>
                                        <hr>
                                        <strong class="title">Total Cost: {{$total = $qty*$sub->price}} {{$gnl->cur}}</strong>
                                        <hr>
                                        <strong class="title">Current Balance: {{$balance}} {{$gnl->cur}}</strong>
                                        <hr>
                                        <p></p>
                                        @if($balance >=  $total)
                                            <input type="submit" class="submit-btn" value="Purchase">
                                        @else
                                            <a href="{{url('home/deposit')}}" class="boxed-btn" >Deposit Now</a>
                                        @endif
                                    </form>

                                </div>
                            </div>
                            <!-- //. single practise box -->
                        </div>

                    </div><!-- //.about page content inner -->
                </div>
            </div>
        </div>
    </section>
    <!-- about page content area end -->
@endsection