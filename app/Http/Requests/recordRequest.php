<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class recordRequest extends FormRequest
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
            'name' => 'required|min:3|max:45',
            'surname' => 'required|min:3|max:45',
            'brith_date' => 'required',
            'male' => 'required|min:1|max:1',
            'tel' => 'required|min:2|max:10',
            'car' => 'required|min:1|max:11',
            'travel_date' => 'required',
            'count_days' => 'required|min:1|max:25'
        ];
    }
}
