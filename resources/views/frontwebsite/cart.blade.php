{{-- @extends('layout') --}}

{{-- @section('title', 'Cart') --}}

{{-- @section('content') --}}
@include('frontwebsite.frontheader')
<div class="Inner-page">
    <!-- INNER PAGE HADDING -->

    <!-- END INNER PAGE HADDING -->
    <div class="shop-page">
        <div class="container">
            <div class="cart-page">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive pt-80">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Model</th>
                                        <th>Edit</th>
                                        <th>Qty.</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            <?php $total += $details['price'] * $details['quantity']; ?>
                                            <tr>
                                                <td style="width: 20%;">
                                                    <div class="cart-page-img">
                                                        <a href=""><img style="width: 20%;"
                                                                src="{{ asset('/images/productimages/' . $details['photo']) }}"
                                                                alt="{{ $details['name'] }}"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="cart-pa-title">
                                                        <a href="">{{ $details['name'] }}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="cart-product-id">
                                                        <span>product-23</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="cart-p-edit">
                                                        <button type="button" class="btn btn-info btn-sm update-cart"
                                                            data-id="{{ $id }}"><i
                                                                class="fa fa-refresh"></i></button>
                                                        <button class="btn btn-danger btn-sm remove-from-cart"
                                                            data-id="{{ $id }}"><i
                                                                class="fa fa-trash-o"></i></button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="qit-box">
                                                        <div class="input-group">
                                                            {{-- <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="quantity-left-minus btn btn-danger btn-number"
                                                                    data-type="minus" data-field="">
                                                                    <i class="icofont-minus"></i>
                                                                </button>
                                                            </span> --}}
                                                            <input type="number" id="quantity{{ $id }}"
                                                                name="quantity"
                                                                class="form-control input-number quantity"
                                                                value="{{ $details['quantity'] }}">
                                                            <input type="hidden" class="ids"
                                                                value="{{ $id }}">
                                                            {{-- <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="quantity-right-plus btn btn-success btn-number"
                                                                    data-type="plus" data-field="">
                                                                    <i class="icofont-plus"></i>
                                                                </button>
                                                            </span> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="cart-price text-center">
                                                        <span>${{ $details['price'] }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="cart-price text-center">
                                                        <span>${{ $details['price'] * $details['quantity'] }}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                            <div class="shipping-buttons">
                                <div class="cart-page-btn">
                                    <div class="button pull-left">
                                        <a href="{{ url('products') }}" class="btn btn-button">CONTINUE SHOPPING </a>
                                    </div>
                                    <div class="button pull-right">
                                        <button class="btn btn-button update-shopping-cart">UPDATE
                                            SHOPPING CART</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end of .table-responsive-->
                    </div>
                </div>
                <div class="cart-table-botton pt-50 pb-50">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"></div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"></div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="cart-shopping-total">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="pull-right">
                                                    <div class="cart-sub-total">
                                                        Subtotal<span>${{ $total }}</span>
                                                    </div>
                                                    <div class="cart-grand-total">
                                                        Grand Total<span>${{ $total }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <!-- /thead -->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="button pull-right">
                                                    <a href="" class="btn btn-button">PROCCED TO CHEKOUT</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- /tbody -->
                                </table>
                                <!-- /table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontwebsite.frontfooter')
