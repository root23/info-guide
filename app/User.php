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

    /**
     * Список ролей пользователя
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'user_roles');
    }

    /**
     * Есть ли роли у пользователя
     * @param $roles
     *
     * @return bool
     */
    public function hasAnyRoles($roles) {
        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }
        return false;
    }

    /**
     * Есть ли эта роль у пользователя
     * @param $role
     *
     * @return bool
     */
    public function hasRole(string $roleName) {
        if ($this->roles()->where('name', $roleName)->first()) {
            return true;
        }
        return false;
    }

    public function getIsAdminAttribute() {
        return $this->roles()->where('role_id', 1)->exists();
    }
}
