<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên quốc gia</th>
            <th>Slug</th>
            <th>Số lượng phim</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($countries) && is_object($countries))
            @foreach ($countries as $country)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $country->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{ $country->name }}
                    </td>
                    <td>
                        {{ $country->slug }}
                    </td>
                    <td>
                        {{ $country->movies_count ?? 0 }} Phim
                    </td>
                    <td class="text-center">
                        <a href="{{ route('country.edit', $country->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('country.delete', $country->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $countries->links('pagination::bootstrap-4') }}
