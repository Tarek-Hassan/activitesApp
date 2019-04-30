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

                <form class="forms-sample col-md-9" action="{{ route('category.update',[$data->id]) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                    <div class="form-group">
                        <label for="exampleInputName1">{{ __('general.title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $data['title']??'') }}"
                               id="exampleInputName1"
                               placeholder="{{ __('general.title') }}">
                    </div>

                    <div class="form-group m-form__group">
                                                <label
                                                    for="exampleInputPassword1">{{ __('general.description') }}</label>
                                                <textarea name="description"
                                                          class="summernote"
                                                         >{{ old('description',$data['description']) }}</textarea>
                                            </div>
                                        


                                            <div>
                                    <div class="form-group m-form__group">
                                        <label for="exampleInputEmail1">{{ __('blog::general.image') }}</label>
                                        <div></div>
                                        <div class="custom-file">
                                            <input onchange="display(this);" type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">{{ __('blog::general.choose') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <img src="{{ asset('storage/'.$data->image) }}" id="flag" style="width:50px">
                                    </div>
                                </div>


                   

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">{{ __('general.submit') }}</button>
                        <button class="btn btn-light">
                            <a href="{{route('category.index')}}"
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


