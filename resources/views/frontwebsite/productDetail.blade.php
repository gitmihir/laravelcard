@include('frontwebsite.frontheader')
<div class="Inner-page">
    <!-- INNER PAGE HADDING -->
    <div class="inner-hadding">
        <div class="inner-hadding-box text-center">
            <ul class="breadcrumbs">
                <li><a href="#"><span class="fa fa-home"></span> Home</a></li>
                <li>Single Shop</li>
            </ul>
        </div>
    </div>
    <!-- END INNER PAGE HADDING -->
    <div class="shop-page">
        <!-- PRODUCT SINGLE PAGE -->
        <div class="shop-single-page pt-80">
            <div class="single-product-view">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-6 col-12">
                            <div class="single-thum-img">
                                <div class="slider slider-for">
                                    <div class="item">
                                        <img src="{{ asset('/images/productimages/' . $productdetailfront->image) }}"
                                            alt="Barber Salon Bootstrap 4 Template">
                                        <a href="{{ asset('/images/productimages/' . $productdetailfront->image) }}"
                                            class="full-view-pro lightbox" data-littlelightbox-group="gallery"><i
                                                class="icofont-light-bulb"></i></a>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('/images/productimages/' . $productdetailfront->image1) }}"
                                            alt="Barber Salon Bootstrap 4 Template">
                                        <a href="{{ asset('/images/productimages/' . $productdetailfront->image1) }}"
                                            class="full-view-pro lightbox" data-littlelightbox-group="gallery"><i
                                                class="icofont-light-bulb"></i></a>
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('/images/productimages/' . $productdetailfront->image2) }}"
                                            alt="Barber Salon Bootstrap 4 Template">
                                        <a href="{{ asset('/images/productimages/' . $productdetailfront->image2) }}"
                                            class="full-view-pro lightbox" data-littlelightbox-group="gallery"><i
                                                class="icofont-light-bulb"></i></a>
                                    </div>

                                </div>
                            </div>
                            <div class="single-thum-small">
                                <div class="slider-nav">
                                    <div class="item">
                                        <img src="{{ asset('/images/productimages/' . $productdetailfront->image) }}"
                                            alt="Barber Salon Bootstrap 4 Template">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('/images/productimages/' . $productdetailfront->image1) }}"
                                            alt="Barber Salon Bootstrap 4 Template">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('/images/productimages/' . $productdetailfront->image2) }}"
                                            alt="Barber Salon Bootstrap 4 Template">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-6 col-12">
                            <div class="single-product-details">
                                <div class="product-details">
                                    <div class="single-dec-top">
                                        <h2> Please enter the details to be printed on the card. </h2>
                                    </div>
                                    <div class="pro-bottom-right">
                                        <form action="/sendemail" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input id="fullname" onblur="validateInputText(this);"
                                                            name="fullname" class="form-control form-mane fullname"
                                                            required="" type="text" placeholder="Your Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input id="conemail" onblur="validateEmail(this);"
                                                            name="conemail" class="form-control form-email conemail"
                                                            required="" placeholder="Your Email" type="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input id="phonenumber" onblur="validatePhoneNumber(this);"
                                                            name="phonenumber"
                                                            class="form-control form-mane phonenumber" required=""
                                                            type="text" placeholder="Your Phone Number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons pt-3">
                                                <input type="hidden" class="ajaxurl" value="{{ url('/ajaxform2') }}">
                                                <input type="hidden" class="productid"
                                                    value="{{ $productdetailfront->product_main_id }}">
                                                <input type="hidden" class="redirecturl" value="{{ url('/') }}">

                                                <button type="button"
                                                    class="btn btn-button btn-button-2 blue-bg leaddata">Add
                                                    to Cart</button>
                                            </div>
                                            <div class="successmsg pt-2"></div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- END PRODUCT SINGLE PAGE -->
    </div>
</div>
@include('frontwebsite.frontfooter')
