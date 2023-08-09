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
                <div class="containersp"> <!--There's the container that centers it-->
                    <div class="spinner-frame"> <!--The background-->
                        <div class="spinner-cover"></div> <!--The Foreground-->
                        <div class="spinner-bar"></div> <!--and The Spinny thing-->
                    </div>
                </div>
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
                                                                                <span>&#8377;{{ $details['price'] * $details['quantity'] }}</span>
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
                                                                <input type="text" onblur="validateInputText(this);"
                                                                    name="sg_business_name" placeholder="Business Name"
                                                                    required=""
                                                                    class="form-control sg_business_name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" onblur="validateInputText(this);"
                                                                    name="sg_full_name" placeholder="Full Name *"
                                                                    required="" class="form-control sg_full_name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Address *"
                                                                    name="sg_business_address" required=""
                                                                    class="form-control sg_business_address" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    onblur="validateGSTNumber(this);"
                                                                    placeholder="GSTIN NO"
                                                                    name="sg_business_GST_number" required=""
                                                                    class="form-control sg_business_GST_number" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="email" onblur="validateEmail(this);"
                                                                    name="sg_business_email" placeholder="Email *"
                                                                    required=""
                                                                    class="form-control sg_business_email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    onblur="validatePhoneNumber(this);"
                                                                    name="sg_business_phone"
                                                                    placeholder="Phone Number *" required=""
                                                                    class="form-control sg_business_phone" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <select onchange="requiredfield(this);"
                                                                    name="sg_state"
                                                                    class="form-control sg_state statechangecalculation">
                                                                    <option value="">Select State</option>
                                                                    <option value="Andhra Pradesh">Andhra Pradesh
                                                                    </option>
                                                                    <option value="Andaman and Nicobar Islands">Andaman
                                                                        and Nicobar Islands</option>
                                                                    <option value="Arunachal Pradesh">Arunachal Pradesh
                                                                    </option>
                                                                    <option value="Assam">Assam</option>
                                                                    <option value="Bihar">Bihar</option>
                                                                    <option value="Chandigarh">Chandigarh</option>
                                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                                    <option value="Dadar and Nagar Haveli">Dadar and
                                                                        Nagar Haveli</option>
                                                                    <option value="Daman and Diu">Daman and Diu
                                                                    </option>
                                                                    <option value="Delhi">Delhi</option>
                                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                                    <option value="Puducherry">Puducherry</option>
                                                                    <option value="Goa">Goa</option>
                                                                    <option value="Gujarat">Gujarat</option>
                                                                    <option value="Haryana">Haryana</option>
                                                                    <option value="Himachal Pradesh">Himachal Pradesh
                                                                    </option>
                                                                    <option value="Jammu and Kashmir">Jammu and Kashmir
                                                                    </option>
                                                                    <option value="Jharkhand">Jharkhand</option>
                                                                    <option value="Karnataka">Karnataka</option>
                                                                    <option value="Kerala">Kerala</option>
                                                                    <option value="Madhya Pradesh">Madhya Pradesh
                                                                    </option>
                                                                    <option value="Maharashtra">Maharashtra</option>
                                                                    <option value="Manipur">Manipur</option>
                                                                    <option value="Meghalaya">Meghalaya</option>
                                                                    <option value="Mizoram">Mizoram</option>
                                                                    <option value="Nagaland">Nagaland</option>
                                                                    <option value="Odisha">Odisha</option>
                                                                    <option value="Punjab">Punjab</option>
                                                                    <option value="Rajasthan">Rajasthan</option>
                                                                    <option value="Sikkim">Sikkim</option>
                                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                                    <option value="Telangana">Telangana</option>
                                                                    <option value="Tripura">Tripura</option>
                                                                    <option value="Uttar Pradesh">Uttar Pradesh
                                                                    </option>
                                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                                    <option value="West Bengal">West Bengal</option>
                                                                </select>
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
                                                                <input type="text"
                                                                    onblur="validateInputText(this);" name="sg_s_name"
                                                                    placeholder="First Name *" required=""
                                                                    class="form-control sg_s_name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Address *"
                                                                    name="sg_s_address" required=""
                                                                    class="form-control sg_s_address" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="email" onblur="validateEmail(this);"
                                                                    placeholder="Email *" name="sg_s_email"
                                                                    required="" class="form-control sg_s_email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    onblur="validatePhoneNumber(this);"
                                                                    name="sg_s_phone" placeholder="Phone Number *"
                                                                    required="" class="form-control sg_s_phone" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <select onchange="requiredfield(this);"
                                                                    name="sg_s_state" id="sg_s_state"
                                                                    class="form-control sg_s_state">
                                                                    <option value="">Select State</option>
                                                                    <option value="Andhra Pradesh">Andhra Pradesh
                                                                    </option>
                                                                    <option value="Andaman and Nicobar Islands">Andaman
                                                                        and Nicobar Islands</option>
                                                                    <option value="Arunachal Pradesh">Arunachal Pradesh
                                                                    </option>
                                                                    <option value="Assam">Assam</option>
                                                                    <option value="Bihar">Bihar</option>
                                                                    <option value="Chandigarh">Chandigarh</option>
                                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                                    <option value="Dadar and Nagar Haveli">Dadar and
                                                                        Nagar Haveli</option>
                                                                    <option value="Daman and Diu">Daman and Diu
                                                                    </option>
                                                                    <option value="Delhi">Delhi</option>
                                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                                    <option value="Puducherry">Puducherry</option>
                                                                    <option value="Goa">Goa</option>
                                                                    <option value="Gujarat">Gujarat</option>
                                                                    <option value="Haryana">Haryana</option>
                                                                    <option value="Himachal Pradesh">Himachal Pradesh
                                                                    </option>
                                                                    <option value="Jammu and Kashmir">Jammu and Kashmir
                                                                    </option>
                                                                    <option value="Jharkhand">Jharkhand</option>
                                                                    <option value="Karnataka">Karnataka</option>
                                                                    <option value="Kerala">Kerala</option>
                                                                    <option value="Madhya Pradesh">Madhya Pradesh
                                                                    </option>
                                                                    <option value="Maharashtra">Maharashtra</option>
                                                                    <option value="Manipur">Manipur</option>
                                                                    <option value="Meghalaya">Meghalaya</option>
                                                                    <option value="Mizoram">Mizoram</option>
                                                                    <option value="Nagaland">Nagaland</option>
                                                                    <option value="Odisha">Odisha</option>
                                                                    <option value="Punjab">Punjab</option>
                                                                    <option value="Rajasthan">Rajasthan</option>
                                                                    <option value="Sikkim">Sikkim</option>
                                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                                    <option value="Telangana">Telangana</option>
                                                                    <option value="Tripura">Tripura</option>
                                                                    <option value="Uttar Pradesh">Uttar Pradesh
                                                                    </option>
                                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                                    <option value="West Bengal">West Bengal</option>
                                                                </select>
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
                                <div class="form">
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
                                    <div class="removecode">
                                        <p class="removecoupon" style="cursor: pointer;">Remove Coupon code</p>
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
                                            <tr>
                                                <th align="left">Price Total</th>
                                                <td align="right" class="bill_amount">&#8377;{{ $total }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th align="left">Discount</th>
                                                <td align="right" class="discounted_price_display">&#8377;0</td>
                                            </tr>
                                            <tr>
                                                <th align="left">After Discount Price</th>
                                                <td align="right" class="sg_order_base_price_display">
                                                    &#8377;{{ $total }}</td>
                                                <input type="hidden" name="sg_order_base_price"
                                                    class="sg_order_base_price" value="{{ $total }}">
                                            </tr>
                                            <tr class="sg_CGST_class">
                                                <th align="left">CGST @ 9%</th>
                                                <td align="right" class="sg_CGST">&#8377;0</td>
                                                <input type="hidden" class="cgst" name="sg_CGST">
                                            </tr>
                                            <tr class="sg_SGST_class">
                                                <th align="left">SGST @ 9%</th>
                                                <td align="right" class="sg_SGST">&#8377;0</td>
                                                <input type="hidden" class="sgst" name="sg_SGST">
                                            </tr>
                                            <tr class="sg_IGST_class">
                                                <th align="left">IGST @ 18%</th>
                                                <td align="right" class="sg_IGST">&#8377;0</td>
                                                <input type="hidden" class="igst" name="sg_IGST">
                                            </tr>
                                            <tr>
                                                <th align="left">Grand Total</th>
                                                <td align="right" class="grandTotalafterGstInclusion"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div>
                                        <input type="hidden" value="Order placed" class="Order_status"
                                            name="Order_status">
                                        <input type="hidden" class="coupon_ID" name="coupon_ID">
                                        <input type="hidden" class="franchise_ID" name="franchise_ID">
                                        <input type="hidden" class="return_coupon_code" name="return_coupon_code">
                                        <input type="hidden" class="coupon_discount" name="coupon_discount">
                                        <input type="hidden" class="payment_remark" value="0"
                                            name="payment_remark">
                                        <input type="hidden" class="shipping_fee" name="shipping_fee"
                                            value="0">
                                        <input type="hidden" class="before_discount_total"
                                            name="before_discount_total" value="{{ $total }}">
                                        <input type="hidden" class="discounted_price" name="discounted_price">
                                        <input type="hidden" class="after_discount_total"
                                            name="after_discount_total">
                                        <input type="hidden" class="order_id_for_status" name="order_id_for_status"
                                            value="<?php echo time(); ?>">
                                        <input type="hidden" class="sg_order_status" name="sg_order_status"
                                            value="0">
                                        <button type="button" data-amount="" data-current-method="razorpay"
                                            data-id="<?php echo time(); ?>" class="button button--full buy_now mb-3">
                                            <svg class="icon">
                                                <use xlink:href="#icon-shopping-bag" />
                                            </svg>Pay with Razor Pay
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
