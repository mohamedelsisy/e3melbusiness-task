<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:191',
            'description'   => 'required|string',
            'category_id'   => 'required',
            'active'        => 'required|string|in:0,1',
            'rating'        => 'required|string|in:0,1,2,3,4,5',
            'hours'        => 'required',
            'views'        => 'required',

        ];
    }
}
