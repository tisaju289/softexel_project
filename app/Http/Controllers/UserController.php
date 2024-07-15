<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function UserListPage(){
        $users = User::all();
        return view('dashboard.component.user.user-list', compact('users'));
    }
    
   public function UserAssignRoleEditPage($id)
    {
        $user = User::find($id); 
      
        if (!$user) {
            return redirect()->route('dashboard.component.user.user-list')->with('error', 'User not found.');
        }
        $roles = Role::all();
        return view('dashboard.component.user.assign-role', compact('user', 'roles'));
    }


    public function UserAssignRoleUpdate(Request $request, $id)
    {
       
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user-list')->with('error', 'User not found.');
        }

        $roles = $request->roles;

        $user->syncRoles($roles);

        return redirect()->route('user-list')->with('success', 'Roles updated successfully!');
    }



}
