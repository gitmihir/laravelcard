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
$(document).on("click", ".deletecardorder", function () {
  var deleteorderurl = $(this).attr("delete-url-id");
  $(".appendurl").attr("href", deleteorderurl);
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
$(document).on("change", ".product_name", function () {
  $(".ordernow").removeAttr("disabled");
  $(".errorclass").remove();
});
$(document).on("change", ".sg_state", function () {
  $(".ordernow").removeAttr("disabled");
  $(".errorclass").remove();
});
$(document).on("change", ".sg_state", function () {
  $(".ordernow").removeAttr("disabled");
  $(".errorclass").remove();
});
$(document).on("change", ".sg_s_state", function () {
  $(".ordernow").removeAttr("disabled");
  $(".errorclass").remove();
});
$(document).on("change", ".product_quantity", function () {
  $(".ordernow").removeAttr("disabled");
  $(".errorclass").remove();
});
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
$(".containersp").hide();
$(".orderstatus").hide();
$(".ordernow").attr("disabled", "disabled");
$("body").on("click", ".ordernow", function (e) {
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
  var OfflineOrder = "OfflineOrder";

  if (
    $(".product_name").val().length != 0 &&
    $(".product_quantity").val() !== ""
  ) {
    $(".ordernow").removeAttr("disabled");
  }
  if (
    sg_full_name.length === 0 ||
    sg_business_address.length === 0 ||
    sg_business_GST_number.length === 0 ||
    sg_business_email.length === 0 ||
    sg_business_phone.length === 0 ||
    sg_s_email.length === 0 ||
    sg_s_phone.length === 0 ||
    $(".product_name").val().length === 0 ||
    $(".product_quantity").val() === "" ||
    $(".payment_remark").val() === "" ||
    Order_status === ""
  ) {
    if (sg_full_name.length === 0) {
      $(".sg_full_name").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (sg_business_address.length === 0) {
      $(".sg_business_address").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (sg_business_GST_number.length === 0) {
      $(".sg_business_GST_number").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (sg_business_email.length === 0) {
      $(".sg_business_email").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (sg_business_phone.length === 0) {
      $(".sg_business_phone").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (sg_s_email.length === 0) {
      $(".sg_s_email").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (sg_s_phone.length === 0) {
      $(".sg_s_phone").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (sg_s_name.length === 0) {
      $(".sg_s_name").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (sg_s_address.length === 0) {
      $(".sg_s_address").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }

    if (sg_state === "") {
      $(".sg_state").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (sg_s_state === "") {
      $(".sg_s_state").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if ($(".product_name").val().length === 0) {
      $(".product_name").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if ($(".product_quantity").val() === "") {
      $(".product_quantity").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if ($(".payment_remark").val() === "") {
      $(".payment_remark").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    if (Order_status === "") {
      $(".Order_status").after(
        "<div class='errorclass'>This field is required.</div>"
      );
    }
    $(".ordernow").attr("disabled", "disabled");
  } else {
    $(".ordernow").removeAttr("disabled");
    $(".containersp").show();
    $(".orderstatus").hide();
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
        OfflineOrder: OfflineOrder,
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
$(".removecode").hide();
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
        $(".removecode").show();
        $(".coupon_code").attr("readonly", "readonly");
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
        var final_bill_amount = 0;
        $("input[name='product_total_amount[]").each(function () {
          final_bill_amount += +$(this).val();
        });
        $(".bill_amount").val(final_bill_amount.toFixed(2));
        $(".sg_order_base_price").val(final_bill_amount.toFixed(2));

        var sg_order_base_price = $(".sg_order_base_price").val();
        var couponcodeval = $(".coupon_discount").val();
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
$(".removecoupon").on("click", function () {
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
  $(".sg_order_base_price").val(bill_amount);
  var final_bill_amount = 0;
  $("input[name='product_total_amount[]").each(function () {
    final_bill_amount += +$(this).val();
  });
  $(".bill_amount").val(final_bill_amount.toFixed(2));
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
});

/* Javascript Validations */

function validatePhoneNumber(numberval) {
  if (!numberval.value.match(/^[0-9]{10}$/)) {
    $(".errorclass_" + numberval.name).remove();
    $("input[name=" + numberval.name + "]").after(
      '<div class="errorclass_' +
        numberval.name +
        '">Please Enter a Valid Phone Number</div>'
    );
    $("input[name=" + numberval.name + "]").addClass("errorborderclass");
    numberval.value = "";
    $(".disabledclass").attr("disabled", "disabled");
    $(".ordernow").attr("disabled", "disabled");
  } else {
    $("input[name=" + numberval.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + numberval.name).remove();
    $(".disabledclass").removeAttr("disabled");
    $(".ordernow").removeAttr("disabled");
    $(".errorclass").remove();
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
  } else if (textval.value === "") {
    $(".errorclass_" + textval.name).remove();
    $("input[name=" + textval.name + "]").after(
      '<div class="errorclass_' +
        textval.name +
        '">This field is required.</div>'
    );
    $("input[name=" + textval.name + "]").addClass("errorborderclass");
    $(".buy_now").attr("disabled", "disabled");
    $(".ordernow").attr("disabled", "disabled");
  } else {
    $("input[name=" + textval.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + textval.name).remove();
    $(".buy_now").removeAttr("disabled");
    $(".ordernow").removeAttr("disabled");
    $(".errorclass").remove();
  }
}
function validateEmail(emailval) {
  if (emailval.value === "") {
    $(".errorclass_" + emailval.name).remove();
    $("input[name=" + emailval.name + "]").after(
      '<div class="errorclass_' +
        emailval.name +
        '">This field is required.</div>'
    );
    $("input[name=" + emailval.name + "]").addClass("errorborderclass");
    $(".buy_now").attr("disabled", "disabled");
  } else if (!emailval.value.match(/^\S+@\S+\.\S+$/)) {
    $(".errorclass_" + emailval.name).remove();
    $(".errorclass").remove();
    $("input[name=" + emailval.name + "]").after(
      '<div class="errorclass_' +
        emailval.name +
        '">Please Enter a Valid Email!</div>'
    );
    $("input[name=" + emailval.name + "]").addClass("errorborderclass");
    emailval.value = "";
    $(".buy_now").attr("disabled", "disabled");
    $(".ordernow").attr("disabled", "disabled");
  } else {
    $("input[name=" + emailval.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + emailval.name).remove();
    $(".buy_now").removeAttr("disabled");
    $(".ordernow").removeAttr("disabled");
    $(".errorclass").remove();
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
    $(".disabledclass").attr("disabled", "disabled");
  } else {
    $("input[name=" + urlval.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + urlval.name).remove();
    $(".disabledclass").removeAttr("disabled");
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
    //$(".disabledclass").attr("disabled", "disabled");
  } else {
    $("input[name=" + imagedata.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + imagedata.name).remove();
    //$(".disabledclass").removeAttr("disabled");
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
    // $(".disabledclass").attr("disabled", "disabled");
  } else {
    $("input[name=" + imagedata.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + imagedata.name).remove();
    //$(".disabledclass").removeAttr("disabled");
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
    $(".disabledclass").attr("disabled", "disabled");
  } else {
    $("textarea[name=" + textdata.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + textdata.name).remove();
    $(".disabledclass").removeAttr("disabled");
    $(".ordernow").removeAttr("disabled");
    $(".errorclass").remove();
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
    $(".disabledclass").attr("disabled", "disabled");
  } else {
    $("input[name=" + textdata.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + textdata.name).remove();
    $(".disabledclass").removeAttr("disabled");
    $(".ordernow").removeAttr("disabled");
    $(".errorclass").remove();
  }
}
function requiredfield(field) {
  if (field.value === "") {
    $(".errorclass_" + field.name).remove();
    $("select[name=" + field.name + "]").after(
      '<div class="errorclass_' + field.name + '">This field is required.</div>'
    );
    $("select[name=" + field.name + "]").addClass("errorborderclass");
    $(".buy_now").attr("disabled", "disabled");
  } else {
    $("select[name=" + field.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + field.name).remove();
    $(".buy_now").removeAttr("disabled");
    $(".ordernow").removeAttr("disabled");
    $(".errorclass").remove();
  }
}
function requiredfield2(field) {
  if (field.value === "") {
    $(".errorclass_" + field.name).remove();
    $("select[name=" + field.name + "]").after(
      '<div class="errorclass">This field is required.</div>'
    );
    $("select[name=" + field.name + "]").addClass("errorborderclass");
    $(".buy_now").attr("disabled", "disabled");
    $(".ordernow").attr("disabled", "disabled");
  } else {
    $("select[name=" + field.name + "]").removeClass("errorborderclass");
    $(".errorclass").remove();
    $(".buy_now").removeAttr("disabled");
    $(".ordernow").removeAttr("disabled");
    $(".errorclass").remove();
  }
}
function requiredfieldproduct(field) {
  if (field.value === "") {
    $(".errorclass").remove();
    $(".validateclass").after(
      '<div class="errorclass">This field is required.</div>'
    );
    $(".validateclass").addClass("errorborderclass");
    $(".buy_now").attr("disabled", "disabled");
    $(".ordernow").attr("disabled", "disabled");
  } else {
    $(".validateclass").removeClass("errorborderclass");
    $(".errorclass").remove();
    $(".buy_now").removeAttr("disabled");
    $(".ordernow").removeAttr("disabled");
    $(".errorclass").remove();
  }
}
function requiredfieldqty(field) {
  if (field.value === "") {
    $(".errorclass").remove();
    $(".product_quantity").after(
      '<div class="errorclass">This field is required.</div>'
    );
    $(".product_quantity").addClass("errorborderclass");
    $(".buy_now").attr("disabled", "disabled");
    $(".ordernow").attr("disabled", "disabled");
  } else {
    $(".product_quantity").removeClass("errorborderclass");
    $(".errorclass").remove();
    $(".buy_now").removeAttr("disabled");
    $(".ordernow").removeAttr("disabled");
    $(".errorclass").remove();
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
$(".successmsg").hide();
$(".failmsg").hide();
$(".disablebtn").attr("disabled", "disabled");
function matchpassword(returnval) {
  let firstpassword = $(".firstpassword").val();
  if (returnval.value === firstpassword) {
    $(".disablebtn").removeAttr("disabled");
    $(".successmsg").show();
    $(".failmsg").hide();
  } else {
    $(".disablebtn").attr("disabled", "disabled");
    $(".successmsg").hide();
    $(".failmsg").show();
  }
}
function requiredfield3(field) {
  if (field.value === "") {
    $(".errorclass_" + field.name).remove();
    $("input[name=" + field.name + "]").after(
      '<div class="errorclass_' + field.name + '">This field is required.</div>'
    );
    $("input[name=" + field.name + "]").addClass("errorborderclass");
    $(".buy_now").attr("disabled", "disabled");
  } else {
    $(".errorclass").remove();
    $("select[name=" + field.name + "]").removeClass("errorborderclass");
    $(".errorclass_" + field.name).remove();
    $(".buy_now").removeAttr("disabled");
  }
}

$(".clicktoclearlead").click(function () {
  setTimeout(function () {
    var startdatec = $(".startdatec").val();
    var enddatec = $(".enddatec").val();
    if (startdatec.length === 0 && enddatec.length === 0) {
    } else {
      $(".startdatec").val("");
      $(".enddatec").val("");
    }
  }, 2000);
});
$(".clearorderdata").click(function () {
  setTimeout(function () {
    var startdatec = $(".sdate").val();
    var enddatec = $(".edate").val();
    if (startdatec.length === 0 && enddatec.length === 0) {
    } else {
      $(".sdate").val("");
      $(".edate").val("");
    }
  }, 2000);
});
