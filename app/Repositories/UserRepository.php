<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getByRole($role, $paginate = 4)
    {
        return User::where('role', $role)->paginate($paginate);
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function update($id, array $data)
    {
        return User::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }

    public function updateRoleAndStatus($id, $status, $role)
    {
        return User::where('id', $id)->update([
            'user_status' => $status,
            'role' => $role
        ]);
    }

}
