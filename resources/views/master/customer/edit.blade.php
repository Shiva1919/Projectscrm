@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Update ACME Customer') }}</h3>
                            <a class="btn btn-primary" href="{{route('customer.index', $customer->owncode)}}" style="margin-left:1000px;">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Warning!</strong> Please check input field <br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('customer.update',$customer->owncode)}}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  name="name" value="{{ $customer->name }}" id="exampleFormControlInput1" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Entry Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="entrycode" value="{{ $customer->entrycode }}" id="exampleFormControlInput1" required="">
                                    </div>
                                </div>
                            </div>  
                        </div> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Primary Mobile No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="primarymobileno" value="{{ $customer->primarymobileno }}" id="exampleFormControlInput1" required="">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phoneno" value="{{ $customer->phoneno }}" id="exampleFormControlInput1" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="primaryemailid" value="{{ $customer->primaryemailid }}" id="exampleFormControlInput1" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Owner Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ownername" value="{{ $customer->ownername }}" id="exampleFormControlInput1" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address1</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address1" value="{{ $customer->address1 }}" id="exampleFormControlInput1" required="">
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address2" value="{{ $customer->address2 }}" id="exampleFormControlInput1" >
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" >State</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="state" value="{{ $customer->state }}" id="state">
                                            @foreach($state_master as $state_masters)
                                            <option value="{{$state_masters->owncode}}">{{$state_masters->statename}}</option>
                                            @endforeach
                                            @foreach($state as $key => $states)
                                                <option value="{{$states->owncode}}">{{$states->statename}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">District</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="district" value="{{ $customer->district }}" id="district">
                                            @foreach($district_master as $district_masters)
                                            <option value="{{$district_masters->OwnCode}}">{{$district_masters->DistrictName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Taluka</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="taluka" value="{{ $customer->taluka }}" id="taluka">
                                            @foreach($taluka_master as $taluka_masters)
                                            <option value="{{$taluka_masters->owncode}}">{{$taluka_masters->talukaname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" >City</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="city" value="{{ $customer->city }}" id="city">
                                            @foreach($city_master as $city_masters)
                                            <option value="{{$city_masters->owncode}}">{{$city_masters->cityname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">PAN NO</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="panno" value="{{ $customer->panno }}" id="exampleFormControlInput1" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">GST NO</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="gstno" value="{{$customer->gstno}}" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No of Branchs</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="noofbranches" value="{{ $customer->noofbranches }}" id="exampleFormControlInput1" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class=" text-center">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- @include('layouts.footers.auth') -->
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() 
        {
            $('#state').on('change', function() 
            {
                var StateID = this.value;
                $("#district").html('');
                $.ajax({
                    url:"{{url('getDistrict')}}",
                    type: "POST",
                    data: {
                        StateID: StateID,
                        _token: '{{csrf_token()}}' 
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#district').html('<option value="">Select District</option>'); 
                        $.each(result.District,function(key,value){
                        $("#district").append('<option value="'+value.OwnCode+'">'+value.DistrictName+'</option>');
                        });
                        $('#taluka').html('<option value="">Select District First</option>'); 
                    }
                });
            });    
            $('#district').on('change', function() {
                var districtid = this.value;
                $.ajax({
                    url:"{{url('getTaluka')}}",
                    type: "POST",
                    data: {
                        districtid: districtid,
                        _token: '{{csrf_token()}}' 
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#taluka').html('<option value="">Select Taluka</option>'); 
                        $.each(result.Taluka,function(key,value){
                        $("#taluka").append('<option value="'+value.owncode+'">'+value.talukaname+'</option>');
                        });
                        $('#city').html('<option value="">Select Taluka First</option>'); 
                    }
                });
            });
            $('#taluka').on('change', function() {
                var talukaid = this.value;
                $.ajax({
                    url:"{{url('getCity')}}",
                    type: "POST",
                    data: {
                        talukaid: talukaid,
                        _token: '{{csrf_token()}}' 
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#city').html('<option value="">Select City</option>'); 
                        $.each(result.City,function(key,value){
                        $("#city").append('<option value="'+value.owncode+'">'+value.cityname+'</option>');
                        });
                    }
                });
            });
        });
</script>

@endsection
