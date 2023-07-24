<script>
    var maxproduct = 100;
    var wrapper = $('.field_wrapper');
    var x = 1;

    $(document).on("click", ".add_more_products", function() {
        x++;
        if (x < maxproduct) {
            $(wrapper).append('<div class="parentchild-' + x + '"><div class="duplicatehtml-' + x +
                '"><table class="table"><tr><td><select product_current_id="' + x +
                '" name="product_name[]" class="form-control product_name-' + x +
                '"><option value="">Select Product</option>@foreach ($productselectquery as $productdata)<option product-url="{{ url('/bills/addbills/' . $productdata->product_main_id) }}" product-id="{{ $productdata->product_main_id }}" value="{{ $productdata->product_name }}"> {{ $productdata->product_name }} </option> @endforeach </select></td><td><input type="text" name="product_price[]" class="form-control product_price-' +
                x + '" readonly></td> <td><input type="number" min="0" current_qty_no=' + x +
                ' name="product_quantities[]" class="form-control product_quantity-' + x +
                '"></td> <td><input type="text" name="product_total_amount[]" class="form-control product_total_amount-' +
                x +
                '" readonly></td> <td><button type="button" class="btn btn-danger remove_product"><i class="fas fa-minus-square"></i></button></td></tr><input type="hidden" name="product_ids[]" class="product_id-' +
                x + '"></table></div></div>');

            $(document).on("change click blur keyup keypress keydown", ".product_quantity-" + x, function() {
                var thisval = $(this);
                var current_qty_no = thisval.attr("current_qty_no");
                var quantity = $('.product_quantity-' + current_qty_no).val();
                var price = $(".product_price-" + current_qty_no).val();
                if (price >= 0 && quantity >= 0) {
                    var total_bill_amount = price * quantity;
                    $(".parentchild-" + current_qty_no).closest(".parentchild-" + current_qty_no).find(
                        ".product_total_amount-" + current_qty_no).val(total_bill_amount.toFixed(2));

                    var final_bill_amount = 0;
                    $("input[name='product_total_amount[]").each(function() {
                        final_bill_amount += +$(this).val();
                    });
                    $(".bill_amount").val(final_bill_amount.toFixed(2));
                    var couponcodeval = $(".coupon_discount").val();
                    $(".sg_order_base_price").val(final_bill_amount.toFixed(2));
                    var sg_order_base_price = $(".sg_order_base_price").val();
                    //GST Calculation
                    var sg_state = $(".sg_state").val();
                    if (sg_state === "Gujarat") {
                        var total_amount_after_tax = sg_order_base_price * 0.09;
                        $(".sg_CGST").val(total_amount_after_tax.toFixed(2));
                        $(".sg_SGST").val(total_amount_after_tax.toFixed(2));
                        var grand_total =
                            parseFloat(sg_order_base_price) +
                            parseFloat($(".sg_CGST").val()) +
                            parseFloat($(".sg_SGST").val());
                        $(".after_discount_total").val(grand_total.toFixed(2));
                    } else {
                        var total_amount_after_tax = sg_order_base_price * 0.18;
                        $(".sg_IGST").val(total_amount_after_tax.toFixed(2));
                        var grand_total =
                            parseFloat(sg_order_base_price) + parseFloat($(".sg_IGST").val());
                        $(".after_discount_total").val(grand_total.toFixed(2));
                    }

                    $(".after_discount_total").val();
                    if (couponcodeval.length === 0) {} else {
                        var discount_amount = final_bill_amount * (couponcodeval / 100);
                        $(".discounted_price").val(discount_amount);
                        $(".sg_order_base_price").val(
                            final_bill_amount.toFixed(2) - parseFloat(discount_amount)
                        );
                        var sg_order_base_price = $(".sg_order_base_price").val();
                        var sg_state = $(".sg_state").val();
                        if (sg_state === "Gujarat") {
                            var total_amount_after_tax = sg_order_base_price * 0.09;
                            $(".sg_CGST").val(total_amount_after_tax.toFixed(2));
                            $(".sg_SGST").val(total_amount_after_tax.toFixed(2));
                            var grand_total =
                                parseFloat(sg_order_base_price) +
                                parseFloat($(".sg_CGST").val()) +
                                parseFloat($(".sg_SGST").val());
                            $(".after_discount_total").val(grand_total.toFixed(2));
                        } else {
                            var total_amount_after_tax = sg_order_base_price * 0.18;
                            $(".sg_IGST").val(total_amount_after_tax.toFixed(2));
                            var grand_total =
                                parseFloat(sg_order_base_price) + parseFloat($(".sg_IGST").val());
                            $(".after_discount_total").val(grand_total.toFixed(2));
                        }
                    }
                }
            });

            $(document).on("change", ".product_name-" + x, function() {
                var thisval = $(this);
                var current_id = thisval.attr("product_current_id");
                var urlval = $(this).find(':selected').attr("product-url");
                var productid = $(this).find(':selected').attr("product-id");
                $.ajax({
                    type: 'GET',
                    context: this,
                    data: {
                        productid: productid,
                    },
                    url: urlval,
                    success: function(result) {
                        $(".product_price-" + current_id).val(result);
                        $(".product_id-" + current_id).val(productid);
                        var thisval = $(this);
                        var quantity = $('.product_quantity-' + current_id).val();
                        var price = $(".product_price-" + current_id).val();
                        if (price >= 0 && quantity >= 0) {
                            var total_bill_amount = price * quantity;
                            $(".parentchild-" + current_id).closest(".parentchild-" +
                                    current_id).find(".product_total_amount-" + current_id)
                                .val(total_bill_amount.toFixed(2));

                            var final_bill_amount = 0;
                            $("input[name='product_total_amount[]").each(function() {
                                final_bill_amount += +$(this).val();
                            });
                            $(".bill_amount").val(final_bill_amount.toFixed(2));
                            var couponcodeval = $(".coupon_discount").val();
                            $(".sg_order_base_price").val(final_bill_amount.toFixed(2));
                            var sg_order_base_price = $(".sg_order_base_price").val();
                            //GST Calculation
                            var sg_state = $(".sg_state").val();
                            if (sg_state === "Gujarat") {
                                var total_amount_after_tax = sg_order_base_price * 0.09;
                                $(".sg_CGST").val(total_amount_after_tax.toFixed(2));
                                $(".sg_SGST").val(total_amount_after_tax.toFixed(2));
                                var grand_total =
                                    parseFloat(sg_order_base_price) +
                                    parseFloat($(".sg_CGST").val()) +
                                    parseFloat($(".sg_SGST").val());
                                $(".after_discount_total").val(grand_total.toFixed(2));
                            } else {
                                var total_amount_after_tax = sg_order_base_price * 0.18;
                                $(".sg_IGST").val(total_amount_after_tax.toFixed(2));
                                var grand_total =
                                    parseFloat(sg_order_base_price) + parseFloat($(
                                        ".sg_IGST").val());
                                $(".after_discount_total").val(grand_total.toFixed(2));
                            }

                            $(".after_discount_total").val();
                            if (couponcodeval.length === 0) {} else {
                                var discount_amount = final_bill_amount * (couponcodeval /
                                    100);
                                $(".discounted_price").val(discount_amount);
                                $(".sg_order_base_price").val(
                                    final_bill_amount.toFixed(2) - parseFloat(
                                        discount_amount)
                                );
                                var sg_order_base_price = $(".sg_order_base_price").val();
                                var sg_state = $(".sg_state").val();
                                if (sg_state === "Gujarat") {
                                    var total_amount_after_tax = sg_order_base_price * 0.09;
                                    $(".sg_CGST").val(total_amount_after_tax.toFixed(2));
                                    $(".sg_SGST").val(total_amount_after_tax.toFixed(2));
                                    var grand_total =
                                        parseFloat(sg_order_base_price) +
                                        parseFloat($(".sg_CGST").val()) +
                                        parseFloat($(".sg_SGST").val());
                                    $(".after_discount_total").val(grand_total.toFixed(2));
                                } else {
                                    var total_amount_after_tax = sg_order_base_price * 0.18;
                                    $(".sg_IGST").val(total_amount_after_tax.toFixed(2));
                                    var grand_total =
                                        parseFloat(sg_order_base_price) + parseFloat($(
                                            ".sg_IGST").val());
                                    $(".after_discount_total").val(grand_total.toFixed(2));
                                }
                            }
                        }
                    }
                });
            });

            $(document).on("change", ".product_name-" + x, function() {
                var thisval = $(this);
                var current_id = thisval.attr("product_current_id");
                var quantity = $('.product_quantity-' + current_id).val();
                var price = $(".product_price-" + current_id).val();
                if (price >= 0 && quantity >= 0) {
                    var total_bill_amount = price * quantity;
                    $(".parentchild-" + current_id).closest(".parentchild-" + current_id).find(
                        ".product_total_amount-" + current_id).val(total_bill_amount.toFixed(2));
                    var final_bill_amount = 0;
                    $("input[name='product_total_amount[]").each(function() {
                        final_bill_amount += +$(this).val();
                    });
                    $(".bill_amount").val(final_bill_amount.toFixed(2));
                    var couponcodeval = $(".coupon_discount").val();
                    $(".sg_order_base_price").val(final_bill_amount.toFixed(2));
                    var sg_order_base_price = $(".sg_order_base_price").val();
                    //GST Calculation
                    var sg_state = $(".sg_state").val();
                    if (sg_state === "Gujarat") {
                        var total_amount_after_tax = sg_order_base_price * 0.09;
                        $(".sg_CGST").val(total_amount_after_tax.toFixed(2));
                        $(".sg_SGST").val(total_amount_after_tax.toFixed(2));
                        var grand_total =
                            parseFloat(sg_order_base_price) +
                            parseFloat($(".sg_CGST").val()) +
                            parseFloat($(".sg_SGST").val());
                        $(".after_discount_total").val(grand_total.toFixed(2));
                    } else {
                        var total_amount_after_tax = sg_order_base_price * 0.18;
                        $(".sg_IGST").val(total_amount_after_tax.toFixed(2));
                        var grand_total =
                            parseFloat(sg_order_base_price) + parseFloat($(".sg_IGST").val());
                        $(".after_discount_total").val(grand_total.toFixed(2));
                    }

                    $(".after_discount_total").val();
                    if (couponcodeval.length === 0) {} else {
                        var discount_amount = final_bill_amount * (couponcodeval / 100);
                        $(".discounted_price").val(discount_amount);
                        $(".sg_order_base_price").val(
                            final_bill_amount.toFixed(2) - parseFloat(discount_amount)
                        );
                        var sg_order_base_price = $(".sg_order_base_price").val();
                        var sg_state = $(".sg_state").val();
                        if (sg_state === "Gujarat") {
                            var total_amount_after_tax = sg_order_base_price * 0.09;
                            $(".sg_CGST").val(total_amount_after_tax.toFixed(2));
                            $(".sg_SGST").val(total_amount_after_tax.toFixed(2));
                            var grand_total =
                                parseFloat(sg_order_base_price) +
                                parseFloat($(".sg_CGST").val()) +
                                parseFloat($(".sg_SGST").val());
                            $(".after_discount_total").val(grand_total.toFixed(2));
                        } else {
                            var total_amount_after_tax = sg_order_base_price * 0.18;
                            $(".sg_IGST").val(total_amount_after_tax.toFixed(2));
                            var grand_total =
                                parseFloat(sg_order_base_price) + parseFloat($(".sg_IGST").val());
                            $(".after_discount_total").val(grand_total.toFixed(2));
                        }
                    }
                }
            });
        }
    });
    $(wrapper).on('click', '.remove_product', function(e) {
        e.preventDefault();
        $(this).closest(".duplicatehtml-" + x).remove();

        var final_bill_amount = 0;
        $("input[name='product_total_amount[]").each(function() {
            final_bill_amount += +$(this).val();
        });
        $(".bill_amount").val(final_bill_amount.toFixed(2));
        var couponcodeval = $(".coupon_discount").val();

        if (couponcodeval.length === 0) {} else {
            var discount_amount = final_bill_amount * (couponcodeval / 100);
            $(".discounted_price").val(discount_amount);
            $(".sg_order_base_price").val(
                final_bill_amount.toFixed(2) - parseFloat(
                    discount_amount)
            );

            var sg_order_base_price = $(".sg_order_base_price").val();
            //GST Calculation
            var sg_state = $(".sg_state").val();
            if (sg_state === "Gujarat") {
                var total_amount_after_tax = sg_order_base_price * 0.09;
                $(".sg_CGST").val(total_amount_after_tax.toFixed(2));
                $(".sg_SGST").val(total_amount_after_tax.toFixed(2));
                var grand_total =
                    parseFloat(sg_order_base_price) +
                    parseFloat($(".sg_CGST").val()) +
                    parseFloat($(".sg_SGST").val());
                $(".after_discount_total").val(grand_total.toFixed(2));
            } else {
                var total_amount_after_tax = sg_order_base_price * 0.18;
                $(".sg_IGST").val(total_amount_after_tax.toFixed(2));
                var grand_total =
                    parseFloat(sg_order_base_price) + parseFloat($(".sg_IGST").val());
                $(".after_discount_total").val(grand_total.toFixed(2));
            }

            $(".after_discount_total").val();
            if (couponcodeval.length === 0) {} else {
                var discount_amount = final_bill_amount * (couponcodeval / 100);
                $(".discounted_price").val(discount_amount);
                $(".sg_order_base_price").val(
                    final_bill_amount.toFixed(2) - parseFloat(discount_amount)
                );
                var sg_order_base_price = $(".sg_order_base_price").val();
                var sg_state = $(".sg_state").val();
                if (sg_state === "Gujarat") {
                    var total_amount_after_tax = sg_order_base_price * 0.09;
                    $(".sg_CGST").val(total_amount_after_tax.toFixed(2));
                    $(".sg_SGST").val(total_amount_after_tax.toFixed(2));
                    var grand_total =
                        parseFloat(sg_order_base_price) +
                        parseFloat($(".sg_CGST").val()) +
                        parseFloat($(".sg_SGST").val());
                    $(".after_discount_total").val(grand_total.toFixed(2));
                } else {
                    var total_amount_after_tax = sg_order_base_price * 0.18;
                    $(".sg_IGST").val(total_amount_after_tax.toFixed(2));
                    var grand_total =
                        parseFloat(sg_order_base_price) + parseFloat($(".sg_IGST").val());
                    $(".after_discount_total").val(grand_total.toFixed(2));
                }
            }
        }
        x--;
    });
    $(document).on("change blur keyup keypress keydown", ".billtransactions_transaction_amount", function() {
        if (parseFloat($('.billtransactions_transaction_amount').val()) > parseFloat($(
                '.billtransactions_due_amount').val())) {
            $(".billtransactions_transaction_amount").val(0);
        } else {
            if ($(".billtransactions_transaction_amount").val().length === 0) {
                $(".billtransactions_due_amount").val($(".display_due_amount").val());
            } else if ($(".billtransactions_transaction_amount").val()) {
                var hidden_due = $(".hidden_due").val();
                var billtransactions_transaction_amount = $(".billtransactions_transaction_amount").val();
                var due_amount = parseFloat(hidden_due) - parseFloat(
                    billtransactions_transaction_amount);
                $(".billtransactions_due_amount").val(due_amount.toFixed(2));
            }
        }
    });
</script>
