<?php

namespace Modules\Stages\Model\Stages\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreStagesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'stage_name' => 'required|string|max:190',
            
        ];
    }
}
