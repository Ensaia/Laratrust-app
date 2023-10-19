<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $roles['roles'] = User::with('roles')->where('id', '=', $id)->get();
        return view('user-role.index', $roles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users['users'] = User::all();
        $roles['roles'] = Role::all();
        return view('user-role.create', $users, $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'role_id' => 'required'
        ];
        $messages = [
            'user_id.required' => 'يرجى تعبئة الحقل الخاص برقم المستخدم',
            'role_id.required' => 'يرجى تعبئة الحقل الخاص برقم الدور'
        ];
        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return redirect()->route('attachUserRole')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::findOrFail($request->user_id);
            // parameter can be a Role object, BackedEnum, array, id or the role string name
            $user->roles()->attach([
                $request->role_id
            ]);
            if ($user) {
                return redirect()->route('attachUserRole')->with('success', 'تمت عملية إضافة البيانات بنجاح');
            } else {
                return redirect()->route('attachUserRole')->with('error', 'حدوث خطأ اثناء عملية إضافة البيانات');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        // parameter can be a Role object, BackedEnum, array, id or the role string name
        $user->roles()->detach([
            $request->role_id
        ]);
        if ($user) {
            return redirect()->route('userRolesIndex', [
                'id' => $id
            ])->with('success', 'تمت عملية تحديث البيانات بنجاح');
        } else {
            return redirect()->route('userRolesIndex', [
                'id' => $id
            ])->with('error', 'حدوث خطأ اثناء عملية تحديث البيانات');
        }
    }
}
