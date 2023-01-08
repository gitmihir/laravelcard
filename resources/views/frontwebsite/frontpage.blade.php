@include('frontwebsite.frontheader')
@php
    $viewClients = App\Models\Client::all();
    $viewReviews = App\Models\Review::all();
    $viewCmsDataOnFront = App\Models\CMS::all();
    $viewTeam = App\Models\OurTeam::all();
    $viewOwner = App\Models\Owner::all();
@endphp
@foreach ($viewCmsDataOnFront as $viewVideoFront)
    <div id="myCarousel" class="carousel slide slider-section" data-ride="carousel">
        <div class="carousel-inner slider-inner">

            <div class="carousel-item active">
                <div class="slider-img">
                    <video class="videoembed" autoplay muted loop>
                        <source src="{{ asset('videos/' . $viewVideoFront->sg_cms_home_video) }}" type="video/mp4" />
                    </video>
                </div>
                <div class="slider-contents">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="slider-content">
                                    <h1 class="wow animated slideInDown" data-wow-duration="8s" data-wow-delay="5s">
                                        {{ $viewVideoFront->sg_cms_tag_line }}
                                    </h1>

                                    <div class="button">
                                        <a href="JavaScript:void(0);" class="btn btn-button wow animated fadeInUp"
                                            data-wow-duration="7s" data-wow-delay="5s">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="about-section pt-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 d-flex align-items-center">
                    <div class="about-contants">
                        <div class="about-content">
                            <h2 class="pb-3">{{ $viewVideoFront->sg_cms_block_title }}</h2>
                            {!! $viewVideoFront->sg_cms_block_content !!}
                            <a href="{{ $viewVideoFront->sg_cms_block_link }}"
                                class="btn btn-button wow animated fadeInUp mt-3" data-wow-duration="7s"
                                data-wow-delay="5s">Know More</a>
                        </div>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 col-md-12 col-sm-12 col-12 pt-3">
                    <div class="about-img">
                        <img src="{{ asset('images/blockimage/' . $viewVideoFront->sg_cms_block_image) }}"
                            alt="{{ $viewVideoFront->sg_cms_block_title }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="service-section">
    <div class="hadding-section pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 offset-lg-2 offset-md-1 col-xl-8 col-lg-8 col-md-10">
                    <div class="hadidng-box text-center">
                        <h2> The Premium Credit Card </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                <div class="service-img">
                    @foreach ($viewCmsDataOnFront as $viewHeaderImage)
                        <img src="{{ asset('images/headerimage/' . $viewHeaderImage->sg_cms_header_image) }}"
                            alt="Header Image">
                    @endforeach
                </div>
                <div class="inline-btn text-center">
                    <a href="JavaScript:void(0);" class="btn btn-button wow animated fadeInUp"> Get yours </a>
                    <a href="JavaScript:void(0);" class="btn btn-button wow animated fadeInUp" data-toggle="modal"
                        data-target="#form"> Bulk Inquiry </a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content popup-contact-from">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel"> Contact Form </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/sendemail" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fullname"> Name :</label>
                            <input id="fullname" name="fullname" class="form-control form-mane fullname" required=""
                                type="text">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="conemail">E-mail :</label>
                            <input id="conemail" name="conemail" class="form-control form-email conemail"
                                required="" type="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="phonenumber">Phone Number: </label>
                            <input id="phonenumber" name="phonenumber" class="form-control form-mane phonenumber"
                                required="" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Write a Message :</label>
                    <textarea id="message" class="form-control form-comment message" cols="10" rows="8" name="comment"
                        required=""></textarea>
                </div>
                <div class="buttons pt-3">
                    <input type="hidden" class="ajaxurl" value="{{ url('/ajaxform') }}">
                    <button type="button" class="btn btn-button btn-button-2 blue-bg ajaxemail">Send</button>
                </div>
                <div class="successmsg pt-2"></div>
            </form>
        </div>
    </div>
</div>

<!-- END SERVICE -->

<!-- CLIENT SECTION -->
<div class="client-section pt-80 pb-80">
    <div class="container">
        <div class="client-items">
            @foreach ($viewClients as $clientData)
                <div class="item">
                    <a href="JavaScript:void(0);">
                        <img src="{{ asset('images/clientimages/' . $clientData->sg_client_logo) }}"
                            alt="{{ $clientData->sg_client_name }}">
                    </a>
                    <h5> {{ $clientData->sg_client_name }} </h5>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- END CLIENT SECTION -->

<!-- CLIENT SECTION -->
<div class="testimonial-section">
    <div class="hadding-section pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 offset-lg-2 offset-md-1 col-xl-8 col-lg-8 col-md-10">
                    <div class="hadidng-box text-center">
                        <h2> Thousands Have Already Chosen The Smarter </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="testimonial-items" id="testimonial">
            @foreach ($viewReviews as $ReviewData)
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="testi-img">
                            <img src="{{ asset('images/reviewimages/' . $ReviewData->sg_review_image) }}"
                                alt="{{ $ReviewData->sg_review_title }}">
                        </div>
                        <div class="testi-titls">
                            <h2>{{ $ReviewData->sg_review_title }}</h2>
                            <p>{{ $ReviewData->sg_review_text }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- END CLIENT SECTION -->
<!-- CLIENT SECTION -->
<div class="testimonial-section">
    <div class="hadding-section pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 offset-lg-2 offset-md-1 col-xl-8 col-lg-8 col-md-10">
                    <div class="hadidng-box text-center">
                        <h2> Owners </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($viewOwner as $ownerData)
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="single-testimonial single-testimonial-block">
                        <div class="testi-top">
                            <div class="testi-img">
                                <img src="{{ asset('/images/ownerimages/' . $ownerData->sg_owner_image) }}"
                                    alt="{{ $ownerData->sg_owner_title }}">
                            </div>
                            <div class="testi-titls">
                                <h2>{{ $ownerData->sg_owner_title }}</h2>
                                <p>{{ $ownerData->sg_owner_text }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
<div class="testimonial-section">
    <div class="hadding-section pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 offset-lg-2 offset-md-1 col-xl-8 col-lg-8 col-md-10">
                    <div class="hadidng-box text-center">
                        <h2> Our Team </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="testimonial-items mb-5" id="testimonial-2">
            @foreach ($viewTeam as $TeamData)
                <div class="single-testimonial">
                    <div class="testi-top">
                        <div class="testi-img">
                            <img src="{{ asset('images/memberimages/' . $TeamData->sg_our_team_image) }}"
                                alt="{{ $TeamData->sg_review_title }}">
                        </div>
                        <div class="testi-titls">
                            <h2>{{ $TeamData->sg_our_team_title }}</h2>
                            <p>{{ $TeamData->sg_our_team_text }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- END CLIENT SECTION -->
@include('frontwebsite.frontfooter')
