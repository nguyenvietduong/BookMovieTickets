<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'name'          => 'required',
            'slug'          => 'unique:articles',
            'content'       => 'required',
            'summary'       => 'required',
            'category_id'   => 'required',
            'publish'       => 'required',
            'image'         => 'required',
            'tags'          => 'required',
        ];
    }

    public function messages(): array
    {
        return [

            'name.required'     => 'Bạn chưa nhập vào ô tiêu đề.',

            'slug.unique'       => 'Tên đường nhẫn đã tồn tại, vui lòng chọn tên đường dẫn khác.',

            'content.required'  => 'Bạn chưa nhập vào ô nội dung.',

            'summary.required'  => 'Bạn chưa nhập vào ô tóm tắt.',

            'category_id.required'  => 'Bạn chưa nhập vào ô danh mục bài viết.',

            'publish.required'  => 'Bạn chưa chọn tình trạng.',

            'image.required'    => 'Bạn chưa chọn hình ảnh.',

            'tags.required'     => 'Bạn chưa chọn thẻ bài viết.',
        ];
    }
}