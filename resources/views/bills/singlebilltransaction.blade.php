@include('layout.partials.head')
<form action="/submittransaction" method="POST" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-6">
            <h3>Transaction for bill number - {{ $billtransaction->bill_number }}</h3>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="">Bill Amount</label>
                <input type="text" class="form-control billtransactions_bill_amount" name=""
                    value="{{ $billtransaction->bill_amount }}" readonly>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="">Total Due Amount</label>
                <input type="text" class="form-control display_due_amount" name=""
                    value="{{ $billtransaction->bill_due_amount }}" readonly>
            </div>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="">Transaction Amount</label>
                <input type="number" min="0" class="form-control billtransactions_transaction_amount"
                    name="billtransactions_transaction_amount">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="">Due Amount</label>
                <input type="text" class="form-control billtransactions_due_amount"
                    name="billtransactions_due_amount" readonly>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="">Mode of Payment</label>
                <select name="billtransactions_mode_of_payment" class="form-control billtransactions_mode_of_payment">
                    <option value="">Select</option>
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="date">Transaction Date</label>
                <input type="date" id="date" class="form-control billtransactions_transaction_date"
                    name="billtransactions_transaction_date">
            </div>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <label for="">Note</label>
            <textarea name="billtransactions_note" class="form-control"></textarea>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <input type="hidden" value="{{ $billtransaction->bill_due_amount }}" class="hidden_due" name="hidden_due">
            <input type="hidden" value="{{ $billtransaction->id }}" name="billtransactions_bill_id">
            <input type="hidden" value="{{ $id = Auth::id() }}" name="billtransactions_added_by">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/bills/allbills') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
