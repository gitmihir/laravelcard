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
        $(".bill_due_amount").val(final_bill_amount.toFixed(2));
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
            var price = $(this)
                .closest(".parentchild")
                .find(".product_price")
                .val();
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
                $(".bill_due_amount").val(final_bill_amount.toFixed(2));
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
    $(".bill_due_amount").val(final_bill_amount.toFixed(2));

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
        $(".bill_amount").val(final_bill_amount.toFixed(2));
        $(".bill_due_amount").val(final_bill_amount.toFixed(2));
    }
});
$(".viewnotemodal").click(function () {
    $(".transaction_note").html("");
    var noteattr = $(this).attr("noteattr");
    $(".transaction_note").html(noteattr);
});
//$('[data-toggle="tooltip"]').tooltip();
