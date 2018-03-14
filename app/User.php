<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed birthday
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $appends = ['full_name'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'birthday'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasAnyRole(['manager']);
    }

    /**
     * @param $roles
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * @return int|string
     */
    public function daysToBirthday()
    {
        if (!$this->birthday)
            return '--';

        $birthday = Carbon::parse($this->birthday)->endOfDay()->year(date('Y'));

        return $birthday->diffForHumans();
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
