<?php

namespace Modules\Student\Model\StudentCountry\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentCountryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
        ];
    }
}
