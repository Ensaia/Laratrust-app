<?php
namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $permissions['permissions'] = User::with('permissions')->where('id', '=', $id)->get();
        return view('user-permission.index', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users['users'] = User::all();
        $permissions['permissions'] = Permission::all();
        return view('user-permission.create', $users, $permissions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'permission_id' => 'required'
        ];
        $messages = [
            'user_id.required' => 'يرجى تعبئة الحقل الخاص برقم المستخدم',
            'permission_id.required' => 'يرجى تعبئة الحقل الخاص برقم اﻹذن'
        ];
        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return redirect()->route('attachUserPermission')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::findOrFail($request->user_id);
            // parameter can be a Role object, BackedEnum, array, id or the role string name
            $user->permissions()->attach([
                $request->permission_id
            ]);
            if ($user) {
                return redirect()->route('attachUserPermission')->with('success', 'تمت عملية إضافة البيانات بنجاح');
            } else {
                return redirect()->route('attachUserPermission')->with('error', 'حدوث خطأ اثناء عملية إضافة البيانات');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , string $id)
    {
        $user = User::findOrFail($id);
        $user->permissions()->detach([
            $request->permission_id
        ]);
        if ($user) {
            return redirect()->route('userPermissionsIndex', [
                'id' => $id
            ])->with('success', 'تمت عملية تحديث البيانات بنجاح');
        } else {
            return redirect()->route('userPermissionsIndex', [
                'id' => $id
            ])->with('error', 'حدوث خطأ اثناء عملية تحديث البيانات');
        }
    }
}
