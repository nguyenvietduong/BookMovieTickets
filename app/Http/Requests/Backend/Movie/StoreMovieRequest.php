<?php

namespace App\Http\Requests\Backend\Movie;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'name'                  => 'required|string',
            'slug'                  => 'required|string|unique:movies,slug',
            'origin_name'           => 'required|string',
            'content'               => 'required|string',
            'type'                  => 'required',
            'status'                => 'required',
            'director'              => 'required',

            // Logic cho Poster URL: Chỉ yêu cầu 1 trong 2 (text hoặc file)
            'poster_url_text'       => 'nullable|required_without:poster_url_file|string',
            'poster_url_file'       => 'nullable|required_without:poster_url_text|file',

            // Logic cho Thumb URL: Chỉ yêu cầu 1 trong 2 (text hoặc file)
            'thumb_url_text'        => 'nullable|required_without:thumb_url_file|string',
            'thumb_url_file'        => 'nullable|required_without:thumb_url_text|file',

            // Logic cho Trailer URL: Chỉ yêu cầu 1 trong 2 (text hoặc file)
            'trailer_url_text'      => 'nullable|required_without:trailer_url_file|string',
            'trailer_url_file'      => 'nullable|required_without:trailer_url_text|file',

            'album_url'             => 'required|array',
            'is_copyright'          => 'required',
            'sub_docquyen'          => 'required',
            'chieurap'              => 'required',
            'time'                  => 'required|numeric',
            'episode_current'       => 'required|numeric',
            'episode_total'         => 'required|numeric',
            'quality'               => 'required',
            'lang'                  => 'required',
            'year'                  => 'required',

            // Thêm vào bảng khác
            'category_id'           =>  'required',
            'country_id'            =>  'required',
            'actor_id'              =>  'required',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required'                     => 'Bạn chưa nhập vào ô tên phim.',
            'name.string'                       => 'Tên phim phải là một chuỗi ký tự.',

            'slug.required'                     => 'Bạn chưa nhập vào ô đường dẫn.',
            'slug.string'                       => 'Đường dẫn phải là một chuỗi ký tự.',
            'slug.unique'                       => 'Đường dẫn đã tồn tại, vui lòng chọn đường dẫn khác.',

            'origin_name.required'              => 'Bạn chưa nhập vào ô tên gốc phim.',
            'origin_name.string'                => 'Tên gốc phim phải là một chuỗi ký tự.',

            'content.required'                  => 'Bạn chưa nhập vào ô nội dung phim.',
            'content.string'                    => 'Nội dung phim phải là một chuỗi ký tự.',

            'type.required'                     => 'Bạn chưa nhập vào ô loại phim.',

            'status.required'                   => 'Bạn chưa nhập vào ô tình trạng phim.',

            'director.required'                 => 'Bạn chưa nhập vào ô đạo diễn phim.',

            'poster_url_text.required_without'  => 'Bạn cần phải nhập một URL hoặc tải lên một file cho Poster.',
            'poster_url_file.required_without'  => 'Bạn cần phải tải lên một file hoặc nhập một URL cho Poster.',

            'thumb_url_text.required_without'   => 'Bạn cần phải nhập một URL hoặc tải lên một file cho Thumbnail.',
            'thumb_url_file.required_without'   => 'Bạn cần phải tải lên một file hoặc nhập một URL cho Thumbnail.',

            'trailer_text.required_without'     => 'Bạn cần phải nhập một URL hoặc tải lên một file cho Trailer.',
            'trailer_file.required_without'     => 'Bạn cần phải tải lên một file hoặc nhập một URL cho Trailer.',

            'album_url.required'                => 'Bạn chưa nhập vào ô album phim.',
            'album_url.array'                   => 'Album phim phải là một mảng.',

            'is_copyright.required'             => 'Bạn chưa nhập vào ô bản quyền phim.',

            'sub_docquyen.required'             => 'Bạn chưa nhập vào ô dịch thuật phim.',

            'chieurap.required'                 => 'Bạn chưa nhập vào ô chiếu rạp phim.',

            'time.required'                     => 'Bạn chưa nhập vào ô thời lượng phim.',
            'time.numeric'                      => 'Ô thời lượng phim chỉ được nhập số.',

            'episode_current.required'          => 'Bạn chưa nhập vào ô số tập hiện tại.',
            'episode_current.numeric'           => 'Ô số tập hiện tại chỉ được nhập số.',

            'episode_total.required'            => 'Bạn chưa nhập vào ô tổng số tập.',
            'episode_total.numeric'             => 'Ô tổng số tập chỉ được nhập số.',

            'quality.required'                  => 'Bạn chưa nhập vào ô chất lượng phim.',

            'lang.required'                     => 'Bạn chưa nhập vào ô ngôn ngữ phim.',

            'year.required'                     => 'Bạn chưa nhập vào ô năm phát hành phim.',

            'category_id.required'              => 'Bạn chưa chọn thể loại cho phim.',
            
            'country_id.required'               => 'Bạn chưa chọn quốc gia cho phim.',

            'actor_id.required'                 => 'Bạn chưa chọn diễn viên cho phim.',
        ];
    }
}
