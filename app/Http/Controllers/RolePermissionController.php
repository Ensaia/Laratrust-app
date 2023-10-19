<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RolePermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $roles['roles'] = Role::with('permissions')->where('id', '=', $id)->get();
        return view('role-permission.index', $roles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles['roles'] = Role::all();
        $permissions['permissions'] = Permission::all();
        return view('role-permission.create', $roles, $permissions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'role_id' => 'required',
            'permission_id' => 'required'
        ];
        $messages = [
            'role_id.required' => 'يرجى تعبئة الحقل الخاص برقم الدور',
            'permission_id.required' => 'يرجى تعبئة الحقل الخاص برقم اﻹذن'
        ];
        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return redirect()->route('roleAttachPermission')
                ->withErrors($validator)
                ->withInput();
        } else {
            $role = Role::findOrFail($request->role_id);
            $role->permissions()->attach([
                $request->permission_id
            ]);
            if ($role) {
                return redirect()->route('roleAttachPermission')->with('success', 'تمت عملية إضافة البيانات بنجاح');
            } else {
                return redirect()->route('roleAttachPermission')->with('error', 'حدوث خطأ اثناء عملية إضافة البيانات');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $role->permissions()->detach([
            $request->permission_id
        ]);
        if ($role) {
            return redirect()->route('rolePermissionsIndex', [
                'id' => $request->role_id
            ])->with('success', 'تمت عملية حذف البيانات بنجاح');
        } else {
            return redirect()->route('rolePermissionsIndex', [
                'id' => $request->role_id
            ])->with('error', 'حدوث خطأ اثناء عملية حذف البيانات');
        }
    }
}
