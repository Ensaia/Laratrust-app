<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Permission;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions['permissions'] = Permission::all();
        return view('permission.index',$permissions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:permissions',
            'display_name' => 'required',
            'description' => 'required',
        ];
        $messages = [
            'name.required' => 'يرجى تعبئة الحقل الخاص باسم اﻹذن',
            'display_name.required' => 'يرجى تعبئة الحقل الخاص عنوان اﻹذن',
            'description.required' => 'يرجى تعبئة الحقل الخاص بوصف اﻹذن',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
            return redirect()->route('permissionCreate')
            ->withErrors($validator)
            ->withInput();
        }else{
            $permission = Permission::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description,
            ]);
            if($permission){
                return redirect()->route('permissionCreate')->with('success', 'تمت عملية إضافة البيانات بنجاح');
            }else{
                return redirect()->route('permissionCreate')->with('error', 'حدوث خطأ اثناء عملية إضافة البيانات');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission['permission'] = Permission::findOrFail($id);
        return view('permission.edit',$permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ];
        $messages = [
            'name.required' => 'يرجى تعبئة الحقل الخاص باسم اﻹذن',
            'display_name.required' => 'يرجى تعبئة الحقل الخاص عنوان اﻹذن',
            'description.required' => 'يرجى تعبئة الحقل الخاص بوصف اﻹذن',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
            return redirect()->route('permissionEdit',['id' => $id])
            ->withErrors($validator)
            ->withInput();
        }else{
            $permission = Permission::findOrFail($id);
            $permission->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description,
            ]);
            if($permission){
                return redirect()->route('permissionEdit',['id' => $id])->with('success', 'تمت عملية تحديث البيانات بنجاح');
            }else{
                return redirect()->route('permissionEdit',['id' => $id])->with('error', 'حدوث خطأ اثناء عملية تحديث البيانات');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::where('id', $id)->delete();
        if($permission){
            return redirect()->route('permissionsIndex')->with('success', 'تمت عملية حذف البيانات بنجاح');
        }else{
            return redirect()->route('permissionsIndex')->with('error', 'حدوث خطأ اثناء عملية حذف البيانات');
        }
    }
}
