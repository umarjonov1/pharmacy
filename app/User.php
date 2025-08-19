<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_CUSTOMER = 0;
    const ROLE_ADMIN = 1;
    const ROLE_PHARMACIST = 2;
    const ROLE_COURIER = 3;

    public static function roleList()
    {
        return [
            self::ROLE_CUSTOMER,
            self::ROLE_ADMIN,
            self::ROLE_PHARMACIST,
            self::ROLE_COURIER
        ];
    }

    public function getRoleAttribute()
    {
        return self::roleList()[$this->attributes['role']] ?? 'Not specified';
    }

    public function getRoleTitleAttribute()
    {
        switch ($this->role) {
            case 0:
                return 'Customer';
            case 1:
                return 'Admin';
            case 2:
                return 'Pharmacist';
            case 3:
                return 'Courier';
            default: {
                return 'None';
            }
        }
    }

    public function pharmacist()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'image'
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
}
