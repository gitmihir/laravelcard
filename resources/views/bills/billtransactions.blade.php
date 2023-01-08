@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Bill Transactions</h3>
    </div>

    <div class="col-md-12 mt-3">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Supplier Name</th>
                    <th>Bill Number</th>
                    <th>Bill Amount</th>
                    <th>Transaction Amount</th>
                    <th>Payment Mode</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($alltransactions as $singletransactins)
                    @php
                        $bill_id = $singletransactins->billtransactions_bill_id;
                        $billquery = DB::select('SELECT * from bills where id =' . $bill_id);
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        @foreach ($billquery as $billdata)
                            <td>{{ $billdata->supplier_name }}</td>
                            <td>{{ $billdata->bill_number }}</td>
                            <td>{{ $billdata->bill_amount }}</td>
                        @endforeach
                        <td>{{ $singletransactins->billtransactions_transaction_amount }}</td>
                        <td>{{ $singletransactins->billtransactions_mode_of_payment }}</td>
                        <td>{{ $singletransactins->billtransactions_transaction_date }}</td>
                        <td>
                            <button type="button" noteattr='{{ $singletransactins->billtransactions_note }}'
                                class="btn btn-success btn-sm viewnotemodal" data-toggle="modal"
                                data-target="#modalviewnote">
                                <i class="far fa-eye"></i>
                            </button>
                            <button type="button"
                                delete-url-id='{{ url('delete-transaction/' . $singletransactins->id) }}'
                                class="btn btn-danger btn-sm deletemodal" data-toggle="modal"
                                data-target="#modaldelete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <a href="{{ url('/bills/allbills') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
@include('layout.partials.footer')
