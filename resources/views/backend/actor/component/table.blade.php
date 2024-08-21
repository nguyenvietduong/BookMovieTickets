<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th class="text-center">Hình ảnh</th>
            <th class="text-center">Tên diễn viên</th>
            <th class="text-center">Trong phim</th>
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($actors) && is_object($actors))
        @foreach ($actors as $actor)
        <tr>
            <td>
                <input type="checkbox" value="{{ $actor->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td class="text-center">
                <img src="{{ Storage::url($actor->image) }}" width="50px" height="50px" alt="{{ $actor->name }}">
            </td>
            <td class="text-center">
                {{ $actor->name }}
            </td>
            <td class="text-center">
                @if ($actor->movies)
                    @foreach ($actor->movies as $movie)
                        <span class="badge text-bg-success">{{ $movie->name }}</span>
                    @endforeach
                @else
                    <span class="badge text-bg-success">Null</span>
                @endif
            </td>

            <td class="text-center">
                <a href="{{ route('actor.edit', $actor->id) }}" class="btn btn-success"><i
                        class="fa fa-edit"></i></a>
                <a href="{{ route('actor.delete', $actor->id) }}" class="btn btn-danger"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $actors->links('pagination::bootstrap-4') }}