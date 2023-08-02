@php
    $viewFooter = App\Models\Frontfooter::all();
    $viewHeaderData = App\Models\Brand::all();
    $viewCmsDataOnFront = App\Models\CMS::all();
    $razorpaykey = [];
    $paymentkeys = App\Models\PC::all();
    foreach ($paymentkeys as $razorpkey) {
        $razorpaykey = $razorpkey->sg_pc_public_key;
    }
    
@endphp
@foreach ($viewFooter as $footerData)
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex align-items-center">
                    <div class="ft-widget">
                        <div class="ft-about">
                            @php
                                $footerlogo = [];
                            @endphp
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
@include('frontwebsite.front-script')
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
            var sg_state = $(".sg_state").val();
            $(".sg_s_name").val(sg_full_name);
            $(".sg_s_address").val(sg_business_address);
            $(".sg_s_email").val(sg_business_email);
            $(".sg_s_phone").val(sg_business_phone);
            $(".sg_s_state").val(sg_state);
        } else {
            $(".sg_s_name").val("");
            $(".sg_s_address").val("");
            $(".sg_s_email").val("");
            $(".sg_s_phone").val("");
            $(".sg_s_state").val("");
        }
    });
    $(".double-ringed").hide();
    //var shipping_rate = $(".shipping_rate").val();
    var withshippingratetotal = parseFloat({{ $total ?? '1' }});
    $(".grand_total").html("&#8377;" + withshippingratetotal);
    $(".after_discount_total").val(withshippingratetotal);
    $(".buy_now").attr("data-amount", withshippingratetotal);
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
                    var final_amount = {{ $total ?? '1' }} - {{ $total ?? '1' }} * (
                        coupondata[
                            3] /
                        100);
                    $(".discounted_price_display").html("-&#8377;" + discount_amount);
                    $(".discounted_price").val(discount_amount);
                    $(".sg_order_base_price_display").html("&#8377;" + final_amount);
                    $(".sg_order_base_price_display").val(final_amount);

                    var stateval = $(".statechangecalculation").val();
                    if (stateval === "Gujarat") {
                        $(".sg_CGST_class").show();
                        $(".sg_SGST_class").show();
                        $(".sg_IGST_class").hide();
                        if (final_amount) {
                            var total_amount_after_tax = final_amount * 0.09;
                            $(".sg_CGST").html("&#8377;" + total_amount_after_tax.toFixed(2));
                            $(".sg_SGST").html("&#8377;" + total_amount_after_tax.toFixed(2));
                            $(".cgst").val(total_amount_after_tax.toFixed(2));
                            $(".sgst").val(total_amount_after_tax.toFixed(2));

                            var grand_total =
                                parseFloat(final_amount) +
                                parseFloat($(".cgst").val()) +
                                parseFloat($(".sgst").val());
                            $(".grandTotalafterGstInclusion").html("&#8377;" + grand_total.toFixed(
                                2));
                            $(".after_discount_total").val(grand_total);

                        }
                    } else {
                        $(".sg_CGST_class").hide();
                        $(".sg_SGST_class").hide();
                        $(".sg_IGST_class").show();
                        if (final_amount) {
                            var total_amount_after_tax = final_amount * 0.18;
                            $(".sg_IGST").html("&#8377;" + total_amount_after_tax.toFixed(2));
                            $(".igst").val(total_amount_after_tax.toFixed(2));

                            var grand_total =
                                parseFloat(final_amount) +
                                parseFloat($(".igst").val());
                            $(".grandTotalafterGstInclusion").html("&#8377;" + grand_total.toFixed(
                                2));
                            $(".after_discount_total").val(grand_total);
                        }
                    }
                    $(".buy_now").attr("data-amount", grand_total);
                }
            }
        });
    });

    /* Payment */
    var SITEURL = '{{ URL::to('/') }}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('click', '.buy_now', function(e) {
        /* Store Order Details */
        var sg_full_name = $(".sg_full_name").val();
        var sg_business_name = $(".sg_business_name").val();
        var sg_business_address = $(".sg_business_address").val();
        var sg_business_GST_number = $(".sg_business_GST_number").val();
        var sg_business_email = $(".sg_business_email").val();
        var sg_business_phone = $(".sg_business_phone").val();

        var sg_s_name = $(".sg_s_name").val();
        var sg_s_address = $(".sg_s_address").val();
        var sg_s_email = $(".sg_s_email").val();
        var sg_s_phone = $(".sg_s_phone").val();
        var sg_state = $(".sg_state").val();
        var sg_s_state = $(".sg_s_state").val();
        var coupon_ID = $(".coupon_ID").val();
        var franchise_ID = $(".franchise_ID").val();
        var return_coupon_code = $(".return_coupon_code").val();
        var coupon_discount = $(".coupon_discount").val();
        //var shipping_fee = $(".shipping_rate").val();
        var before_discount_total = $(".before_discount_total").val();
        var discounted_price = $(".discounted_price").val();
        var after_discount_total = $(".after_discount_total").val();
        var order_id_for_status = $(".order_id_for_status").val();
        var payment_remark = $(".payment_remark").val();
        var sg_order_status = $(".sg_order_status").val();

        var cgst = $(".cgst").val();
        var sgst = $(".sgst").val();
        var igst = $(".igst").val();
        var Order_status = $(".Order_status").val();
        var sg_order_base_price = $(".sg_order_base_price").val();

        var product_ids = [];
        $("input[name='product_ids[]']").each(function() {
            product_ids.push($(this).val());
        });

        var product_quantities = [];
        $("input[name='product_quantities[]']").each(function() {
            product_quantities.push($(this).val());
        });

        var product_prices = [];
        $("input[name='product_prices[]']").each(function() {
            product_prices.push($(this).val());
        });
        //var product_ids = $("input[name='product_ids[]']").val();
        //var product_quantities = $("input[name='product_quantities[]']").val();
        //var product_prices = $(".input[name='product_prices[]']").val();
        if (sg_full_name.length === 0 &&
            sg_business_name.length === 0 &&
            sg_business_address.length === 0 &&
            sg_business_GST_number.length === 0 &&
            sg_business_email.length === 0 &&
            sg_business_phone.length === 0) {
            alert("Please Fillup all billing details before payment!");
        } else {

            $.ajax({
                url: '{{ url('insert-order') }}',
                method: "GET",
                data: {
                    sg_full_name: sg_full_name,
                    sg_business_name: sg_business_name,
                    sg_business_address: sg_business_address,
                    sg_business_GST_number: sg_business_GST_number,
                    sg_business_email: sg_business_email,
                    sg_business_phone: sg_business_phone,
                    sg_s_name: sg_s_name,
                    sg_s_address: sg_s_address,
                    sg_s_email: sg_s_email,
                    sg_s_phone: sg_s_phone,
                    sg_state: sg_state,
                    sg_s_state: sg_s_state,
                    coupon_ID: coupon_ID,
                    franchise_ID: franchise_ID,
                    return_coupon_code: return_coupon_code,
                    coupon_discount: coupon_discount,
                    //shipping_fee: shipping_fee,
                    before_discount_total: before_discount_total,
                    discounted_price: discounted_price,
                    after_discount_total: after_discount_total,
                    product_ids: product_ids,
                    product_quantities: product_quantities,
                    product_prices: product_prices,
                    order_id_for_status: order_id_for_status,
                    payment_remark: payment_remark,
                    sg_order_status: sg_order_status,
                    cgst: cgst,
                    sgst: sgst,
                    igst: igst,
                    Order_status: Order_status,
                    sg_order_base_price: sg_order_base_price
                },
                success: function(response) {}
            });
            /* End */
            var totalAmount = $(this).attr("data-amount");
            var product_id = $(this).attr("data-id");
            var contact = $(".sg_business_phone").val();
            var email = $(".sg_business_email").val();
            var options = {
                "key": "{{ $razorpaykey }}",
                "amount": (totalAmount * 100), // 2000 paise = INR 20
                "name": "CS",
                "description": "Payment",
                "image": "http://127.0.0.1:8000/images/brandimages/16725396391536265872.png",
                "handler": function(response) {
                    window.location.href = SITEURL + '/' + 'paysuccess?payment_id=' + response
                        .razorpay_payment_id + '&product_id=' + product_id + '&amount=' + totalAmount;
                },
                "prefill": {
                    "contact": contact,
                    "email": email,
                },
                "theme": {
                    "color": "#528FF0"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
        }
    });

    function invokeBlinkCheckoutPopup(orderId, txnToken, amount) {
        window.Paytm.CheckoutJS.init({
            "root": "",
            "flow": "DEFAULT",
            "data": {
                "orderId": orderId,
                "token": txnToken,
                "tokenType": "TXN_TOKEN",
                "amount": amount,
            },
            handler: {
                transactionStatus: function(data) {},
                notifyMerchant: function notifyMerchant(eventName, data) {
                    if (eventName == "APP_CLOSED") {
                        $('.paytm-pg-loader').hide();
                        $('.paytm-overlay').hide();
                        //location.reload();
                    }
                    console.log("notify merchant about the payment state");
                }
            }
        }).then(function() {
            window.Paytm.CheckoutJS.invoke();
        });
    }
    $(".sg_CGST_class").hide();
    $(".sg_SGST_class").hide();
    $(".sg_IGST_class").hide();
    $(".statechangecalculation").on("change", function() {
        var couponcodeval = $(".coupon_discount").val();
        var sg_order_base_price = $(".sg_order_base_price").val();
        if (couponcodeval === 0 || couponcodeval === '') {
            sg_order_base_price = $(".sg_order_base_price").val();
        } else {
            var discount_amount = sg_order_base_price * (couponcodeval / 100);
            sg_order_base_price = parseFloat($(".sg_order_base_price").val()) - parseFloat(discount_amount);
        }

        var stateval = $(this).find(":selected").val();
        if (stateval === "Gujarat") {
            $(".sg_CGST_class").show();
            $(".sg_SGST_class").show();
            $(".sg_IGST_class").hide();
            if (sg_order_base_price) {
                var total_amount_after_tax = sg_order_base_price * 0.09;
                $(".sg_CGST").html("&#8377;" + total_amount_after_tax.toFixed(2));
                $(".sg_SGST").html("&#8377;" + total_amount_after_tax.toFixed(2));
                $(".cgst").val(total_amount_after_tax.toFixed(2));
                $(".sgst").val(total_amount_after_tax.toFixed(2));
                var grand_total =
                    parseFloat(sg_order_base_price) +
                    parseFloat($(".cgst").val()) +
                    parseFloat($(".sgst").val());
                $(".grandTotalafterGstInclusion").html("&#8377;" + grand_total.toFixed(2));
            }
        } else {
            $(".sg_CGST_class").hide();
            $(".sg_SGST_class").hide();
            $(".sg_IGST_class").show();
            if (sg_order_base_price) {
                var total_amount_after_tax = sg_order_base_price * 0.18;
                $(".sg_IGST").html("&#8377;" + total_amount_after_tax.toFixed(2));
                $(".igst").val(total_amount_after_tax.toFixed(2));
                var grand_total =
                    parseFloat(sg_order_base_price) +
                    parseFloat($(".igst").val());
                $(".grandTotalafterGstInclusion").html("&#8377;" + grand_total.toFixed(2));
            }
        }
    });
</script>


</html>
