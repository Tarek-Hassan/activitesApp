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
                <form class="forms-sample col-md-9" action="{{ route('student.update',[$data->id]) }}" method="post" enctype="multipart/form-data">

@csrf
@method('PUT')



     <div class="form-group m-form__group ">

        <label for="exampleSelect1">
        Countries
        </label>
        <select class="form-control m-bootstrap-select m_selectpicker"  name="city_id" data-live-search="true">

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
                                <label for="exampleInputName1">StudentName</label>
                                <input type="text" class="form-control" name="student_name" value="{{ old('student_name', $data['student_name']??'') }}"
                                    id="exampleInputName1"
                                    placeholder="StudentName">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('general.submit') }}</button>
                                <button class="btn btn-light">
                                    <a href="{{route('student.index')}}"
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


