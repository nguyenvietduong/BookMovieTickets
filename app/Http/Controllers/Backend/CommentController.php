<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CommentRepositoryInterface  as CommentRepository;
use App\Services\Interfaces\CommentServiceInterface         as CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentRepository;
    protected $commentService;

    public function __construct(
        CommentRepository $CommentRepository,
        CommentService $commentService,
    ) {
        $this->commentRepository = $CommentRepository;
        $this->commentService = $commentService;
    }

    public function index(Request $request)
    {
        $config['model']    = 'Comment';
        $config['seo']      = config('apps.messages.comment');
        $comments           = $this->commentService->paginate($request);
        return view('backend.comment.index', compact('config', 'comments'));
    }

    public function edit($id)
    {
        $config['model']    = 'Comment';
        $config['seo']      = config('apps.messages.comment');
        $comment = $this->commentRepository->findById($id);
        
        return view('backend.comment.edit', compact('comment', 'config'));
    }

    public function update(Request $request, $id)
    {
        if ($this->commentService->update($id, $request)) {
            return redirect()->route('comment.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('comment.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo']      = config('apps.messages.comment');
        $comment            = $this->commentRepository->findById($id);
        return view('backend.comment.delete', compact('comment', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->commentService->destroy($id)) {
            return redirect()->route('comment.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('comment.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}