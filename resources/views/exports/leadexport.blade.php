@include('layout.partials.head')
<table class="table table-bordered mt-3">
    <tr>
        <th colspan="3">
            Leads
            <a class="btn btn-warning float-end" href="{{ route('leads.export') }}">Export Lead Data</a>
        </th>
    </tr>
    <tr>
        <th colspan="3">
            Orders
            <a class="btn btn-warning float-end" href="{{ route('orders.export') }}">Export Order Data</a>
        </th>
    </tr>
</table>


@include('layout.partials.footer')
