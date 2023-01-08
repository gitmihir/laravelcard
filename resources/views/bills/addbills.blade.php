@include('layout.partials.head')
<form action="/createbill" method="POST" class="form-group" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add New Bill
            </h3>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-4">
            <div class="form-group">
                <label for="supplier_name">Select Supplier</label>
                <select name="supplier_name" id="supplier_name" class="form-control">
                    <option value="">Select Supplier</option>
                    @foreach ($supplierselectquery as $supplierdata)
                        <option value="{{ $supplierdata->supplier_name }}">{{ $supplierdata->supplier_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="bill_number">Bill No.</label>
                <input type="text" name="bill_number" id="bill_number" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="bill_amount">Total Bill Amount</label>
                <input type="text" name="bill_amount" readonly class="form-control bill_amount">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputFile">Attachment</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <div class="parentchild">
                <table class="table">
                    <tr>
                        <td><label for="product_price">Select Product</label></td>
                        <td><label for="product_price">Price</label></td>
                        <td><label for="product_quantity">Quantity</label></td>
                        <td><label for="product_total_amount">Sub Total</label></td>
                        <td><label for="product_quantity">Add More / Remove</label></td>
                    </tr>
                    <tr>
                        <td><select name="product_name[]" class="form-control product_name">
                                <option value="">Select Product</option>
                                @foreach ($productselectquery as $productdata)
                                    <option product-url="{{ url('/bills/addbills/' . $productdata->product_main_id) }}"
                                        product-id="{{ $productdata->product_main_id }}"
                                        value="{{ $productdata->product_name }}">
                                        {{ $productdata->product_name }}
                                    </option>
                                @endforeach
                            </select></td>
                        <td><input type="text" name="product_price[]" class="form-control product_price" readonly>
                        </td>
                        <td><input type="number" min="1" name="product_quantity[]"
                                class="form-control product_quantity"></td>
                        <td><input type="text" name="product_total_amount[]"
                                class="form-control product_total_amount" readonly></td>
                        <td><button type="button" class="btn btn-primary add_more_products"><i
                                    class="fas fa-plus-square"></i></button></td>
                        <input type="hidden" name="product_id[]" class="product_id">
                    </tr>
                </table>
            </div>
            <div class="field_wrapper"></div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="bill_notes">Notes</label>
                <textarea class="form-control" name="bill_notes"></textarea>
            </div>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <input type="hidden" name="bill_due_amount" class="bill_due_amount">
            <input type="hidden" value="{{ $id = Auth::id() }}" name="bill_added_by">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/bills/allbills') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
@include('bills.billscripts')
