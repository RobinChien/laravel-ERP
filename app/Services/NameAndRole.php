<?php
namespace App\Services;

use App\User;
use App\Role;
use App\Permission;
use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\EntrustPermission;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class NameAndRole
{
    public $user_id;
    public $user_name;
    public $role;
    public $permission;
    public $menu_chile;
    public $menu_parent;

    public function __construct() {
        $user = \Auth::user();
        $this->user_id = $user->user_id;
        $this->user_name = $user->user_name;
        $this->role = $user->roles;
        $this->permission = $user->roles->first()->permissions->pluck('id','parent_id','name','display_name');
//        $parent_id = $this->permission->unique('parent_id')->toArray();
        foreach ($this->permission as $key=> $value){
            $this->menu_child[] = Permission::select('id','parent_id','name','display_name','route')->where('id', $key)->get();
        }
        foreach ($this->menu_child as $key => $value){
            $this->menu_parent[] = DB::table('permissions')
                                                ->select('id','parent_id','name','display_name')
                                                ->where('id', $value->pluck('parent_id'))->get();
        }
        $this->menu_parent = array_unique($this->menu_parent);
//        dd($this);
    }
}