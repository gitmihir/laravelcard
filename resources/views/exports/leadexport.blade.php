@include('layout.partials.head')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Export Leads</h3>
        </div>
        <div class="card-body">
            <form method="get" action="{{ route('leads.export') }}">
                <div class="form-group">
                    <label>Start Date:</label>
                    <div class="input-group mb-3">
                        <input id="startDate" type="date" name="from_date" class="form-control startdatec"
                            name="startDate" required />
                    </div>
                </div>

                <div class="form-group">
                    <label>End Date:</label>
                    <div class="input-group mb-3">
                        <input id="endDate" type="date" name="to_date" class="form-control enddatec" name="endDate"
                            required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary clicktoclearlead">Export</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Export Orders</h3>
        </div>
        <div class="card-body">
            <form method="get" action="{{ route('orders.export') }}">
                <div class="form-group">
                    <label>Start Date:</label>
                    <div class="input-group mb-3">
                        <input id="startDate" type="date" name="from_date" class="form-control sdate"
                            name="startDate" required />
                    </div>
                </div>

                <div class="form-group">
                    <label>End Date:</label>
                    <div class="input-group mb-3">
                        <input id="endDate" type="date" name="to_date" class="form-control edate" name="endDate"
                            required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary clearorderdata">Export</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@include('layout.partials.footer')
