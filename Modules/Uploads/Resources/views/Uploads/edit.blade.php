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
<!-- 'title','description','views','link','liked','likes','city_id','schoole_id','stage_id','user_id' -->
                <form class="forms-sample col-md-9" action="{{ route('uploads.update',[$data->id]) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="form-group">
                        <label for="exampleInputName1">title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $data['title']??'') }}"
                               id="exampleInputName1"
                               placeholder="title">
                    </div>
                    <div class="form-group m-form__group">
                                                <label
                                                    for="exampleInputPassword1">{{ __('general.cardescription') }}</label>
                                                <textarea name="description"
                                                          class="summernote"
                                                         >{{ old('description', $data['description']??'') }}</textarea>
                    </div>

                    <!-- <div class="form-group">
                        <label for="exampleInputName1">views</label>
                        <input type="text" class="form-control" name="views" value="{{ old('views', $data['views']??'') }}"
                               id="exampleInputName1"
                               placeholder="views">
                    </div> -->
                    <div class="form-group">
                        <label for="password">link</label>
                        <input type="file" class="form-control " name="link"  value="{{ old('link', $data['link']??'') }}"
                               id="link"
                               placeholder="link">
                               
                    </div>

                    <!-- <div class="form-group">
                        <label for="password-confirm">liked</label>
                        <input type="text" class="form-control" name="like_id" value="{{ old('like_id', $data['like_id']??'') }}"
                               id="password-confirm"
                               placeholder="liked">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="password-confirm">likes</label>
                        <input type="text" class="form-control" name="likes" value="{{ old('likes', $data['likes']??'') }}"
                               id="password-confirm"
                               placeholder="likes">
                    </div> -->


                    <div class="form-group m-form__group row">
                                    <div class="col-md-10">
                                        <label for="exampleSelect1">
                                           Activties
                                        </label>
                                        <select class="form-control m-bootstrap-select m_selectpicker" required name="activty_id"
                                                data-live-search="true">
                                            @foreach($activties as $activity)
                                                <option {{ $data->activity_id == $activity->id ? 'selected' : '' }} value="{{ $activity->id }}">{{ $activity->activity_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
<select class="form-control m-bootstrap-select m_selectpicker"  multiple name="stage_id[]" data-live-search="true">

@foreach($stages as $stage)
<option {{ old('stage_id[]',in_array($stage->id, $data->stage_id)??'')? 'selected' : '' }} value="{{ $stage->id }}">{{ $stage->stage_name }}</option>
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
                            <a href="{{route('uploads.index')}}"
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


