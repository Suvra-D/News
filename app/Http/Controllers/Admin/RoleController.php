<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use DB;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolepage_name = 'Roles List';
        $roledata = Role::all();
        return view('admin.role.list',compact('roledata','rolepage_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolepage_create = 'Role';
        $role_permission = Permission::pluck('name','id');
        return view('admin.role.create',compact('role_permission','rolepage_create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'permission' => 'required|array',
            'permission.*' => 'required|string',
        ],
        [
            'name.required' => 'Name field is required',
            'permission.required' => 'Role permission is required',
            'permission.*.required' => 'Permission is required'
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        foreach($request->permission as $value) {
            $role->attachPermission($value);
        }
        return redirect()->action('Admin\RoleController@index')->with('success',"Role Permission Successfully Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editrole_name = 'Edit Role';
        $role = Role::find($id);
        $role_permission = Permission::pluck('id','name');
        $selectedpermission = DB::table('permission_role')->where('permission_role.role_id',$id)->pluck('permission_id')->toArray();
        return view('admin.role.edit',compact('role','role_permission','selectedpermission','editrole_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'permission'=>'required|array',
            'permission.*'=>'required|string',
        ],
        [
            'name.required'=>'Name field is required',
            'permission.required'=>'You have to select permission',
            'permission.*.required'=>'You have to select a permission',
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        DB::table('permission_role')->where('role_id',$id)->delete();
        foreach($request->permission as $value) {
            $role->attachPermission($value);
        }
        return redirect()->action('Admin\RoleController@index')->with('success','Role Permission Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id',$id)->delete();
        return redirect()->action('Admin\RoleController@index')->with('success',"Role Permission Successfully Deleted");
    }
}
