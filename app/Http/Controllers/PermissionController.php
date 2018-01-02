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
        $categories = $this->getChildCategories();
        return view('permissions.index', compact('categories'));
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


    /**
     * 由最上層開始遞迴取得各層分類
     * @param int $of_id 上層分類id，0 為最上層
     * @return array
     */
    private function getChildCategories( $of_id = 0 )
    {
        $item = [];
        // 取得某一個分類的第一層子分類，並且只取回 id of_id title 欄位
        // 第一次取得的是最上層
        // $categories 為 collection
        $categories = Permission::where( 'parent_id', $of_id )
            ->get( [ 'id', 'parent_id', 'display_name','description','status' ] );
        // 遞迴取得所有下層子分類
        foreach ( $categories as $category ) {
            $childs = $this->getChildCategories( $category[ 'id' ] );
            // 某分類及其子分類包成陣列後存入陣列
            $item[] = compact( 'category', 'childs' );
        }
        return $item;
    }

}
