<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CompanyRequest extends FormRequest
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
    public function rules(Request $request) {
        return [
            'name' => 'required|unique:companies,name,'.$request->id?:null,
            'mobile' => 'required|numeric|digits_between:11,14',
            'nbr_regi_no' => 'required',
            'contact_person' => 'required',
            'city' => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages() {
        return [
            'name.required' => 'Company name is required!',
            'name.unique' => 'Company name already exists!',
            'mobile.required' => 'Mobile number is required!',
            'nbr_regi_no.required' => 'VAT Reg. No is required!',
            'contact_person.required' => 'Contact person is required!',
            'city.required' => 'City is required!',
        ];
    }
}
