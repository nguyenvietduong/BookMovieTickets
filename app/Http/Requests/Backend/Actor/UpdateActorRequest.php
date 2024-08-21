<?php

namespace App\Http\Requests\Backend\Actor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'name'          => 'required|string|unique:users,name, ' . $this->id,
        ];
    }

    public function messages(): array
    {
        return [

            'name.required'         => 'Bạn chưa nhập vào ô tên diễn viên.',
            'name.unique'           => 'Tên diễn viên đã tồn tại, vui lòng chọn tên diễn viên khác.',
        ];
    }
}
