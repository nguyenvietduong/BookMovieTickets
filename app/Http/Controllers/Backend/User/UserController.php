<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\Backend\User\StoreUserRequest;
use App\Http\Requests\Backend\User\UpdateUserRequest;

use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use \Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;

class UserController extends Controller
{
    protected $userService;
    protected $userRepository;

    public function __construct(
        UserService $userService,
        UserRepository $userRepository,
    ) {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }


    public function index(Request $request)
    {
        $role               = 'user';
        $users              = $this->userService->paginate($request, $role);
        $config['model']    = 'User';
        $config['seo']      = config('apps.messages.user');

        // dd($users);
        return view('backend.user.user.index', compact('users', 'config'));
    }



    public function create()
    {
        $config['model']    = 'User';
        $config['seo']      = config('apps.messages.user');
        return view('backend.user.user.create', compact('config'));
    }


    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('backend.user.user.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }



    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $config['seo'] = config('apps.messages.user');
        return view('backend.user.user.update', compact('user', 'config'));
    }


    public function update($id, UpdateUserRequest $request)
    {
        // dd($request->all());
        if ($this->userService->update($id, $request)) {
            return redirect()->route('user.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.user');
        $user = $this->userRepository->findById($id);
        return view('backend.user.user.delete', compact('user', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->userService->destroy($id)) {
            return redirect()->route('user.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
