<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = $this->permissions_tree();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissions = Permission::find($id);
        return view('permissions.show', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::find($id);
        return view('permissions.edit', compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'display_name' => 'required|string|max:150',
            'description' => 'required|string|max:150',
        ]);

        $input = $request->all();
        $permissions = Permission::find($id);
        $permissions->update($input);

        return redirect()->route('permissions.index')
            ->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }

    public function status($status, $id)
    {
        $permission = Permission::find($id);

        if (empty($permission)) {
            return redirect()->route('permissions.index')->with('success', '狀態更新失敗');
        }
        $permission->update(['status' => $status]);

        if (!empty(DB::table("permission_role")->where("permission_role.permission_id", $id))) {
            DB::table("permission_role")->where("permission_role.permission_id", $id)->delete();
        }

        return redirect()->route('permissions.index')
            ->with('success', '狀態更新成功');
    }

    public function permissions_tree()
    {
        $sql = "SELECT  CONCAT(REPEAT(' ｜', level - 1), display_name) AS treeitem, ho.id, parent_id, description, status, route, level
                FROM    (
                        SELECT  hierarchy_connect_by_parent_eq_prior_id(id) AS id, @level AS level
                        FROM    (
                                SELECT  @start_with := 0,
                                        @id := @start_with,
                                        @level := 0
                                ) vars, permissions
                        WHERE   @id IS NOT NULL
                        ) ho
                JOIN    permissions hi
                ON      hi.id = ho.id";
        $permissions = DB::select(DB::raw($sql));

//        dd($permissions);
        return $permissions;
    }
}
