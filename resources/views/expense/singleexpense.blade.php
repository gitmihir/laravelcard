@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12 mt-3">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Expense By</th>
                <td>
                    @php
                        $expd = DB::select('select * from employees where id =' . $expense->exp_emp_id);
                    @endphp
                    @foreach ($expd as $username)
                        {{ $username->emp_first_name }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Expense Type</th>
                <td>{{ $expense->expense_type }}</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>{{ $expense->expense_amount }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <a href="{{ url('/expense/allexpense') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
</form>
@include('layout.partials.footer')
