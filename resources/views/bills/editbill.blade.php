@include('layout.partials.head')
@php
    $productname = explode('~', $bills->product_name);
    $productprice = explode('~', $bills->product_price);
    $productquantity = explode('~', $bills->product_quantity);
    $producttotalamount = explode('~', $bills->product_total_amount);
    $productid = explode('~', $bills->product_id);
    $allarray = array_map(null, $productname, $productprice, $productquantity, $producttotalamount, $productid);
    
@endphp
<form action="{{ url('update-bill/' . $bills->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update Bill
            </h3>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-4">
            <div class="form-group">
                <label for="supplier_name">Select Supplier</label>
                <select name="supplier_name" id="supplier_name" class="form-control">
                    <option value="{{ $bills->supplier_name }}">{{ $bills->supplier_name }}</option>
                    @foreach ($supplierselectquery as $supplierdata)
                        <option value="{{ $supplierdata->supplier_name }}">{{ $supplierdata->supplier_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="bill_number">Bill No.</label>
                <input type="text" name="bill_number" value="{{ $bills->bill_number }}" id="bill_number"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="bill_amount">Bill Amount</label>
                <input type="text" name="bill_amount" value="{{ $bills->bill_amount }}" readonly
                    class="form-control bill_amount">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputFile">Attachment</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" onchange="validateImageSize(this);" accept="image/png, image/jpeg"
                            name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                    </div>
                </div>
                <a href="{{ asset('images/billattachments/' . $bills->image) }}" download><i class="fas fa-file"></i>
                    ({{ $bills->image }}) Click to download</a>
            </div>
        </div>
        <div class="col-md-12">
            <button type="button" class="btn btn-primary add_more_products"><i class="fas fa-plus-square"></i> Click to
                add
                more products</button>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <div>
                <table class="table">
                    <tr>
                        <td><label for="product_price">Select Product</label></td>
                        <td><label for="product_price">Price</label></td>
                        <td><label for="product_quantity">Quantity</label></td>
                        <td><label for="product_total_amount">Sub Total</label></td>
                        <td><label for="product_quantity">Add More</label></td>
                    </tr>
                    @php $dri = 1; @endphp
                    @foreach ($allarray as $arraydata)
                        <tr class="parentchild">
                            <td>
                                <select name="product_name[]" class="form-control product_name"
                                    data-row-id='{{ $dri }}'>
                                    <option product-url="{{ url('/bills/addbills/' . $arraydata[4]) }}"
                                        value="{{ $arraydata[0] }}">{{ $arraydata[0] }}</option>
                                    @foreach ($productselectquery as $productdata)
                                        <option
                                            product-url="{{ url('/bills/addbills/' . $productdata->product_main_id) }}"
                                            product-id="{{ $productdata->product_main_id }}"
                                            value="{{ $productdata->product_name }}">
                                            {{ $productdata->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <td><input type="text" name="product_price[]" value="{{ $arraydata[1] }}"
                                    class="form-control product_price" readonly>
                            </td>
                            <td><input type="number" min="1" name="product_quantity[]"
                                    class="form-control product_quantity_edit-{{ $dri }}"
                                    data-row-id="{{ $dri }}" value="{{ $arraydata[2] }}"></td>
                            <td><input type="text" name="product_total_amount[]"
                                    class="form-control product_total_amount_edit-{{ $dri }}"
                                    data-row-id="{{ $dri }}" readonly value="{{ $arraydata[3] }}">
                            </td>
                            <td><button type="button" class="btn btn-danger remove_product_from_edit"><i
                                        class="fas fa-minus-square"></i></button></td>
                        </tr>
                        @php $dri++ @endphp
                    @endforeach

                </table>
            </div>
            <div class="field_wrapper"></div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="bill_notes">Notes</label>
                <textarea class="form-control" name="bill_notes">{{ $bills->bill_notes }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <input type="hidden" name="bill_due_amount" class="bill_due_amount">
            <input type="hidden" value="{{ $id = Auth::id() }}" name="bill_added_by">
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ url('/customers/allcustomers') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
@include('bills.billscripts')
