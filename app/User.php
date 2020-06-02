<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function givePermission($permissions)
    // {
    //     // $permissions = Permission::whereIn('name', $permissions)->get();
    //     $permissions = $this->allPermissions(\Arr::flatten($permissions));
    //     dd(\Arr::flatten($permissions->pluck('name'))); 
    // }

    public function hasPermissionTo($permission)
    {
        // return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
        // return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
        return $this->hasPermissionThroughRole($permission);
    }

    protected function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            // dd($permission->name, $role->name);
            if ($this->roles->contains($role)) {
                return true;
            }
        }

        return false;
    }

    // public function hasPermission($permission)
    // {   
    //     return $this->permissions->where('name', $permission->name)->count();    
    // }

    public function hasRole(... $roles) // check if user has role
    {
        foreach($roles as $role){
            if($this->roles->contains('name', $role)){
                return true;
            }
        }

        return false;

        // return $this->roles->contains('name', $role);

        // return $this->roles()->where('name', $role)->exists();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');    
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
    }
}
