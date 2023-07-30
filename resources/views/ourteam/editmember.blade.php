@include('layout.partials.head')
<form action="{{ url('update-team/' . $team->id) }}" enctype="multipart/form-data" method="POST" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Update Contact Detail
            </h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_our_team_title">Name</label>
                <input id="sg_our_team_title" name="sg_our_team_title" value="{{ $team->sg_our_team_title }}"
                    type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_our_team_image">Image</label>
                <input id="sg_our_team_image" name="sg_our_team_image" type="file" class="form-control">
            </div>
            <div>
                <img src="{{ asset('images/memberimages/' . $team->sg_our_team_image) }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="sg_our_team_text">Text</label>
                <textarea id="sg_our_team_text" name="sg_our_team_text" required="required" class="form-control">{{ $team->sg_our_team_text }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/ourteam/allteammembers') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')