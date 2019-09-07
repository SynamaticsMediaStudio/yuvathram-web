<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'phone', 'gender','date_of_birth','blood_group','country','state','city','is_donated_before','is_available'];

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
        'phone_verified_at' => 'datetime',
        "date_of_birth"     => 'date',
        "is_donated_before" => 'boolean',
        "is_available"      => 'boolean',
    ];
    protected $appends  = ['gender_formatted'];
    public function getGenderFormattedAttribute()
    {
        $gender = "";
        switch ($this->gender) {
            case 'male':
                $gender = "Male";
                break;
            case 'trans':
                $gender = "Trans";
                break;
            case 'female':
                $gender = "Female";
            break;
            default:
                $gender = "Male";
                break;
        }
        return $gender;
    }
}
