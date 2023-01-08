@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Slide Text Details
        </h3>
    </div>
    <div class="col-md-8">
        <table class="table">
            <tr>
                <th>Text</th>
                <td>{{ $viewslideindetail->sg_text_line }}</td>
            </tr>
        </table>
        <a href="{{ url('/headertextslider/allslides') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
@include('layout.partials.footer')
