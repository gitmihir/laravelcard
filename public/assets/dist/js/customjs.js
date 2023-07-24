function bill_amount_calculate() {
  var select = $(this);
  var quantity = $(".product_quantity").val();
  var price = $(".product_price").val();
  if (price >= 0 && quantity >= 0) {
    var total_bill_amount = price * quantity;
    $(".parentchild")
      .closest(".parentchild")
      .find(".product_total_amount")
      .val(total_bill_amount.toFixed(2));
    //$('.parentchild').closest('.parentchild').find('input').val(total_bill_amount.toFixed(2));
    var final_bill_amount = 0;
    $("input[name='product_total_amount[]").each(function () {
      final_bill_amount += +$(this).val();
    });
    $(".bill_amount").val(final_bill_amount.toFixed(2));

    var couponcodeval = $(".coupon_discount").val();
    $(".sg_order_base_price").val(final_bill_amount);

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
    if (couponcodeval.length === 0) {
    } else {
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
}

var url = window.location.href;
$('.nav li a[href="' + window.location.href + '"]').addClass("active");

$(".nav-item").removeClass("menu-open");
if ($('.nav li a[href="' + window.location.href + '"').hasClass("active")) {
  $('.nav li a[href="' + window.location.href + '"')
    .parent()
    .parent()
    .parent()
    .addClass("menu-open");
}

$(document).on("click", ".deleteExpense", function () {
  var expenseurl = $(this).attr("delete-url-id");
  $(".appendexpenseurl").attr("href", expenseurl);
});

$(document).on("click", ".deletemodal", function () {
  var deleteurl = $(this).attr("delete-url-id");
  $(".appendurl").attr("href", deleteurl);
});
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});
var template = $("#hidden-template").html();
$(document).on("click", ".add_more_product", function () {
  $(".targethtml").append(template);
});

$(document).on("click", ".remove_product", function () {
  $(this).closest(".duplicatehtml").remove();
});

$(document).on("change", ".product_name", function () {
  var select = $(this);
  var urlval = $(this).find(":selected").attr("product-url");
  var productid = $(this).find(":selected").attr("product-id");
  $.ajax({
    type: "GET",
    context: this,
    data: {
      productid: productid,
    },
    url: urlval,
    success: function (result) {
      select.closest(".parentchild").find(".product_price").val(result);
      bill_amount_calculate();
      select.closest(".parentchild").find(".product_id").val(productid);

      var getattr = $(this).attr("data-row-id");
      var quantity = $(".product_quantity_edit-" + getattr).val();
      var price = $(this).closest(".parentchild").find(".product_price").val();
      if (price >= 0 && quantity >= 0) {
        var total_bill_amount = price * quantity;
        $(this)
          .closest(".parentchild")
          .find(".product_total_amount_edit-" + getattr)
          .val(total_bill_amount.toFixed(2));

        var final_bill_amount = 0;
        $("input[name='product_total_amount[]").each(function () {
          final_bill_amount += +$(this).val();
        });
        $(".bill_amount").val(final_bill_amount.toFixed(2));
        var couponcodeval = $(".coupon_discount").val();
        $(".sg_order_base_price").val(final_bill_amount);

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
        if (couponcodeval.length === 0) {
        } else {
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
    },
  });
});

$(document).on(
  "change click blur keyup keypress keydown",
  ".product_name, .product_quantity",
  function () {
    bill_amount_calculate();
  }
);

$(document).on(
  "change click blur keyup keypress keydown",
  ".billtransactions_transaction_amount",
  function () {
    var bta = $(".billtransactions_transaction_amount").val();
    var bda = $(".billtransactions_due_amount").val();
    var dda = $(".display_due_amount").val();

    if ($(".billtransactions_transaction_amount").val()) {
      var hidden_due = $(".hidden_due").val();
      var billtransactions_transaction_amount = $(
        ".billtransactions_transaction_amount"
      ).val();
      var due_amount =
        parseFloat(hidden_due) -
        parseFloat(billtransactions_transaction_amount);
      $(".billtransactions_due_amount").val(due_amount.toFixed(2));
    }
  }
);

var x = 1;
$(document).on("click", ".remove_product_from_edit", function (e) {
  e.preventDefault();
  $(this).closest(".parentchild").remove();

  var final_bill_amount = 0;
  $("input[name='product_total_amount[]").each(function () {
    final_bill_amount += +$(this).val();
  });
  $(".bill_amount").val(final_bill_amount.toFixed(2));
  var couponcodeval = $(".coupon_discount").val();
  var shipping_rate = $(".shipping_rate").val();

  var total_amount_after_shipping_added =
    parseFloat(shipping_rate) + parseFloat(total_amount_after_discount);
  $(".after_discount_total").val(total_amount_after_shipping_added.toFixed(2));

  if (couponcodeval.length === 0) {
  } else {
    var discount_amount = final_bill_amount * (couponcodeval / 100);

    $(".discounted_price").val(discount_amount);

    var total_amount_after_discount =
      final_bill_amount - final_bill_amount * (couponcodeval / 100);

    var total_amount_after_shipping_added =
      parseFloat(shipping_rate) + parseFloat(total_amount_after_discount);

    $(".after_discount_total").val(
      total_amount_after_shipping_added.toFixed(2)
    );
  }

  x--;
});

$(document).on("click", "input[name='product_quantity[]']", function () {
  var getattr = $(this).attr("data-row-id");
  var quantity = $(this).val();
  var price = $(this).closest(".parentchild").find(".product_price").val();
  if (price >= 0 && quantity >= 0) {
    var total_bill_amount = price * quantity;
    $(this)
      .closest(".parentchild")
      .find(".product_total_amount_edit-" + getattr)
      .val(total_bill_amount.toFixed(2));

    var final_bill_amount = 0;
    $("input[name='product_total_amount[]").each(function () {
      final_bill_amount += +$(this).val();
    });
    $(".sg_order_base_price").val(final_bill_amount);
    var couponcodeval = $(".coupon_discount").val();

    $(".sg_order_base_price").val(final_bill_amount);
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
    if (couponcodeval.length === 0) {
    } else {
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
$(".viewnotemodal").click(function () {
  $(".transaction_note").html("");
  var noteattr = $(this).attr("noteattr");
  $(".transaction_note").html(noteattr);
});
//$('[data-toggle="tooltip"]').tooltip();
var SITEURL = "{{ URL::to(" / ") }}";
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});
$(".orderstatus").hide();
$("body").on("click", ".ordernow", function (e) {
  $(".orderstatus").hide();
  /* Store Order Details */
  var ajaxurlforofforder = $(".ajaxurlforofforder").val();
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
  var coupon_ID = $(".coupon_ID").val();
  var franchise_ID = $(".franchise_ID").val();
  var return_coupon_code = $(".return_coupon_code").val();
  var coupon_discount = $(".coupon_discount").val();
  var shipping_fee = $(".shipping_rate").val();
  var before_discount_total = $(".bill_amount").val();
  var discounted_price = $(".discounted_price").val();
  var after_discount_total = $(".after_discount_total").val();
  var order_id_for_status = $(".order_id_for_status").val();
  var payment_remark = $(".payment_remark").val();
  var sg_order_status = $(".sg_order_status").val();
  var sg_order_base_price = $(".sg_order_base_price").val();

  var sg_s_state = $(".sg_s_state").val();
  var Order_status = $(".Order_status").val();
  var sg_state = $(".sg_state").val();

  var sg_CGST = $(".sg_CGST").val();
  var sg_SGST = $(".sg_SGST").val();
  var sg_IGST = $(".sg_IGST").val();

  var product_ids = [];
  $("input[name='product_ids[]']").each(function () {
    product_ids.push($(this).val());
  });

  var product_quantities = [];
  $("input[name='product_quantities[]']").each(function () {
    product_quantities.push($(this).val());
  });

  var product_prices = [];
  $("input[name='product_total_amount[]']").each(function () {
    product_prices.push($(this).val());
  });

  if (
    sg_full_name.length === 0 &&
    sg_business_name.length === 0 &&
    sg_business_address.length === 0 &&
    sg_business_GST_number.length === 0 &&
    sg_business_email.length === 0 &&
    sg_business_phone.length === 0
  ) {
    alert("Please Fillup all billing details before payment!");
  } else {
    $.ajax({
      url: ajaxurlforofforder,
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
        sg_s_state: sg_s_state,
        Order_status: Order_status,
        sg_state: sg_state,
        coupon_ID: coupon_ID,
        franchise_ID: franchise_ID,
        return_coupon_code: return_coupon_code,
        coupon_discount: coupon_discount,
        shipping_fee: shipping_fee,
        before_discount_total: before_discount_total,
        discounted_price: discounted_price,
        after_discount_total: after_discount_total,
        product_ids: product_ids,
        product_quantities: product_quantities,
        product_prices: product_prices,
        order_id_for_status: order_id_for_status,
        payment_remark: payment_remark,
        sg_order_status: sg_order_status,
        sg_CGST: sg_CGST,
        sg_SGST: sg_SGST,
        sg_IGST: sg_IGST,
        sg_order_base_price: sg_order_base_price,
      },
      success: function (response) {
        $(".orderstatus").show();
        window.location.href = "/orderoffline/allorderoffline";
      },
    });
  }
});
$(".sameasbilling").change(function () {
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

$(".coupon_code_check").click(function () {
  var couponcheckurl = $(".couponcheckurl").val();
  $(".double-ringed").show();
  var coupon_code = $(".coupon_code").val();
  $.ajax({
    url: couponcheckurl,
    method: "GET",
    data: {
      coupon_code: coupon_code,
    },
    success: function (response) {
      $(".double-ringed").hide();
      if (response === "0") {
        $(".messageblock").show();
        $(".successblock").hide();
        $(".failureblock").hide();
      } else if (response === "1") {
        $(".failureblock").show();
        $(".messageblock").hide();
        $(".successblock").hide();
      } else {
        $(".successblock").show();
        $(".failureblock").hide();
        $(".messageblock").hide();
        var coupondata = response.split("~");
        $(".coupon_ID").val(coupondata[0]);
        $(".franchise_ID").val(coupondata[1]);
        $(".return_coupon_code").val(coupondata[2]);
        $(".coupon_discount").val(coupondata[3]);
        var bill_amount = $(".bill_amount").val();
        var discount_amount = bill_amount * (coupondata[3] / 100);
        var final_amount = bill_amount - bill_amount * (coupondata[3] / 100);
        $(".discounted_price").val(discount_amount);
        var amt = parseFloat(final_amount);

        $(".buy_now").attr("data-amount", amt);

        $(".sg_order_base_price").val(
          parseFloat(bill_amount) - parseFloat(discount_amount)
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
        if (couponcodeval.length === 0) {
        } else {
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
    },
  });
});
$(".emailerror").hide();
$(".availablemsg").hide();
$(".btnclass").attr("disabled", "disabled");
$(".sg_franchise_email").on("keyup keypress blur change", function () {
  var ajaxurlforemailcheck = $(".ajaxurlforemailcheck").val();
  var sg_franchise_email = $(".sg_franchise_email").val();
  $.ajax({
    url: ajaxurlforemailcheck,
    method: "GET",
    data: {
      sg_franchise_email: sg_franchise_email,
    },
    success: function (response) {
      if (response == 1) {
        $(".emailerror").show();
        $(".availablemsg").hide();
        $(".btnclass").attr("disabled", "disabled");
      } else {
        $(".emailerror").hide();
        $(".availablemsg").show();
        $(".btnclass").removeAttr("disabled");
      }
    },
  });
});
$(".viewserviceimage").on("click", function () {
  var imagename = $(this).attr("service-image");
  $(".service-image img").attr("src", imagename);
});
$(".sg_CGST_class").hide();
$(".sg_SGST_class").hide();
$(".sg_IGST_class").hide();

var sg_state = $(".sg_state").val();
if (sg_state === "Gujarat") {
  $(".sg_CGST_class").show();
  $(".sg_SGST_class").show();
  $(".sg_IGST_class").hide();
}
if (sg_state !== "Gujarat") {
  $(".sg_CGST_class").hide();
  $(".sg_SGST_class").hide();
  $(".sg_IGST_class").show();
}
$(".sg_state").on("change", function () {
  var sg_order_base_price = $(".sg_order_base_price").val();
  var stateval = $(this).find(":selected").val();
  if (stateval === "Gujarat") {
    $(".sg_CGST_class").show();
    $(".sg_SGST_class").show();
    $(".sg_IGST_class").hide();
    if (sg_order_base_price) {
      var total_amount_after_tax = sg_order_base_price * 0.09;
      $(".sg_CGST").val(total_amount_after_tax.toFixed(2));
      $(".sg_SGST").val(total_amount_after_tax.toFixed(2));
    }
  } else {
    $(".sg_CGST_class").hide();
    $(".sg_SGST_class").hide();
    $(".sg_IGST_class").show();
    if (sg_order_base_price) {
      var total_amount_after_tax = sg_order_base_price * 0.18;
      $(".sg_IGST").val(total_amount_after_tax.toFixed(2));
    }
  }
});

$(".delete_image").on("click", function () {
  var ajaxurlforremoveimage = $(".ajaxurlforremoveimage").val();
  var sg_file_name = $(this).attr("image-attr");
  var imagedbname = $(this).attr("image-db-name");
  var imagefoldername = $(this).attr("image-folder-name");
  $.ajax({
    url: ajaxurlforremoveimage,
    method: "GET",
    data: {
      sg_file_name: sg_file_name,
      imagedbname: imagedbname,
      imagefoldername: imagefoldername,
    },
    success: function (response) {
      if (response) {
        $("." + response).hide();
      } else {
        $(".hidediv").html(
          "There is something wrong with delete, please try again later!"
        );
      }
    },
  });
});
