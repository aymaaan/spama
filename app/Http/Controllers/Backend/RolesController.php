<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\PermissionRole;
use Session;
use Auth;
use Gate;

class RolesController extends Controller
{

	public function __construct()
  {
    $this->middleware('auth');

  }

  
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       if ( Gate::denies('roles') ) { abort(404); }
       $roles = Role::all();
       return view('backend.pages.settings.users.roles.index',compact('roles') );
    }
	
	public function create()
    {
        if ( Gate::denies(['roles','create_role']) ) { abort(404); }
	    $permissions = Permission::where('parent_id' , 0)->get();
        return view('backend.pages.settings.users.roles.create' , compact('permissions') );
    }
	
	public function store(Request $request)
    {
        if ( Gate::denies(['roles','create_role']) ) { abort(404); }
	    //Store New Role
		$Role = new Role;
		$Role-> title = $request->title;
		$Role ->save();


		//Store Role Permissions
		foreach ($request->permissions as $permission) {

		$permissions = new PermissionRole;
		$permissions-> role_id = $Role->id;
		$permissions-> permission_id = $permission;
		$permissions ->save();
		}
        Session::flash('msg', 'تم اضافة مجموعة الـ' . $Role->title);
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath').'/roles');
    }
	
	
	public function edit($id)
    {
    if ( Gate::denies(['roles','update_role']) ) { abort(404); }
    $role= Role::find($id);
	$permissions = Permission::where('parent_id' , 0)->get();
    return view('backend.pages.settings.users.roles.edit' , compact('role','permissions') );
    }
	
	
	public function update(Request $request, $id)
    {
        if ( Gate::denies(['roles','update_role']) ) { abort(404); }
	    $Role= Role::find($id);
        $Role-> title = $request->title;
		$Role -> save();

		//Delete old Permissions that not included in array $request->permissions
		$role_prem = PermissionRole::whereRoleId($Role->id)->get();
		if (empty($role_prem->role_id) && isset($request->permissions)) {
		foreach ($role_prem as $permission) {
		if (!in_array($permission->permission_id,$request->permissions)) {
        $PermissionRole = PermissionRole::wherePermissionId($permission->permission_id)->whereRoleId($permission->role_id)->first();
		$PermissionRole = PermissionRole::find($PermissionRole->id);
        $PermissionRole->delete();
		}
		}
		}
		
		
		//Store New Permissions
		if (isset($request->permissions)){
		foreach ($request->permissions as $permission) {
		$prev_prem = PermissionRole::whereRoleId($Role->id)->wherePermissionId($permission)->first();
		if (empty($prev_prem->role_id)) {
		$permissions = new PermissionRole;
		$permissions-> role_id = $Role->id;
		$permissions-> permission_id = $permission;
		$permissions -> save();
		}
		}
		}
		

        Session::flash('msg', 'تم تحديث مجموعة الـ' . $Role->title);
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath').'/roles');
    }


}