@extends('layouts.app')

@section('content')

    <h1>
        Nominate Someone!
    </h1>

    <form action="{{route('nomination.store')}}" class="form" method="post">
        {{csrf_field()}}
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">
                    Nominee Information
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-4 col-sm-6">
                    <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                </div>
                <div class="col-md-4 col-sm-6">
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                </div>
                <div class="col-md-4 col-sm-12">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
            </div>
        </div>

        {{--<div class="panel">--}}
            {{--<div class="panel-heading">--}}
                {{--<span class="panel-title">--}}
                    {{--Race--}}
                {{--</span>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--<div class="col-sm-10">--}}
                    {{--<label for="location">Location</label>--}}
                    {{--<input name="address" id="address" class="form-control" placeholder="Address or Zip Code">--}}
                {{--</div>--}}
                {{--<div class="col-sm-2">--}}
                    {{--<div class="btn btn-primary" onclick="getOffices()">Update</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-12 hidden" id="officesWrapper">--}}
                    {{--<label for="office">Office</label>--}}
                    {{--<select name="office" id="offices" class="form-control">--}}
                        {{--<option value="">Select One</option>--}}
                        {{--<option value="other">Other Office</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Race Details</span>
            </div>
            <div class="panel-body">
                <label for="partisan" class="control-label">Partisan Type</label>
                <select name="partisan" id="type" class="form-control">
                    <option value="true">Partisan</option>
                    <option value="false">Non-Partisan</option>
                </select>
                <label for="office" class="control-label">Office</label>
                <input type="text" name="office" class="form-control" placeholder="Office Title">
                <label for="district[name]" class="control-label">District</label>
                <input type="text" name="district[name]" class="form-control" placeholder="Anytown">
                <label for="district[scope]" class="control-label">Scope</label>
                <select name="district[scope]" class="form-control">
                    <option value="national">National</option>
                    <option value="statewide">Statewide</option>
                    <option value="congressional">Congressional</option>
                    <option value="county">County</option>
                    <option value="city">City</option>
                    <option value="specialDistrict">Special District</option>
                </select>
                <label for="filingDeadline" class="control-label">Filing Deadline</label>
                <div class="input-group date">
                    <input type="text" name="filingDeadline" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
                <label for="nextElection" class="control-label">Next Election</label>
                <div class="input-group date">
                    <input type="text" name="nextElection" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
                <label for="notes" class="control-label">How to file</label>
                <textarea name="notes" class="form-control" placeholder="Where to file, how many signatures, application cost, etc. "></textarea>
                <label for="infoSource" class="control-label">Contest Information</label>
                <input type="text" name="infoSource" class="form-control" placeholder="www.secretaryofstate.ma.gov/electioninfo">
            </div>
        </div>

        <input type="submit" class='btn btn-primary' value="Preview Nomination">
    </form>

@stop

@push('style')
<link href="{{'/css/bootstrap-datepicker.min.css'}}" rel="stylesheet">

@endpush

@push('scripts')
<script src="{{'/js/bootstrap-datepicker.min.js'}}"></script>
<script>

    {{--var getOffices = function () {--}}
        {{--var address = $('#address').val();--}}
        {{--$.ajax({--}}
            {{--url: 'https://www.googleapis.com/civicinfo/v2/representatives?key={{env('GAPI')}}&address=' + address--}}
        {{--}).done(function(data)--}}
        {{--{--}}
            {{--updateOfficeList(data.offices)--}}
        {{--});--}}
    {{--}--}}

    {{--var updateOfficeList = function(data)--}}
    {{--{--}}
        {{--$('#offices').html('<option value="">Select One</option><option value="other">Other Office</option>');--}}
        {{--$('#officesWrapper').removeClass('hidden');--}}
        {{--data.forEach(function(i)--}}
        {{--{--}}
            {{--$('#offices').append('<option value="' + i.divisionId + '">' + i.name + '</option>');--}}
        {{--})--}}
    {{--}--}}

    $('.input-group.date').datepicker({
    });
</script>
@endpush