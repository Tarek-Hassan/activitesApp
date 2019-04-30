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

                <form class="forms-sample col-md-9" action="{{ route('studentcountry.update',[$data->id]) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <select class="form-control m-bootstrap-select m_selectpicker"  name="selected" >


<option {{ $data->selected == 1 ? 'selected' : '' }} value="1" >Selected</option>
<option {{ $data->selected == 0 ? 'selected' : '' }} value="0" > NOtSelected</option>


</select>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">
                            <a href="{{route('studentcountry.index')}}"
                               class="btn btn-secondary">
                               Cancel
                            </a>
                        </button>
                    </div>


                </form>

            </div>

        </div>
    </div>

@endsection

