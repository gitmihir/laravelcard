@include('layout.partials.head')
<div class="row mb-2">
    <div class="col-md-12">
        <h3>
            Edit Expense
        </h3>
        <form action="{{ url('update-expense/' . $expense->expense_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="">Expense Type</label>
                <input type="text" name="expense_type" value="{{ $expense->expense_type }}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Amount</label>
                <input type="text" name="expense_amount" value="{{ $expense->expense_amount }}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="hidden" value="{{ $id = Auth::id() }}" name="exp_user_id">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/expense/allexpense') }}" type="button" class="btn btn-info">Back</a>
            </div>

        </form>
    </div>
</div>
@include('layout.partials.footer')
