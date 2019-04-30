<?php

namespace Modules\Schooles\Model\Schooles\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'schoole_name' => 'required|string|max:190',
            'country_id' => 'required',
            'stage_id' => 'required',
            'city_id' => 'required',

        ];
    }
}
