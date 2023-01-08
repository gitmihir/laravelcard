@include('layout.partials.head')
<form action="/createslide" method="POST" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add Text
            </h3>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_text_line">Text</label>
                <input id="sg_text_line" name="sg_text_line" type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/headertextslider/allslides') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
