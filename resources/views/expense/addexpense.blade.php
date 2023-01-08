@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Add Expense
        </h3>
        <form action="/createexpense" method="POST" class="form-group">
            @csrf
            <label class="form-group">Expense Type:</label>
            <input type="text" class="form-control" placeholder="Expense Type" name="expense_type" required>
            <label>Amount:</label>
            <input type="text" class="form-control" placeholder="Amount" name="expense_amount" required>

            <label>Expense by:</label>
            <select class="form-control" name="exp_emp_id">
                <option value="">Select User</option>
                @foreach ($empby as $empuser)
                    <option value="{{ $empuser->id }}">{{ $empuser->emp_first_name }}</option>
                @endforeach
            </select>
            <br>
            <input type="hidden" value="{{ $id = Auth::id() }}" name="exp_user_id">
            <button type="submit" value="Add student" class="btn btn-primary">Submit</button>
            <a href="{{ url('/expense/allexpense') }}" type="button" class="btn btn-info">Cancel</a>
        </form>
    </div>
</div>
@include('layout.partials.footer')
