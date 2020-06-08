<?php

namespace App;

use App\Events\UserCreatedEvent;
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
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UserCreatedEvent::class,
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

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasRole($role)
    {
        $roles = $this->roles()->where('name', $role)->count();
        if ($roles == 1)
        {
            return true;
        }
        return false;
    }

    public function times()
    {
        return $this->hasMany(Times::class);
        // select * from times where user_id = id
    }

    public function pauses()
    {
        return $this->hasMany(Pauses::class);
    }
    public function workingHours()
    {
        return $this->hasMany(WorkingHours::class);
    }

    public function management()
    {
        return $this->hasOne(Management::class);
    }

}
