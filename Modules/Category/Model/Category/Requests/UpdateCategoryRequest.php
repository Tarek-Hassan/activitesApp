<?php

namespace Modules\Category\Model\Category\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:190',
            'description' => 'required|string|max:2000',
            'image'=>'nullable',

        ];
    }
}
