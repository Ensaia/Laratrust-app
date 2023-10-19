<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Helpers\Authorization;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users['users'] = User::with('roles')->paginate(10);
//        $users['abilities'] = User::with('abilities')->get();
        return view('user.index', $users);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
       
        $user = User::where('id','=', $id)->delete();
        if ($user) {
            return redirect()->route('usersIndex')->with('success', 'تمت عملية حذف البيانات بنجاح');
        } else {
            return redirect()->route('usersIndex')->with('error', 'حدوث خطأ اثناء عملية حذف البيانات');
        }
    }
}
