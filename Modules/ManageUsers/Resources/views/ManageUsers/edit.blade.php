@extends('general::layouts.admin')

@section('title',__('general.admin'))

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ __('admin.edit') }}
                            </h3>
                        </div>
                    </div>
                </div>

                <form class="forms-sample col-md-9" action="{{ route('manageusers.update',[$data->id]) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $data['name']??'') }}"
                               id="exampleInputName1"
                               placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $data['email']??'') }}"
                               id="exampleInputName1"
                               placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password', $data['password']??'') }}"
                               id="exampleInputName1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">ConfirmPassword</label>
                        <input type="password" class="form-control" name="password_confirmation" 
                               id="exampleInputName1"
                               placeholder="ConfirmPassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $data['phone']??'') }}"
                               id="exampleInputName1"
                               placeholder="phone">
                    </div>
                    <div class="form-group m-form__group row">
                                    <div class="col-md-10">
                                        <label for="exampleSelect1">
                                        Role
                                        </label>
                                        <select class="form-control m-bootstrap-select m_selectpicker" name="role">
                                        <option {{ $data->role == "admin" ? 'selected' : '' }} value="admin">Admin</option>
                                        <option {{ $data->role == "supervisor" ? 'selected' : '' }} value="supervisor">Supervisor</option>
                                            
                        
                                           
                                        </select>
                                    </div>
                                </div>

   

                                        


                                            <div>
                                            <div class="form-group m-form__group">
    <label for="exampleInputEmail1">Image</label>
    <div></div>
    <div class="custom-file">
        <input onchange="display(this);" type="file"  class="custom-file-input" id="customFile" name="avatar">
        <label class="custom-file-label" for="customFile">Choose</label>
    </div>
</div>

                                    <div class="form-group m-form__group">
                                        <img src="{{ asset('storage/'.$data->avatar) }}" id="flag" style="width:50px">
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group m-form__group ">

<label for="exampleSelect1">
    Countries
</label>
<select class="form-control m-bootstrap-select m_selectpicker"  name="country_id" data-live-search="true">
    @foreach($countries as $country)
    <option {{ $data->country_id == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->country_name }}</option>
    @endforeach
</select>
</div>



<div class="form-group m-form__group ">

<label for="exampleSelect1">
City
</label>
<select class="form-control m-bootstrap-select m_selectpicker"  name="city_id" data-live-search="true">
@foreach($countries as $country)
            @foreach($country->cities as $city)
<option {{ $data->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->city_name }}</option>
@endforeach
@endforeach
</select>
</div>

<div class="form-group m-form__group ">

<label for="exampleSelect1">
Stages
</label>
<select class="form-control m-bootstrap-select m_selectpicker"  name="stage_id" data-live-search="true">
@foreach($stages as $stage)
<option {{ $data->stage_id == $stage->id ? 'selected' : '' }} value="{{ $stage->id }}">{{ $stage->stage_name }}</option>
@endforeach
</select>
</div>
<div class="form-group m-form__group ">

<label for="exampleSelect1">
Schooles
</label>
<select class="form-control m-bootstrap-select m_selectpicker"  name="schoole_id" data-live-search="true">
@foreach($schooles as $schoole)
<option {{ $data->schoole_id == $schoole->id ? 'selected' : '' }} value="{{ $schoole->id }}">{{ $schoole->schoole_name }}</option>
@endforeach
</select>
</div>



                   

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">{{ __('general.submit') }}</button>
                        <button class="btn btn-light">
                            <a href="{{route('manageusers.index')}}"
                               class="btn btn-secondary">
                                {{ __('general.cancel') }}
                            </a>
                        </button>
                    </div>


                </form>

            </div>

        </div>
    </div>

@endsection
@section('script')
    <script>
        function display(input) {
            if (input.files && input.files[0]) {
                $('.flag-img').show();
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#flag')
                        .attr('src', e.target.result)
                        .width(50);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection


