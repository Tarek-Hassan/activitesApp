<?php

namespace Modules\Activties\Model\Activties\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateActivtiesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'activity_name' => 'required|string|max:190',

        ];
    }
}
