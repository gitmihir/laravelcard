@include('layout.partials.head')
<table class="table table-bordered mt-3">
    <tr>
        <th colspan="3">
            List Of Leads
            <a class="btn btn-warning float-end" href="{{ route('leads.export') }}">Export Lead Data</a>
        </th>
    </tr>
</table>


@include('layout.partials.footer')
