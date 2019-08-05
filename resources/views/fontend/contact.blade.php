@extends('fontend.master')
@section('css')
<style>
    .map-area {
        min-height: 0px;
    }
    iframe {
        width: 100%;
    }
</style>
@endsection
@section('content')
    <!-- contact page content area start -->
    <section class="contact-page-area">
        <div class="container contact-page-container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title">
                        <h2 class="title">{{display('Contact With Us')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-page-inner"><!-- contact page inner -->
                        <form action="{{route('sendmailfrmuser')}}" method="post" id="get_in_touch" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-element margin-bottom-30">
                                        <label for="name" class="label">{{ display('Name') }} *</label>
                                        <input type="text" id="name" class="input-field" required name="name"
                                               placeholder="{{ display('Enter your name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-element margin-bottom-30">
                                        <label for="email" class="label">{{ display('Email') }} *</label>
                                        <input type="email" id="email" class="input-field" name="email" required
                                               placeholder="{{ display('Enter your email') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">

                                    <div class="form-element margin-bottom-30">
                                        <label for="subject" class="label">{{ display('Subject') }} *</label>
                                        <input type="text" id="subject" name="subject"  required  class="input-field"
                                               placeholder="{{ display('Enter your subject') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-element textarea margin-bottom-30">
                                        <label for="message" class="label">{{ display('Message') }} *</label>
                                        <textarea id="message" placeholder="{{ display('Enter message') }}" name="message"
                                                  class="input-field textarea" cols="30" rows="10"></textarea>
                                    </div>
                                    <input type="submit" class="submit-btn" value="{{ display('Send Message') }}">
                                </div>
                            </div>
                        </form>
                    </div><!-- //.contact page inner -->
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- contact page content area end -->

@endsection
