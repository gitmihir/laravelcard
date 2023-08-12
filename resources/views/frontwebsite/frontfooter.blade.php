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
    $(".leaddata").attr("disabled", "disabled");
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
    $(".removecode").hide();
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
                    $(".removecode").show();
                    $(".coupon_code").attr("readonly", "readonly");
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
    $(".containersp").hide();
    $('body').on('click', '.buy_now', function(e) {
        debugger
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
        if (sg_full_name.length === 0 ||
            sg_business_name.length === 0 ||
            sg_business_address.length === 0 ||
            sg_business_email.length === 0 ||
            sg_business_phone.length === 0 ||
            sg_s_email.length === 0 ||
            sg_s_phone.length === 0) {
            //alert("Please Fillup all billing details before payment!");

            if (sg_full_name.length === 0) {
                $(".sg_full_name").after("<div class='errorclass'>This field is required.</div>");
            }
            if (sg_business_name.length === 0) {
                $(".sg_business_name").after("<div class='errorclass'>This field is required.</div>");
            }
            if (sg_business_address.length === 0) {
                $(".sg_business_address").after("<div class='errorclass'>This field is required.</div>");
            }
            // if (sg_business_GST_number.length === 0) {
            //     $(".sg_business_GST_number").after("<div class='errorclass'>This field is required.</div>");
            // }
            if (sg_business_email.length === 0) {
                $(".sg_business_email").after("<div class='errorclass'>This field is required.</div>");
            }
            if (sg_business_phone.length === 0) {
                $(".sg_business_phone").after("<div class='errorclass'>This field is required.</div>");
            }
            if (sg_s_email.length === 0) {
                $(".sg_s_email").after("<div class='errorclass'>This field is required.</div>");
            }
            if (sg_s_phone.length === 0) {
                $(".sg_s_phone").after("<div class='errorclass'>This field is required.</div>");
            }
            $(".buy_now").attr('disabled', "disabled");
            return;
        } else {
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
                    if (response.razorpay_payment_id) {
                        $(".containersp").show();
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
                            success: function(xyz) {
                                window.location.href = SITEURL + '/' +
                                    'paysuccess?payment_id=' + response
                                    .razorpay_payment_id + '&product_id=' + product_id +
                                    '&amount=' + totalAmount;
                            }
                        });
                    }

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


    $(".sg_CGST_class").hide();
    $(".sg_SGST_class").hide();
    $(".sg_IGST_class").hide();
    $(
        ".statechangecalculation").on("change", function() {
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
        $(".after_discount_total").val(grand_total);
        $(".buy_now").attr("data-amount", grand_total);
    });
    $(".removecoupon").on("click", function() {
        $(".removecode").hide();
        $(".messageblock").hide();
        $(".successblock").hide();
        $(".failureblock").hide();
        $(".coupon_code").removeAttr("readonly");
        $(".coupon_code").val("");
        var bill_amount = $(".bill_amount").val();
        var sg_order_base_price = $(".sg_order_base_price").val();
        $(".return_coupon_code").val("");
        $(".coupon_discount").val(0);
        $(".discounted_price").val(0);
        $(".discounted_price_display").html(0);
        $(".sg_order_base_price").val(bill_amount);
        $(".sg_order_base_price_display").html($(".before_discount_total").val());

        let final_amount = sg_order_base_price;
        //GST Calculation
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
        } else if (stateval !== "Gujarat") {
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
        $(".buy_now").attr("data-amount", $('.after_discount_total').val());
    });

    function validatePhoneNumber(numberval) {
        if (numberval.value === '') {
            $(".errorclass_" + numberval.name).remove();
            $("input[name=" + numberval.name + "]").after(
                '<div class="errorclass_' +
                numberval.name +
                '">This field is required.</div>'
            );
            $("input[name=" + numberval.name + "]").addClass("errorborderclass");
            $(".buy_now").attr("disabled", "disabled");
            $(".leaddata").attr("disabled", "disabled");
        } else if (!numberval.value.match(/^[0-9]{10}$/)) {
            $(".errorclass_" + numberval.name).remove();
            $("input[name=" + numberval.name + "]").after(
                '<div class="errorclass_' +
                numberval.name +
                '">Please Enter a Valid Phone Number</div>'
            );
            $("input[name=" + numberval.name + "]").addClass("errorborderclass");
            numberval.value = "";
            $(".buy_now").attr("disabled", "disabled");
            $(".leaddata").attr("disabled", "disabled");
        } else {
            $(".errorclass").remove();
            $("input[name=" + numberval.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + numberval.name).remove();
            $(".buy_now").removeAttr("disabled");
            $(".leaddata").removeAttr("disabled");
        }
    }

    function validateInputText(textval) {
        if (!textval.value.match(/^[a-zA-Z ]*$/)) {
            $(".errorclass_" + textval.name).remove();
            $("input[name=" + textval.name + "]").after(
                '<div class="errorclass_' +
                textval.name +
                '">Only alphabets are allowed</div>'
            );
            $("input[name=" + textval.name + "]").addClass("errorborderclass");
            textval.value = "";
            $(".buy_now").attr("disabled", "disabled");
            $(".leaddata").attr("disabled", "disabled");
        } else if (textval.value === '') {

            $(".errorclass_" + textval.name).remove();
            $("input[name=" + textval.name + "]").after(
                '<div class="errorclass_' +
                textval.name +
                '">This field is required.</div>'
            );
            $("input[name=" + textval.name + "]").addClass("errorborderclass");
            $(".buy_now").attr("disabled", "disabled");
            $(".leaddata").attr("disabled", "disabled");
        } else {
            $(".errorclass").remove();
            $("input[name=" + textval.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + textval.name).remove();
            $(".buy_now").removeAttr("disabled");
            $(".leaddata").removeAttr("disabled");
        }
    }

    function requiredfield(field) {
        if (field.value === '') {
            $(".errorclass_" + field.name).remove();
            $("select[name=" + field.name + "]").after(
                '<div class="errorclass_' +
                field.name +
                '">This field is required.</div>'
            );
            $("select[name=" + field.name + "]").addClass("errorborderclass");
            $(".buy_now").attr("disabled", "disabled");
        } else {
            $(".errorclass").remove();
            $("select[name=" + field.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + field.name).remove();
            $(".buy_now").removeAttr("disabled");
        }
    }

    function validateEmail(emailval) {
        if (emailval.value === '') {
            $(".errorclass_" + emailval.name).remove();
            $("input[name=" + emailval.name + "]").after(
                '<div class="errorclass_' +
                emailval.name +
                '">This field is required.</div>'
            );
            $("input[name=" + emailval.name + "]").addClass("errorborderclass");
            $(".buy_now").attr("disabled", "disabled");
            $(".leaddata").attr("disabled", "disabled");
        } else if (!emailval.value.match(/^\S+@\S+\.\S+$/)) {
            $(".errorclass").remove();
            $(".errorclass_" + emailval.name).remove();
            $("input[name=" + emailval.name + "]").after(
                '<div class="errorclass_' +
                emailval.name +
                '">Please Enter a Valid Email!</div>'
            );
            $("input[name=" + emailval.name + "]").addClass("errorborderclass");
            emailval.value = "";
            $(".buy_now").attr("disabled", "disabled");
            $(".leaddata").attr("disabled", "disabled");
        } else {
            $("input[name=" + emailval.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + emailval.name).remove();
            $(".buy_now").removeAttr("disabled");
            $(".leaddata").removeAttr("disabled");
        }
    }

    function validateURL(urlval) {
        if (
            !urlval.value.match(
                /^((ftp|http|https):\/\/)?(www.)?(?!.*(ftp|http|https|www.))[a-zA-Z0-9_-]+(\.[a-zA-Z]+)+((\/)[\w#]+)*(\/\w+\?[a-zA-Z0-9_]+=\w+(&[a-zA-Z0-9_]+=\w+)*)?\/?$/gm
            )
        ) {
            $(".errorclass_" + urlval.name).remove();
            $("input[name=" + urlval.name + "]").after(
                '<div class="errorclass_' +
                urlval.name +
                '">Please enter a valid URL</div>'
            );
            $("input[name=" + urlval.name + "]").addClass("errorborderclass");
            urlval.value = "";
            $(".buy_now").attr("disabled", "disabled");
        } else {
            $("input[name=" + urlval.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + urlval.name).remove();
            $(".buy_now").removeAttr("disabled");
        }
    }

    function validateImageSize(imagedata) {
        var max = 3000000;
        if (imagedata.files[0].size > max) {
            $(".errorclass_" + imagedata.name).remove();
            $("input[name=" + imagedata.name + "]").after(
                '<div class="errorclass_' +
                imagedata.name +
                '">Please upload a valid file (.jpg, .png) not exceeding 3MB</div>'
            );
            $("input[name=" + imagedata.name + "]").addClass("errorborderclass");
            imagedata.value = "";
            $(".buy_now").attr("disabled", "disabled");
        } else {
            $("input[name=" + imagedata.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + imagedata.name).remove();
            $(".buy_now").removeAttr("disabled");
        }
    }

    function validateImageSize2(imagedata) {
        var max = 6000000;
        if (imagedata.files[0].size > max) {
            $(".errorclass_" + imagedata.name).remove();
            $("input[name=" + imagedata.name + "]").after(
                '<div class="errorclass_' +
                imagedata.name +
                '">Please upload a valid file (.pdf) not exceeding 6MB</div>'
            );
            $("input[name=" + imagedata.name + "]").addClass("errorborderclass");
            imagedata.value = "";
            $(".buy_now").attr("disabled", "disabled");
        } else {
            $("input[name=" + imagedata.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + imagedata.name).remove();
            $(".buy_now").removeAttr("disabled");
        }
    }

    function validateTextSize(textdata) {
        var max = 250;
        if (textdata.value.length > max) {
            $(".errorclass_" + textdata.name).remove();
            $("textarea[name=" + textdata.name + "]").after(
                '<div class="errorclass_' +
                textdata.name +
                '">The text entered exceeds the maximum character limit of 250</div>'
            );
            $("textarea[name=" + textdata.name + "]").addClass("errorborderclass");
            textdata.value.substring(0, 250);
            $(".buy_now").attr("disabled", "disabled");
        } else {
            $("textarea[name=" + textdata.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + textdata.name).remove();
            $(".buy_now").removeAttr("disabled");
        }
    }

    function validateTextSize2(textdata) {
        var max = 20;
        if (textdata.value.length > max) {
            $(".errorclass_" + textdata.name).remove();
            $("input[name=" + textdata.name + "]").after(
                '<div class="errorclass_' +
                textdata.name +
                '">The text entered exceeds the maximum character limit of 20</div>'
            );
            $("input[name=" + textdata.name + "]").addClass("errorborderclass");
            textdata.value.substring(0, 20);
            $(".buy_now").attr("disabled", "disabled");
        } else {
            $("input[name=" + textdata.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + textdata.name).remove();
            $(".buy_now").removeAttr("disabled");
        }
    }

    function validateGSTNumber(gstval) {
        if (!gstval.value.match(/^[A-Za-z0-9 ]*$/)) {
            $(".errorclass_" + gstval.name).remove();
            $("input[name=" + gstval.name + "]").after(
                '<div class="errorclass_' +
                gstval.name +
                '">Special characters are not allowed, only numbers and latters are allowed.</div>'
            );
            $("input[name=" + gstval.name + "]").addClass("errorborderclass");
            gstval.value = "";
            $(".buy_now").attr("disabled", "disabled");
        } else {
            $(".errorclass").remove();
            $("input[name=" + gstval.name + "]").removeClass("errorborderclass");
            $(".errorclass_" + gstval.name).remove();
            $(".buy_now").removeAttr("disabled");
        }
    }
</script>
<style>
    div[class*="errorclass_"] {
        color: #ee0909;
    }

    .errorclass {
        color: #ee0909;
    }

    .errorborderclass {
        border-color: #ee0909 !important;
    }

    .instructionClass {
        font-weight: 600;
        font-size: 13px;
        letter-spacing: 1px;
        color: #555555;
    }

    .containersp {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        text-align: center;
        background: #f2f2f2;
        opacity: 0.8;
        z-index: 1;
    }

    .containersp:before {
        content: "";
        height: 100%;
        display: inline-block;
        vertical-align: middle;
    }

    .containersp .spinner-frame {
        display: inline-block;
        vertical-align: middle;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        position: relative;
        overflow: hidden;
        border: 5px solid #fff;
        padding: 10px;
    }

    .containersp .spinner-frame .spinner-cover {
        background: #fff;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        position: relative;
        z-index: 2;
    }

    .containersp .spinner-frame .spinner-bar {
        background: #29d;
        width: 50%;
        height: 50%;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 100% 0 0 0;
        -webkit-animation: spinny 2s linear infinite;
        transform-origin: 100% 100%;
    }

    @-webkit-keyframes spinny {
        0% {
            transform: rotate(0deg);
            background: #29d;
        }

        50% {
            transform: rotate(180deg);
            background: #00427c;
        }

        100% {
            transform: rotate(360deg);
            background: #29d;
        }
    }
</style>

</html>
