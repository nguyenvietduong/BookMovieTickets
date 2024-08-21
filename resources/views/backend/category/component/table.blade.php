<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên danh mục</th>
            <th>Slug</th>
            <th>Số lượng phim</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($categories) && is_object($categories))
            @foreach ($categories as $category)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $category->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->slug }}
                    </td>
                    <td>
                        {{ $category->movies_count ?? 0 }} Phim
                    </td>
                    <td class="text-center">
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $categories->links('pagination::bootstrap-4') }}
