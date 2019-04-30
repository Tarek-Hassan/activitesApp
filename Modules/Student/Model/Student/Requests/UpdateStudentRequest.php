<?php

namespace Modules\Student\Model\Student\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
                     
            // 'title' => 'required|string|max:255',
            // 'description' => 'required|string|max:2000',
            // 'views' => 'required|numeric|',
            // 'liked' => 'required|numeric|',
            // 'likes' => 'required|numeric|',
            // 'avatar'=>'required',
            // 'stage_id'=>'required',
            // 'city_id'=>'required',
            // 'schoole_id'=>'required',
            // 'user_id'=>'required',
        ];
    }
}
