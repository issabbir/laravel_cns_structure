<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:stores,name,'.$request->id?:null,
            'address' => 'required',
            'type' => 'required',
            'company_id' => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages() {
        return [
            'name.required' => 'Store name is required!',
            'name.unique' => 'Store name already exists!',
            'address.required' => 'Address is required!',
            'type.required' => 'Type is required!',
            'company_id.required' => 'Company name is required!',
        ];
    }
}
