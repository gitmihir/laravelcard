@php
    $viewFooter = App\Models\Frontfooter::all();
    $viewHeaderData = App\Models\Brand::all();
    $viewCmsDataOnFront = App\Models\CMS::all();
@endphp
@foreach ($viewFooter as $footerData)
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex align-items-center">
                    <div class="ft-widget">
                        <div class="ft-about">
                            @foreach ($viewHeaderData as $footerlogo)
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('images/brandimages/' . $footerlogo->sg_brand_logo) }}"
                                        alt="Home Logo">
                                </a>
                            @endforeach
                            <p class="pt-4">{{ $footerData->sg_footer_text }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="ft-widget">
                        <h2 class="ft-title pb-4"><span> Quick Links </span></h2>
                        <div class="ft-link">
                            <ul>
                                <li><a target="_blank" href="JavaScript:void(0);">Home</a></li>
                                <li><a target="_blank" href="JavaScript:void(0);">About Us</a></li>
                                <li><a target="_blank" href="JavaScript:void(0);">Products</a></li>
                                <li><a target="_blank" href="JavaScript:void(0);">FAQ</a></li>
                                <li><a target="_blank" href="JavaScript:void(0);">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="ft-widget">
                        <h2 class="ft-title pb-4"><span> Support </span></h2>
                        <div class="ft-link">
                            <ul>
                                <li><a target="_blank" href="JavaScript:void(0);">Our Products</a></li>
                                <li><a target="_blank" href="JavaScript:void(0);">Compatible Phones</a></li>
                                <li><a target="_blank" href="JavaScript:void(0);">Support</a></li>
                                <li><a target="_blank" href="JavaScript:void(0);">Track Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="ft-widget">

                        <div class="newsletter">
                            <h2 class="ft-title pb-4"><span> Contact Us </span></h2>
                            <p>{!! $footerData->sg_footer_address !!}</p>
                            <p> Call: <a
                                    href="tel:{{ $footerData->sg_footer_call_link }}">{{ $footerData->sg_footer_call_link }}</a>
                            </p>
                        </div>
                        <div class="social-box pt-4">
                            <ul>
                                <li><a target="_blank" class="fb" href="{{ $footerData->sg_footer_fb_link }}"><span
                                            class="fa fa-facebook"></span></a>
                                </li>
                                <li><a target="_blank" class="tw" href="{{ $footerData->sg_footer_tw_link }}"><span
                                            class="fa fa-twitter"></span></a>
                                </li>
                                <li><a target="_blank" class="pint" href="{{ $footerData->sg_footer_pt_link }}"><span
                                            class="fa fa-pinterest"></span></a>
                                </li>
                                <li><a target="_blank" class="you"
                                        href="{{ $footerData->sg_footer_inst_link }}"><span
                                            class="fa fa-instagram"></span></a>
                                </li>
                                <li><a target="_blank" class="vime" href="{{ $footerData->sg_footer_lk_link }}"><span
                                            class="fa fa-linkedin"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div
                        class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex align-items-center justify-content-center">
                        <div class="copyright c-center">
                            @foreach ($viewCmsDataOnFront as $copyrightText)
                                <p>{!! $copyrightText->sg_cms_copyright_line !!}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endforeach
<div class="to-top" id="back-top">
    <i class="fa fa-angle-up"></i>
</div>
<script src="{{ asset('/frontassets/assets/vendor/modernizr-3.5.0.js') }}"></script>
<script src="{{ asset('/frontassets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/vendor/modernizr-3.5.0.js') }}"></script>
<script src="{{ asset('/frontassets/assets/bootstrap-4.1.1/popper.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/bootstrap-4.1.1/bootstrap.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/animations/wow.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/video/video.popup.js') }}"></script>
<script src="{{ asset('/frontassets/assets/lightbox/jquery.littlelightbox.js') }}"></script>
<script src="{{ asset('/frontassets/js/slick.min.js') }}"></script>
<script src="{{ asset('/frontassets/js/main.js') }}"></script>
</body>
<script type="text/javascript">
    $('.lightbox').littleLightBox();
    $(window).load(function() {});
    $(document).on("click", ".ajaxemail", function() {
        var urlval = $(".ajaxurl").val();
        var fullname = $(".fullname").val();
        var conemail = $(".conemail").val();
        var phonenumber = $(".phonenumber").val();
        var message = $(".message").val();
        $.ajax({
            type: "GET",
            context: this,
            data: {
                fullname: fullname,
                conemail: conemail,
                phonenumber: phonenumber,
                message: message,
            },
            url: urlval,
            success: function(result) {
                if (result === '1') {
                    $(".fullname").val("");
                    $(".conemail").val("");
                    $(".phonenumber").val("");
                    $(".message").val("");
                    $(".successmsg").html("Thank you for filling out your information!");
                } else {
                    $(".successmsg").html("Something is wrong, please try again later!");
                }
            },
        });
    });
    $(document).on("click", ".leaddata", function() {
        var urlval = $(".ajaxurl").val();
        var fullname = $(".fullname").val();
        var conemail = $(".conemail").val();
        var phonenumber = $(".phonenumber").val();
        var productid = $(".productid").val();
        var redirecturl = $(".redirecturl").val();
        $.ajax({
            type: "GET",
            context: this,
            data: {
                fullname: fullname,
                conemail: conemail,
                phonenumber: phonenumber,
                productid: productid,
                redirecturl: redirecturl,
            },
            url: urlval,
            success: function(result) {
                var url = '{{ url('/checkout') }}';
                window.location.href = url;
            },
        });
    });
    $(".update-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ url('update-cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
                //console.log(response);
            }
        });
    });
    $(".remove-from-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
    $(".update-shopping-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var qtys = $('.quantity').map((i, e) => e.value).get();
        var ids = $('.ids').map((i, e) => e.value).get();
        $.ajax({
            url: '{{ url('update-shopping-cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ids,
                quantity: qtys
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
    $(".sameasbilling").change(function() {
        if ($(".sameasbilling").is(":checked")) {
            var sg_full_name = $(".sg_full_name").val();
            var sg_business_address = $(".sg_business_address").val();
            var sg_business_email = $(".sg_business_email").val();
            var sg_business_phone = $(".sg_business_phone").val();
            $(".sg_s_name").val(sg_full_name);
            $(".sg_s_address").val(sg_business_address);
            $(".sg_s_email").val(sg_business_email);
            $(".sg_s_phone").val(sg_business_phone);
        } else {
            $(".sg_s_name").val("");
            $(".sg_s_address").val("");
            $(".sg_s_email").val("");
            $(".sg_s_phone").val("");
        }
    });
    $(".double-ringed").hide();
    $(".grand_total").html("&#8377;" + {{ $total ?? '1' }});
    $(".after_discount_total").val({{ $total ?? '' }});
    $(".coupon_code_check").click(function() {
        $(".double-ringed").show();
        var coupon_code = $(".coupon_code").val();
        $.ajax({
            url: '{{ url('check-coupon-code') }}',
            method: "GET",
            data: {
                coupon_code: coupon_code,
            },
            success: function(response) {
                $(".double-ringed").hide();
                if (response === '0') {
                    $(".messageblock").show();
                    $(".successblock").hide();
                    $(".failureblock").hide();
                } else if (response === '1') {
                    $(".failureblock").show();
                    $(".messageblock").hide();
                    $(".successblock").hide();
                } else {
                    $(".successblock").show();
                    $(".failureblock").hide();
                    $(".messageblock").hide();
                    var coupondata = response.split('~');
                    $(".coupon_ID").val(coupondata[0]);
                    $(".franchise_ID").val(coupondata[1]);
                    $(".return_coupon_code").val(coupondata[2]);
                    $(".coupon_discount").val(coupondata[3]);

                    var discount_amount = {{ $total ?? '1' }} * (coupondata[3] / 100);
                    var final_amount = {{ $total ?? '1' }} - ({{ $total ?? '1' }} * (coupondata[
                            3] /
                        100));
                    $(".discount_amount").html("-&#8377;" + discount_amount);
                    $(".grand_total").html("&#8377;" + final_amount);

                    $(".discounted_price").val(discount_amount);
                    $(".after_discount_total").val(final_amount);
                }
            }
        });
    });
</script>

</html>
