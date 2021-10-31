<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
            'website' => 'required|string|max:255|unique:companies',
        ];
    }
}
