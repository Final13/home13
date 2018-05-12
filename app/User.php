<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed birthday
 * @property mixed full_name
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

//        return $birthday->diffForHumans();
        $diff = Carbon::now()->endOfDay()->diffInDays($birthday,false);

        if ($diff < 0)
        {
            $diff = $birthday->addYear()->diffInDays(Carbon::now()->endOfDay());
        }
        return $diff;
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function scopeGetBirthdayUsersForMailing($query, $type)
    {
        return $query->whereDay('birthday', '=', Carbon::now()->endOfDay()->addDays($type)->day)
            ->whereMonth('birthday', '=', Carbon::now()->endOfDay()->addDays($type)->month);
    }

    public function scopeGetNotifyUsersForMailing($query, $type)
    {
        return $query->whereDay('birthday', '<>', Carbon::now()->endOfDay()->addDays($type)->day)
            ->whereMonth('birthday', '<>', Carbon::now()->endOfDay()->addDays($type)->month);
    }
}
