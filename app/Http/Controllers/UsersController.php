<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>'show']); //首选except 这是最佳实践
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('users.edit', compact('user'));
    }
    public function update(UserRequest $request, User $user, ImageUploadHandler $file)
    {
        $this->authorize('update',$user);
        $data = $request->all();
        if ($request->avatar) {
            $fileName = $file->save($request->avatar, 'avatar', $user->id,250);
            if ($fileName) {
                $data['avatar'] = $fileName['path'];
            }
        }
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '用户信息修改成功！');
    }
}
