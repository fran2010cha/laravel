<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
    // public function rules()
    // {
    //     if($this->method('put')) {
    //         return [
    //             'name'  => 'required|min:10',
    //             'description'     => 'required,'.$this->id,
    //         ];
    //     } else {
    //         return [
    //             'name'  => 'required|min:10',
    //             'description'     => 'required|email|unique:users',
    //         ];
    //     }


    // }
    // public function messages() {
    //     return [
    //         'name.required'  => 'El campo Nombre Completo es obligatorio.',
    //         'description.required'       => 'El campo descripcion es requerido.',
    //     ];
    // }
    public function rules()
    {
        return [
            'name'         => 'required',
            'description'  => 'required',
        ];
    }
    public function messages() {
        return [
            'name.required'        => 'El Nombre es requerido.',
            'description.required' => 'La Descripción es requerida.',
        ];
    }
}
