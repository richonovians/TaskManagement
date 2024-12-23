<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request) {
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo('view posts');
        $adminRole->givePermissionTo('create posts');

        $userRole = Role::findByName('user');
        $userRole->givePermissionTo('view posts');
        $user = User::find(3); // misal pengguna dengan ID 1
        $user->assignRole('admin');
    }
}
