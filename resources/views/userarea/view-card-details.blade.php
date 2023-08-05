@foreach ($cardselectquery as $carddata)
    @include('frontwebsite.front-head')

    <body class="darg-bg">
        <div class="main-card-col">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-2 offset-lg-2 offset-md-1 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="card-main-img">
                            @if ($carddata->sg_cd_cover_image)
                                <img src="{{ asset('images/cardimages/' . $carddata->sg_cd_cover_image) }}">
                            @else
                                <img src="{{ asset('images/service.jpg') }}">
                            @endif
                        </div>
                        <div class="card-prfile">
                            @if ($carddata->sg_cd_profile_image)
                                <div class="card-prfile-images"><img
                                        src="{{ asset('images/cardimages/' . $carddata->sg_cd_profile_image) }}"></div>
                            @else
                                <div class="card-prfile-images"><img src="{{ asset('images/placeholder.png') }}">
                                </div>
                            @endif
                            @if ($carddata->sg_cd_name)
                                <h3>{{ $carddata->sg_cd_name }}</h3>
                            @else
                                <h3>John Doe</h3>
                            @endif
                            @if ($carddata->sg_cd_designation)
                                <h4>{{ $carddata->sg_cd_designation }}</h4>
                            @else
                                <h4>Designation</h4>
                            @endif
                            @if ($carddata->sg_cd_company_name)
                                <h5>{{ $carddata->sg_cd_company_name }}</h5>
                            @else
                                <h5>Company Name</h5>
                            @endif
                        </div>
                        <div class="card-content text-center">
                            <h5> Bio </h5>
                            @if ($carddata->sg_cd_about_us)
                                <p>{{ $carddata->sg_cd_about_us }}</p>
                            @else
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            @endif
                        </div>
                        <div class="social-menu">
                            <h4> Reach Us: </h4>
                            <div class='buttons-container'>
                                @if ($carddata->sg_cd_phone_number)
                                    <a href="tel:{{ $carddata->sg_cd_phone_number }}">
                                        <div class="socail-box">
                                            <div class='button phone'>
                                                <i class="fa fa-phone fa-2x"></i>
                                            </div>
                                            <h6>Phone</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($carddata->sg_cd_Business_whatsapp_number)
                                    <a
                                        href="//api.whatsapp.com/send?phone=91{{ $carddata->sg_cd_Business_whatsapp_number }}&text=Hi">
                                        <div class="socail-box">
                                            <div class='button whatsapp'>
                                                <i class="fa fa-whatsapp fa-2x"></i>
                                            </div>
                                            <h6>Whatsapp Business</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($carddata->sg_cd_whatsapp_number)
                                    <a
                                        href="//api.whatsapp.com/send?phone=91{{ $carddata->sg_cd_whatsapp_number }}&text=Hi">
                                        <div class="socail-box">
                                            <div class='button whatsapp'>
                                                <i class="fa fa-whatsapp fa-2x"></i>
                                            </div>
                                            <h6>Whatsapp</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($carddata->sg_cd_email)
                                    <a href="mailto:{{ $carddata->sg_cd_email }}">
                                        <div class="socail-box">
                                            <div class='button envelope'>
                                                <i class="fa fa-envelope-o fa-2x"></i>
                                            </div>
                                            <h6>Email</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($carddata->sg_cd_website)
                                    @php
                                        $url = $carddata->sg_cd_website;
                                        if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                            $url = 'http://' . $url;
                                        }
                                    @endphp
                                    <a target="_blank" href="{{ $url }}">
                                        <div class="socail-box">
                                            <div class='button globe'>
                                                <i class="fa fa-globe fa-2x"></i>
                                            </div>
                                            <h6>Website</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if (
                            $carddata->sg_cd_Facebook ||
                                $carddata->sg_cd_Twitter ||
                                $carddata->sg_cd_Pinterest ||
                                $carddata->sg_cd_Instagram ||
                                $carddata->sg_cd_Youtube ||
                                $carddata->sg_cd_Linkedin ||
                                $carddata->sg_cd_Snapchat ||
                                $carddata->sg_cd_google_business)
                            <div class="social-menu">
                                <h4> Social Profiles: </h4>
                                <div class='buttons-container'>
                                    @if ($carddata->sg_cd_Facebook)
                                        @php
                                            $url = $carddata->sg_cd_Facebook;
                                            if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                $url = 'http://' . $url;
                                            }
                                        @endphp
                                        <a target="_blank" href="{{ $url }}">
                                            <div class="socail-box">
                                                <div class='button facebook'>
                                                    <i class="fa fa-facebook fa-2x"></i>
                                                </div>
                                                <h6>Facebook</h6>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($carddata->sg_cd_Twitter)
                                        @php
                                            $url = $carddata->sg_cd_Twitter;
                                            if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                $url = 'http://' . $url;
                                            }
                                        @endphp
                                        <a target="_blank" href="{{ $url }}">
                                            <div class="socail-box">
                                                <div class='button twitter'>
                                                    <i class="fa fa-twitter fa-2x"></i>
                                                </div>
                                                <h6>Twitter</h6>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($carddata->sg_cd_Pinterest)
                                        @php
                                            $url = $carddata->sg_cd_Pinterest;
                                            if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                $url = 'http://' . $url;
                                            }
                                        @endphp
                                        <a target="_blank" href="{{ $url }}">
                                            <div class="socail-box">
                                                <div class='button pinterest'>
                                                    <i class="fa fa-pinterest fa-2x"></i>
                                                </div>
                                                <h6>Pinterest</h6>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($carddata->sg_cd_Instagram)
                                        @php
                                            $url = $carddata->sg_cd_Instagram;
                                            if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                $url = 'http://' . $url;
                                            }
                                        @endphp
                                        <a target="_blank" href="{{ $url }}">
                                            <div class="socail-box">
                                                <div class='button instagram'>
                                                    <i class="fa fa-instagram fa-2x"></i>
                                                </div>
                                                <h6>Instagram</h6>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($carddata->sg_cd_Youtube)
                                        @php
                                            $url = $carddata->sg_cd_Youtube;
                                            if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                $url = 'http://' . $url;
                                            }
                                        @endphp
                                        <a target="_blank" href="{{ $url }}">
                                            <div class="socail-box">
                                                <div class='button youtube'>
                                                    <i class="fa fa-youtube fa-2x"></i>
                                                </div>
                                                <h6>Youtube</h6>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($carddata->sg_cd_Linkedin)
                                        @php
                                            $url = $carddata->sg_cd_Linkedin;
                                            if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                $url = 'http://' . $url;
                                            }
                                        @endphp
                                        <a target="_blank" href="{{ $url }}">
                                            <div class="socail-box">
                                                <div class='button linkedin'>
                                                    <i class="fa fa-linkedin fa-2x"></i>
                                                </div>
                                                <h6>Linkedin</h6>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($carddata->sg_cd_Snapchat)
                                        @php
                                            $url = $carddata->sg_cd_Snapchat;
                                            if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                $url = 'http://' . $url;
                                            }
                                        @endphp
                                        <a target="_blank" href="{{ $url }}">
                                            <div class="socail-box">
                                                <div class='button linkedin'>
                                                    <i class="fa fa-snapchat-ghost fa-2x"></i>
                                                </div>
                                                <h6>SnapChat</h6>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($carddata->sg_cd_google_business)
                                        @php
                                            $url = $carddata->sg_cd_google_business;
                                            if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                $url = 'http://' . $url;
                                            }
                                        @endphp
                                        <a target="_blank" href="{{ $url }}">
                                            <div class="socail-box">
                                                <div class='button linkedin'>
                                                    <i class="fa fa-google fa-2x"></i>
                                                </div>
                                                <h6>Google Business</h6>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($carddata->sg_cd_Office || $carddata->sg_cd_Branch || $carddata->sg_cd_Branch2)
                            <div class="social-menu">
                                <h4> Locations: </h4>
                                <div class='buttons-container'>
                                    @if ($carddata->sg_cd_Office)
                                        <div class="socail-box">
                                            <div class="button facebook">
                                                <a data-toggle="modal" class="modalapendclassaddress"
                                                    data-address="<?php echo $carddata->sg_cd_Office; ?>"
                                                    data-target="#exampleModalCenter">
                                                    <i class="fa fa-map-o fa-2x"></i>
                                                </a>
                                            </div>
                                            <h6>Office</h6>
                                        </div>
                                    @endif
                                    @if ($carddata->sg_cd_Branch)
                                        <div class="socail-box">
                                            <div class="button facebook">
                                                <a data-toggle="modal" class="modalapendclassaddress"
                                                    data-address={{ $carddata->sg_cd_Branch }}
                                                    data-target="#exampleModalCenter">
                                                    <i class="fa fa-map-signs fa-2x"></i>
                                                </a>
                                            </div>
                                            <h6>Branch</h6>
                                        </div>
                                    @endif
                                    @if ($carddata->sg_cd_Branch2)
                                        <div class="socail-box">
                                            <div class="button facebook">
                                                <a data-toggle="modal" class="modalapendclassaddress"
                                                    data-address={{ $carddata->sg_cd_Branch2 }}
                                                    data-target="#exampleModalCenter">
                                                    <i class="fa fa-map-signs fa-2x"></i>
                                                </a>
                                            </div>
                                            <h6>Branch</h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="service-card">
                            @if ($carddata->sg_cd_Service_Title_1)
                                <h3> Services </h3>
                            @endif
                            <div id="service-card" class="owl-carousel">
                                @if ($carddata->sg_cd_Service_Title_1 && $carddata->sg_Service_Image_1 && $carddata->sg_cd_Service_About_1)
                                    <div class="item">
                                        <div class="card">
                                            <img class="card-img-top"
                                                src="{{ asset('images/cardimages/' . $carddata->sg_Service_Image_1) }}">
                                            <div class="card-block">
                                                <h4 class="card-title">{{ $carddata->sg_cd_Service_Title_1 }}</h4>
                                                <p class="card-text">{{ $carddata->sg_cd_Service_About_1 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($carddata->sg_cd_Service_Title_2 && $carddata->sg_Service_Image_2 && $carddata->sg_cd_Service_About_2)
                                    <div class="item">
                                        <div class="card">
                                            <img class="card-img-top"
                                                src="{{ asset('images/cardimages/' . $carddata->sg_Service_Image_2) }}">
                                            <div class="card-block">
                                                <h4 class="card-title">{{ $carddata->sg_cd_Service_Title_2 }}</h4>
                                                <p class="card-text">{{ $carddata->sg_cd_Service_About_2 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($carddata->sg_cd_Service_Title_3 && $carddata->sg_Service_Image_3 && $carddata->sg_cd_Service_About_3)
                                    <div class="item">
                                        <div class="card">
                                            <img class="card-img-top"
                                                src="{{ asset('images/cardimages/' . $carddata->sg_Service_Image_3) }}">
                                            <div class="card-block">
                                                <h4 class="card-title">{{ $carddata->sg_cd_Service_Title_3 }}</h4>
                                                <p class="card-text">{{ $carddata->sg_cd_Service_About_3 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($carddata->sg_cd_Service_Title_4 && $carddata->sg_Service_Image_4 && $carddata->sg_cd_Service_About_4)
                                    <div class="item">
                                        <div class="card">
                                            <img class="card-img-top"
                                                src="{{ asset('images/cardimages/' . $carddata->sg_Service_Image_4) }}">
                                            <div class="card-block">
                                                <h4 class="card-title">{{ $carddata->sg_cd_Service_Title_4 }}</h4>
                                                <p class="card-text">{{ $carddata->sg_cd_Service_About_4 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($carddata->sg_cd_Service_Title_5 && $carddata->sg_Service_Image_5 && $carddata->sg_cd_Service_About_5)
                                    <div class="item">
                                        <div class="card">
                                            <img class="card-img-top"
                                                src="{{ asset('images/cardimages/' . $carddata->sg_Service_Image_5) }}">
                                            <div class="card-block">
                                                <h4 class="card-title">{{ $carddata->sg_cd_Service_Title_5 }}</h4>
                                                <p class="card-text">{{ $carddata->sg_cd_Service_About_5 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($carddata->sg_cd_Service_Title_6 && $carddata->sg_Service_Image_6 && $carddata->sg_cd_Service_About_6)
                                    <div class="item">
                                        <div class="card">
                                            <img class="card-img-top"
                                                src="{{ asset('images/cardimages/' . $carddata->sg_Service_Image_6) }}">
                                            <div class="card-block">
                                                <h4 class="card-title">{{ $carddata->sg_cd_Service_Title_6 }}</h4>
                                                <p class="card-text">{{ $carddata->sg_cd_Service_About_6 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($carddata->sg_cd_Service_Title_7 && $carddata->sg_Service_Image_7 && $carddata->sg_cd_Service_About_7)
                                    <div class="item">
                                        <div class="card">
                                            <img class="card-img-top"
                                                src="{{ asset('images/cardimages/' . $carddata->sg_Service_Image_7) }}">
                                            <div class="card-block">
                                                <h4 class="card-title">{{ $carddata->sg_cd_Service_Title_7 }}</h4>
                                                <p class="card-text">{{ $carddata->sg_cd_Service_About_7 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($carddata->sg_cd_Service_Title_8 && $carddata->sg_Service_Image_8 && $carddata->sg_cd_Service_About_8)
                                    <div class="item">
                                        <div class="card">
                                            <img class="card-img-top"
                                                src="{{ asset('images/cardimages/' . $carddata->sg_Service_Image_8) }}">
                                            <div class="card-block">
                                                <h4 class="card-title">{{ $carddata->sg_cd_Service_Title_8 }}</h4>
                                                <p class="card-text">{{ $carddata->sg_cd_Service_About_8 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if (
                            $carddata->sg_cd_Gallery_1 ||
                                $carddata->sg_cd_Gallery_2 ||
                                $carddata->sg_cd_Gallery_3 ||
                                $carddata->sg_cd_Gallery_4 ||
                                $carddata->sg_cd_Gallery_5 ||
                                $carddata->sg_cd_Gallery_6 ||
                                $carddata->sg_cd_Gallery_7 ||
                                $carddata->sg_cd_Gallery_8)
                            <div class="service-card">
                                <h3> Gallery </h3>
                                <div id="service-card-1" class="owl-carousel">
                                    @if ($carddata->sg_cd_Gallery_1)
                                        <div class="item">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    src="{{ asset('images/galleryimages/' . $carddata->sg_cd_Gallery_1) }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($carddata->sg_cd_Gallery_2)
                                        <div class="item">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    src="{{ asset('images/galleryimages/' . $carddata->sg_cd_Gallery_2) }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($carddata->sg_cd_Gallery_3)
                                        <div class="item">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    src="{{ asset('images/galleryimages/' . $carddata->sg_cd_Gallery_3) }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($carddata->sg_cd_Gallery_4)
                                        <div class="item">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    src="{{ asset('images/galleryimages/' . $carddata->sg_cd_Gallery_4) }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($carddata->sg_cd_Gallery_5)
                                        <div class="item">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    src="{{ asset('images/galleryimages/' . $carddata->sg_cd_Gallery_5) }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($carddata->sg_cd_Gallery_6)
                                        <div class="item">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    src="{{ asset('images/galleryimages/' . $carddata->sg_cd_Gallery_6) }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($carddata->sg_cd_Gallery_7)
                                        <div class="item">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    src="{{ asset('images/galleryimages/' . $carddata->sg_cd_Gallery_7) }}">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($carddata->sg_cd_Gallery_8)
                                        <div class="item">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    src="{{ asset('images/galleryimages/' . $carddata->sg_cd_Gallery_8) }}">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($carddata->sg_cd_YouTube_Link)
                            <div class="service-card">
                                <h3> Video </h3>
                                <div class="card-video-row">
                                    <div class="card-video-col">
                                        <iframe width="100%" height="315"
                                            src="{{ $carddata->sg_cd_YouTube_Link }}" title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (
                            ($carddata->sg_cd_Title_1 && $carddata->sg_cd_Link_1) ||
                                ($carddata->sg_cd_Title_2 && $carddata->sg_cd_Link_2) ||
                                ($carddata->sg_cd_Title_3 && $carddata->sg_cd_Link_3) ||
                                ($carddata->sg_cd_Title_4 && $carddata->sg_cd_Link_4))
                            <div class="payment-icon-row">
                                <div class="social-menu">
                                    <h4> Links option: </h4>
                                    <div class='buttons-container'>
                                        @if ($carddata->sg_cd_Title_1 && $carddata->sg_cd_Link_1)
                                            @php
                                                $url = $carddata->sg_cd_Link_1;
                                                if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                    $url = 'http://' . $url;
                                                }
                                            @endphp
                                            <div class="socail-box">
                                                <div class='button amex'>
                                                    <a target="_blank" href="{{ $url }}"><i
                                                            class="fa fa-external-link fa-2x"></i></a>
                                                </div>
                                                <h6>{{ $carddata->sg_cd_Title_1 }}</h6>
                                            </div>
                                        @endif
                                        @if ($carddata->sg_cd_Title_2 && $carddata->sg_cd_Link_2)
                                            @php
                                                $url = $carddata->sg_cd_Link_2;
                                                if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                    $url = 'http://' . $url;
                                                }
                                            @endphp
                                            <div class="socail-box">
                                                <div class='button amex'>
                                                    <a target="_blank" href="{{ $url }}"><i
                                                            class="fa fa-external-link fa-2x"></i></a>
                                                </div>
                                                <h6>{{ $carddata->sg_cd_Title_2 }}</h6>
                                            </div>
                                        @endif
                                        @if ($carddata->sg_cd_Title_3 && $carddata->sg_cd_Link_3)
                                            @php
                                                $url = $carddata->sg_cd_Link_3;
                                                if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                    $url = 'http://' . $url;
                                                }
                                            @endphp
                                            <div class="socail-box">
                                                <div class='button amex'>
                                                    <a target="_blank" href="{{ $url }}"><i
                                                            class="fa fa-external-link fa-2x"></i></a>
                                                </div>
                                                <h6>{{ $carddata->sg_cd_Title_3 }}</h6>
                                            </div>
                                        @endif
                                        @if ($carddata->sg_cd_Title_4 && $carddata->sg_cd_Link_4)
                                            @php
                                                $url = $carddata->sg_cd_Link_4;
                                                if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                                                    $url = 'http://' . $url;
                                                }
                                            @endphp
                                            <div class="socail-box">
                                                <div class='button amex'>
                                                    <a target="_blank" href="{{ $url }}"><i
                                                            class="fa fa-external-link fa-2x"></i></a>
                                                </div>
                                                <h6>{{ $carddata->sg_cd_Title_4 }}</h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($carddata->sg_cd_Google_Pay || $carddata->sg_cd_Phone_pe || $carddata->sg_cd_Paytm || $carddata->sg_Bhim_UPI)
                            <div class="payment-icon-row">
                                <div class="social-menu">
                                    <h4> Payment: </h4>
                                    <div class='buttons-container'>
                                        @if ($carddata->sg_cd_Google_Pay)
                                            <div class="socail-box">
                                                <div class='button wallet'>
                                                    <a href="#" class="viewpaymentimage" data-toggle="modal"
                                                        data-target="#paymrntmodal"
                                                        payment-image="{{ asset('images/paymentimages/' . $carddata->sg_cd_Google_Pay) }}">
                                                        <i class="fa fa-google-wallet fa-2x"></i> </a>
                                                </div>
                                                <h6> Google Pay </h6>
                                            </div>
                                        @endif
                                        @if ($carddata->sg_cd_Phone_pe)
                                            <div class="socail-box">
                                                <div class='button credit'>
                                                    <a href="#" class="viewpaymentimage" data-toggle="modal"
                                                        data-target="#paymrntmodal"
                                                        payment-image="{{ asset('images/paymentimages/' . $carddata->sg_cd_Phone_pe) }}">
                                                        <i class="fa fa-credit-card fa-2x"></i> </a>
                                                </div>
                                                <h6> Phone Pay </h6>
                                            </div>
                                        @endif
                                        @if ($carddata->sg_cd_Paytm)
                                            <div class="socail-box">
                                                <div class='button paypal'>
                                                    <a href="#" class="viewpaymentimage" data-toggle="modal"
                                                        data-target="#paymrntmodal"
                                                        payment-image="{{ asset('images/paymentimages/' . $carddata->sg_cd_Paytm) }}">
                                                        <i class="fa fa-paypal fa-2x"></i>
                                                    </a>
                                                </div>
                                                <h6> Paytm </h6>
                                            </div>
                                        @endif
                                        @if ($carddata->sg_Bhim_UPI)
                                            <div class="socail-box">
                                                <div class='button paypal'>
                                                    <a href="#" class="viewpaymentimage"
                                                        payment-image="{{ asset('images/paymentimages/' . $carddata->sg_Bhim_UPI) }}"
                                                        data-toggle="modal" data-target="#paymrntmodal"> <i
                                                            class="fa fa-cc-diners-club fa-2x"></i> </a>
                                                </div>
                                                <h6> Bhim UPI </h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($carddata->sg_brochure && $carddata->sg_brochure_title)
                            <div class="card-inline-row">
                                <a href="{{ asset('images/brochures/' . $carddata->sg_brochure) }}"
                                    class="btn btn-info btn-lg" download="" target="_blank"> <i
                                        class="fa fa-download" aria-hidden="true"></i>
                                    {{ $carddata->sg_brochure_title }}
                                </a>
                            </div>
                        @endif
                        <div class="card-inline-row">
                            <a target="_blank" href="{{ url('downloadvcard/' . $carddata->id) }}"><i
                                    class="fa fa-shopping-basket"></i>Save Card</a>
                            <a href="#" class="btn btn-info btn-lg" data-toggle="modal"
                                data-target="#myModal"> <i class="fa fa-sign-out"></i> share Our Card </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content qr-code-row">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"> <a href="javascript:void(0)">
                                <i class="fa fa-angle-left"></i> </a>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4> Share this card </h4>
                        @php $qrurl = URL('/') . $carddata->sg_cd_QR_Link; @endphp
                        <div class="qrcode">{!! QrCode::size(200)->generate($qrurl) !!}</div>
                        <div class="popup-social-menu">
                            <h4> Or check my social channels: </h4>
                            <div class='buttons-container customcolor'>
                                <div class="socail-box">
                                    <a
                                        href='https://www.facebook.com/sharer.php?u={{ $qrurl }}
                                        target="_blank"'>
                                        <div class='button facebook'>
                                            <i class="fa fa-facebook fa-2x"></i>
                                        </div>
                                        <h6> Facebook </h6>
                                    </a>
                                </div>
                                <div class="socail-box">
                                    <a href="https://twitter.com/share?url={{ $qrurl }}&text=hey have a look at my digital card"
                                        target="_blank">
                                        <div class='button twitter'>
                                            <i class="fa fa-twitter fa-2x"></i>
                                        </div>
                                        <h6>Twitter</h6>
                                    </a>
                                </div>
                                <div class="socail-box">
                                    <a href="https://wa.me/?text={{ $qrurl }}"
                                        data-action="share/whatsapp/share" target="_blank">
                                        <div class='button whatsapp'>
                                            <i class="fa fa-whatsapp fa-2x"></i>
                                        </div>
                                        <h6> Whatsapp </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="paymrntmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: #000000;">Payment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="payment-image">
                            <img src="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="location-col">
                            <iframe class="embademaps" width="100%" height="300" style="border: 0"
                                allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @include('frontwebsite.front-script')
    <script>
        $(".viewpaymentimage").click(function() {
            var imagename = $(this).attr("payment-image");
            $(".payment-image img").attr("src", imagename);
        });
        $(".modalapendclassaddress").click(function() {
            let dataaddress = $(this).attr('data-address');
            $(".embademaps").attr("src", dataaddress);
        });
    </script>
@endforeach
