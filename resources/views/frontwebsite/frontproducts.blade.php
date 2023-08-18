@include('frontwebsite.frontheader')
@php
    $productvideos = App\Models\Video::all();
    $productCat = App\Models\Category::all();
    $products = App\Models\Product::all();
    $productwithcat = App\Models\Product::where(['user_name' => 'John']);
    $cms = App\Models\CMS::all();
    $ptitle = [];
    $pimage = [];
    foreach ($cms as $cmsdata) {
        $ptitle = $cmsdata->sg_cms_product_header_text;
        $pimage = $cmsdata->sg_cms_product_section_image;
    }
@endphp
<section class="product-video">
    <div class="container">
        <div class="video-items" id="video-slider">
            @foreach ($productvideos as $viewvideodata)
                <div class="video-slider-item">
                    <div class="row pt-80 pb-50">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-lg-2 order-md-2">
                            <div class="premium-video-col">
                                <div class="single-video">
                                    <video autoplay muted>
                                        <source src="{{ asset('/websitevideos/' . $viewvideodata->sg_p_video_link) }}"
                                            type="video/mp4">
                                    </video>
                                </div>

                            </div>
                        </div>
                        <div
                            class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 d-flex align-items-center justify-content-center">
                            <div class="about-contants">
                                <div class="about-content">
                                    <h2 class="pb-3"> {{ $viewvideodata->sg_p_video_title }}</h2>
                                    {{ $viewvideodata->sg_p_video_text }}
                                    <a href="JavaScript:void(0);" class="btn btn-button wow animated fadeInUp mt-3"
                                        data-wow-duration="7s" data-wow-delay="5s">Know More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- INNER PAGE -->
<div class="Inner-page">

    <div class="shop-page">
        <!-- full width banner -->

        <!-- end full width banner -->
        <div class="container">

            <!-- ITEMS -->
            <div class="products">
                <div class="product-grid tab-pane fade active in show" id="grids" role="tabpanel">

                    <div class="product-tab-box">
                        <div class="heading-pro-tab-title">
                            <h3> Filter designs by card type </h3>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#all" role="tab"
                                    aria-controls="pills-flamingo" aria-selected="true">All </a>
                            </li>
                            @foreach ($productCat as $catfilter)
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#{{ $catfilter->category_id }}"
                                        role="tab" aria-controls="pills-{{ $catfilter->category_id }}"
                                        aria-selected="false">{{ $catfilter->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="all" role="tabpanel"
                            aria-labelledby="flamingo-tab">
                            <div class="row pt-50">
                                @foreach ($products as $productdata)
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 pb-30">
                                        <div class="product-single">
                                            <div class="product-signle-top">
                                                <img src="{{ asset('/images/productimages/' . $productdata->image) }}"
                                                    alt="image">
                                            </div>
                                            <div class="product-single-bottom">
                                                <div class="pro-hover-cont-left">
                                                    <span class="product-single-name"> <a
                                                            href="#">{{ $productdata->product_name }}</a> </span>
                                                    <span class="vender"> {{ $productdata->product_type }} </span>
                                                    <div class="price-box">
                                                        <span class="price">&#8377;
                                                            {{ $productdata->product_list_price }}</span>
                                                    </div>
                                                </div>
                                                <div class="pro-hover-cont-right">
                                                    <a href="{{ url('product-detail/' . $productdata->product_main_id) }}"
                                                        class="addtocart-btn">Get Yours</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="7" role="tabpanel" aria-labelledby="7-tab">
                            <div class="row pt-50">
                                @foreach ($products as $productdata)
                                    @if ($productdata->product_category === '7')
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 pb-30">
                                            <div class="product-single">
                                                <div class="product-signle-top">
                                                    <img src="{{ asset('/images/productimages/' . $productdata->image) }}"
                                                        alt="image">
                                                </div>
                                                <div class="product-single-bottom">
                                                    <div class="pro-hover-cont-left">
                                                        <span class="product-single-name"> <a
                                                                href="#">{{ $productdata->product_name }}</a>
                                                        </span>
                                                        <span class="vender"> {{ $productdata->product_type }} </span>
                                                        <div class="price-box">
                                                            <span class="price">&#8377;
                                                                {{ $productdata->product_list_price }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="pro-hover-cont-right">
                                                        <a href="{{ url('product-detail/' . $productdata->product_main_id) }}"
                                                            class="addtocart-btn">Get Yours</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="9" role="tabpanel" aria-labelledby="9-tab">
                            <div class="row pt-50">
                                @foreach ($products as $productdata)
                                    @if ($productdata->product_category === '9')
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 pb-30">
                                            <div class="product-single">
                                                <div class="product-signle-top">
                                                    <img src="{{ asset('/images/productimages/' . $productdata->image) }}"
                                                        alt="image">
                                                </div>
                                                <div class="product-single-bottom">
                                                    <div class="pro-hover-cont-left">
                                                        <span class="product-single-name"> <a
                                                                href="#">{{ $productdata->product_name }}</a>
                                                        </span>
                                                        <span class="vender"> {{ $productdata->product_type }} </span>
                                                        <div class="price-box">
                                                            <span class="price">&#8377;
                                                                {{ $productdata->product_list_price }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="pro-hover-cont-right">
                                                        <a href="{{ url('product-detail/' . $productdata->product_main_id) }}"
                                                            class="addtocart-btn">Get Yours</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="8" role="tabpanel" aria-labelledby="8-tab">
                            <div class="row pt-50">
                                @foreach ($products as $productdata)
                                    @if ($productdata->product_category === '8')
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 pb-30">
                                            <div class="product-single">
                                                <div class="product-signle-top">
                                                    <img src="{{ asset('/images/productimages/' . $productdata->image) }}"
                                                        alt="image">
                                                </div>
                                                <div class="product-single-bottom">
                                                    <div class="pro-hover-cont-left">
                                                        <span class="product-single-name"> <a
                                                                href="#">{{ $productdata->product_name }}</a>
                                                        </span>
                                                        <span class="vender"> {{ $productdata->product_type }} </span>
                                                        <div class="price-box">
                                                            <span class="price">&#8377;
                                                                {{ $productdata->product_list_price }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="pro-hover-cont-right">
                                                        <a href="{{ url('product-detail/' . $productdata->product_main_id) }}"
                                                            class="addtocart-btn">Get Yours</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END ITEMS -->
            {{-- <div class="product-filter">
                <div class="product-filter-inner">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="product-lode-more">
                                <a href="#"> Lode More <i class="fa fa-spinner"></i>
                                </a>
                            </div>
                        </div>
                        <!-- END PAGINATION -->
                    </div>
                </div>
            </div> --}}
            <!-- END FILTER -->
        </div>
    </div>
</div>
<!-- END INNER PAGE -->

<section class="unique-card-design">
    <div class="container">
        <div class="row pt-50 pb-50">
            <div class="col-xl-12 col-lg-12 col-md-10">
                <div class="hadidng-box text-center">
                    <h2> {!! $ptitle !!} </h2>
                </div>
            </div>
        </div>
        <div class="row pb-50 justify-content-center align-items-center">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="pro-bottom-left">
                    <img src="{{ asset('/images/popupimage/' . $pimage) }}" alt="image">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="pro-bottom-right">
                    <form action="/sendemail" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fullname"> Name :</label>
                                    <input id="fullname" name="fullname" onblur="validateInputText(this);"
                                        class="form-control form-mane fullname" required="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="conemail">E-mail :</label>
                                    <input id="conemail" onblur="validateEmail(this);" name="conemail"
                                        class="form-control form-email conemail" required="" type="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phonenumber">Phone Number: </label>
                                    <input id="phonenumber" onblur="validatePhoneNumber(this);" name="phonenumber"
                                        class="form-control form-mane phonenumber" required="" type="text">
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
    </div>
</section>
@include('frontwebsite.frontfooter')
