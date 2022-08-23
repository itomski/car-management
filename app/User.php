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

    protected $with = ['profile'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // OneToOne
    public function profile() {
        return $this->hasOne('App\Profile');
    }

    // OneToMany
    public function bookings() {
        return $this->hasMany('App\Booking');
    }

    // ManyToMany
    public function roles() {
        return $this->belongsToMany('App\Role', 'role_user')
            //->withTimestamps(); // created_at und updated_at
            ->withPivot('created_at'); // nur eine bestimmte spalte
    }

    public function hasRole($roleName) {
        
        $roleName = strtolower($roleName);

        foreach($this->roles as $role) {
            if(strtolower($role->name) === $roleName)
                return true;
        }
        return false;
    }
}
