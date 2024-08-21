<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Tên bài viết</th>
            <th>Người viết</th>
            <th>Nội dung</th>
            <th class="text-center">Trạng thái </th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($comments) && is_object($comments))
        @foreach ($comments as $comment)
        <tr>
            <td>
                @if (isset($comment->article->name))
                {{ $comment->article->name }}
                @endif
            </td>

            <td>
                {{ $comment->user->name }}
            </td>
            <td>
                {{ $comment->content }}
            </td>
            <td class="text-center js-switch-{{ $comment->id }}">
                <input type="checkbox" value="{{ $comment->publish }}" class="js-switch status" data-field="publish" data-model="{{ $config['model'] }}" {{ $comment->publish == 2 ? 'checked' : '' }} data-modelId="{{ $comment->id }}" />
            </td>
            <td class="text-center">
                <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="{{ route('comment.delete', $comment->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $comments->links('pagination::bootstrap-4') }}