<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(UserRequest $request, User $user, ImageUploadHandler $file)
    {
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
