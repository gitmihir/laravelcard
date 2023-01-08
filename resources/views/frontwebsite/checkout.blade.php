@include('frontwebsite.frontheader')
@php
    $shippingdata = App\Models\CMS::all();
@endphp
<form action="/createorder" method="POST" class="form-group">
    @csrf
    <div class="Inner-page">
        <div class="shop-page">
            <!-- end full width banner -->
            <div class="checkout-page cart-page pt-50 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="checkout-area">
                                <div id="accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading active">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-parent="#accordion"
                                                    data-toggle="collapse" href="#collapse-checkout-option">Checkout
                                                    Options
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-checkout-option-1"
                                            class="panel-collapse checkout-box collapse show">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered ">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Description</th>
                                                                <th>Qty.</th>
                                                                <th>Price</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $total = 0; ?>
                                                            @if (session('cart'))
                                                                @foreach (session('cart') as $id => $details)
                                                                    <?php
                                                                    
                                                                    $total += $details['price'] * $details['quantity']; ?>
                                                                    <tr>
                                                                        <td style="width: 20%;">
                                                                            <div class="cart-page-img">
                                                                                <a
                                                                                    href="{{ url('product-detail/' . $id) }}"><img
                                                                                        style="width: 50%;"
                                                                                        src="{{ asset('/images/productimages/' . $details['photo']) }}"
                                                                                        alt="{{ $details['name'] }}"></a>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="cart-pa-title">
                                                                                <a
                                                                                    href="{{ url('product-detail/' . $id) }}">{{ $details['name'] }}</a>
                                                                                <p>
                                                                                    @if (isset($details['ptype']))
                                                                                        {{ $details['ptype'] }}
                                                                                    @endif
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="qit-box">
                                                                                <div class="input-group">
                                                                                    <input type="number"
                                                                                        id="quantity{{ $id }}"
                                                                                        class="form-control input-number quantity"
                                                                                        value="{{ $details['quantity'] }}"
                                                                                        min="0">
                                                                                    <input type="hidden" class="ids"
                                                                                        value="{{ $id }}">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="cart-price text-center">
                                                                                <span>${{ $details['price'] * $details['quantity'] }}</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="cart-p-edit">
                                                                                <button type="button"
                                                                                    class="btn btn-info btn-sm update-cart"
                                                                                    data-id="{{ $id }}"><i
                                                                                        class="fa fa-refresh"></i></button>
                                                                                <button
                                                                                    class="btn btn-danger btn-sm remove-from-cart"
                                                                                    data-id="{{ $id }}"><i
                                                                                        class="fa fa-trash-o"></i></button>
                                                                            </div>
                                                                        </td>

                                                                        {{-- <td>
                                                                        <div class="cart-price text-center">
                                                                            <span>${{ $details['price'] }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="cart-price text-center">
                                                                            <span>${{ $details['price'] * $details['quantity'] }}</span>
                                                                        </div>
                                                                    </td> --}}
                                                                    </tr>
                                                                    <input type="hidden" name="product_ids[]"
                                                                        value="{{ $id }}">
                                                                    <input type="hidden" name="product_quantities[]"
                                                                        value="{{ $details['quantity'] }}">
                                                                    <input type="hidden" name="product_prices[]"
                                                                        value="{{ $details['price'] * $details['quantity'] }}">
                                                                @endforeach
                                                            @endif

                                                        </tbody>
                                                    </table>
                                                    <div class="shipping-buttons">
                                                        <div class="cart-page-btn">
                                                            <div class="button pull-left">
                                                                <a href="{{ url('products') }}"
                                                                    class="btn btn-button">SHOP
                                                                    MORE </a>
                                                            </div>
                                                            <div class="button pull-right">
                                                                <button
                                                                    class="btn btn-button update-shopping-cart">UPDATE
                                                                    CART</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end of .table-responsive-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle collapsed" data-parent="#accordion"
                                                    data-toggle="collapse" href="#collapse-payment-address">
                                                    Billing Details
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-payment-address-1"
                                            class="panel-collapse checkout-box collapse show">
                                            <div class="panel-body">
                                                <div class="form-billing-details">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" name="sg_business_name"
                                                                    placeholder="Business Name" required=""
                                                                    class="form-control sg_business_name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" name="sg_full_name"
                                                                    placeholder="Full Name" required=""
                                                                    class="form-control sg_full_name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Address"
                                                                    name="sg_business_address" required=""
                                                                    class="form-control sg_business_address" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" placeholder="GSTIN NO"
                                                                    name="sg_business_GST_number" required=""
                                                                    class="form-control sg_business_GST_number" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="email" name="sg_business_email"
                                                                    placeholder="Email" required=""
                                                                    class="form-control sg_business_email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="number" name="sg_business_phone"
                                                                    placeholder="Phone Number" required=""
                                                                    class="form-control sg_business_phone" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label shippinglabel"
                                                            for="form2Example3c">
                                                            Shipping Details
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input me-2 sameasbilling"
                                                            type="checkbox" value="" id="sameasbilling" />
                                                        <label class="form-check-label" for="sameasbilling">
                                                            Same as billing
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapse-shipping-address-1"
                                            class="panel-collapse checkout-box collapse show">
                                            <div class="panel-body">
                                                <div class="form-billing-details">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" name="sg_s_name"
                                                                    placeholder="First Name" required=""
                                                                    class="form-control sg_s_name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Address"
                                                                    name="sg_s_address" required=""
                                                                    class="form-control sg_s_address" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="email" placeholder="Email"
                                                                    name="sg_s_email" required=""
                                                                    class="form-control sg_s_email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="number" name="sg_s_phone"
                                                                    placeholder="Phone Number" required=""
                                                                    class="form-control sg_s_phone" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="iphone">
                                <header class="header">
                                    <h1>Checkout</h1>
                                </header>
                                <div class="form" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control coupon_code" name="coupon_code"
                                            placeholder="Apply Coupon Code" />
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-secondary coupon_code_check"
                                                type="button">
                                                Apply
                                            </button>
                                        </div>
                                    </div>
                                    <div class="messageblock">Please enter coupon code!</div>
                                    <div class="successblock">Coupon code matched!</div>
                                    <div class="failureblock">Coupon code does not Match! Please try different coupon
                                        code
                                    </div>
                                    <div class="double-ringed"></div>

                                    <div>
                                        <h2>Shopping Bill</h2>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Shipping fee</td>
                                                    <td align="right">&#8377;
                                                        @foreach ($shippingdata as $shippingcharge)
                                                            {{ $shippingcharge->sg_shipping_rate }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Price Total</td>
                                                    <td align="right">&#8377;{{ $total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Discount</td>
                                                    <td align="right" class="discount_amount">&#8377;0</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>Total</td>
                                                    <td align="right" class="grand_total">&#8377;0</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div>

                                        <input type="hidden" class="coupon_ID" name="coupon_ID">
                                        <input type="hidden" class="franchise_ID" name="franchise_ID">
                                        <input type="hidden" class="return_coupon_code" name="return_coupon_code">
                                        <input type="hidden" class="coupon_discount" name="coupon_discount">

                                        <input type="hidden" class="shipping_fee" name="shipping_fee"
                                            value="0">
                                        <input type="hidden" class="before_discount_total"
                                            name="before_discount_total" value="{{ $total }}">
                                        <input type="hidden" class="discounted_price" name="discounted_price">
                                        <input type="hidden" class="after_discount_total"
                                            name="after_discount_total">

                                        <button class="button button--full" type="submit">
                                            <svg class="icon">
                                                <use xlink:href="#icon-shopping-bag" />
                                            </svg>Buy Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('frontwebsite.frontfooter')
