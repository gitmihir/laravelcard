@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Bills</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/bills/addbills') }}" class="btn btn-primary btn-sm">Add Bill</a>
    </div>
    <div class="col-md-12 mt-3">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Supplier Name</th>
                    <th>Bill Number</th>
                    <th>Bill Amount</th>
                    <th>Due Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewbills as $billsdata)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $billsdata->supplier_name }}</td>
                        <td>{{ $billsdata->bill_number }}</td>
                        <td>{{ $billsdata->bill_amount }}</td>
                        <td>{{ $billsdata->bill_due_amount }}</td>
                        <td>
                            <a href="{{ url('view-bill/' . $billsdata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-bill/' . $billsdata->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <a href="{{ url('bill-transaction/' . $billsdata->id) }}" class="btn btn-dark btn-sm">
                                <i class="fas fa-money-check-alt"></i>
                            </a>
                            <button type="button" delete-url-id='{{ url('delete-bills/' . $billsdata->id) }}'
                                class="btn btn-danger btn-sm deletemodal" data-toggle="modal"
                                data-target="#modaldelete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <a href="{{ url('listoftransactions/' . $billsdata->id) }}"
                                class="btn btn-success btn-sm"><i class="fad fa-wallet"></i></a>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layout.partials.footer')
