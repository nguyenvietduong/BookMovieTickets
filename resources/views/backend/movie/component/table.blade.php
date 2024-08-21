<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width:50px;">
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên phim</th>
            <th>Thời gian</th>
            <th>Tập / Tổng</th>
            <th>Chất lượng</th>
            <th>Ngôn ngữ</th>
            <th>Phát hành</th>
            <th>Views</th>
            <th>Tác giả</th>
            <th>Thể loại</th>
            <th>Loại phim</th>
            <th class="text-center">Tùy chọn</th>

        </tr>
    </thead>
    <tbody>
        @if (isset($movies) && is_object($movies))
        @foreach ($movies as $movie)
        <tr id="{{ $movie->id }}">
            <td>
                <input type="checkbox" value="{{ $movie->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td>
                <div class="uk-flex uk-flex-middle">
                    @if ($movie->poster_url && Storage::exists($movie->poster_url))
                    <div class="image mr5">
                        <div class="img-cover image-article"><img src="" alt="" width="35px">{{ Storage::url($movie->poster_url) }}</div>
                    </div>
                    @endif
                    <div class="main-info">
                        <div>{{ $movie->name }}</div>
                    </div>
                </div>
            </td>

            <td>
                {{ $movie->time }} phút
            </td>

            <td>
                {{ $movie->episode_current }} / {{ $movie->episode_total }}
            </td>

            <td>
                <span class="badge text-bg-secondary">{{ $movie->quality }}</span>
            </td>

            <td>
                {{ $movie->lang }}
            </td>

            <td>
                Năm {{ $movie->year }}
            </td>

            <td>
                {{ $movie->view }}
            </td>

            <td>
                <b>
                    @if ($movie->director)
                    <span class="badge text-bg-primary">{{ $movie->director }}</span>
                    @else
                    <span class="badge text-bg-primary">Không có thông tin tác giả</span>
                    @endif
                </b>
            </td>

            <td>
                <ul>
                    @if ($movie->categories && $movie->categories->isNotEmpty())
                    @foreach ($movie->categories as $actor)
                    <li style="margin-bottom: 5px;">
                        {{ $actor->name }} @if($actor->trashed()) (Đã xóa) @endif
                    </li>
                    @endforeach
                    @else
                    <li>
                        Không có thể loại
                    </li>
                    @endif
                </ul>
            </td>


            <td>
                @foreach (config('apps.setup.movie_types') as $key => $val)
                @if ($key == $movie->type)
                {{ $val }}
                @endif
                @endforeach
            </td>

            <td class="text-center">
                <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="{{ route('movie.delete', $movie->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

{{ $movies->links('pagination::bootstrap-4') }}