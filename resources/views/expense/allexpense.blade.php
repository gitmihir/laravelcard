@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Expenses</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/expense/addexpense') }}" class="btn btn-primary btn-sm">Add Expense</a>
    </div>
    <div class="col-md-12 mt-3">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Expense Type</th>
                    <th>Expense By</th>
                    <th>Expense Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($exp as $user)
                    @php $expense_date = date('m-d-Y', strtotime($user->expense_date)); @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $user->expense_type }}</td>
                        <td>
                            @php
                                $expd = DB::select('select * from employees where id =' . $user->exp_emp_id);
                            @endphp
                            @foreach ($expd as $username)
                                {{ $username->emp_first_name }}
                            @endforeach
                        </td>
                        <td>{{ $expense_date }}</td>
                        <td>{{ $user->expense_amount }}</td>
                        <td>
                            <a href="{{ url('view-expense/' . $user->expense_id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-expense/' . $user->expense_id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-expense/' . $user->expense_id) }}'
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
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure want to Delete this expense?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="" type="button" class="btn btn-danger btn-sm appendexpenseurl">Yes</a>
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@include('layout.partials.footer')
