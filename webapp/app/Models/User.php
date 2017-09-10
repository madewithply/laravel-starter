<?php

namespace App\Models;

use App\Notifications\Auth\ResetPasswordNotification as ResetPasswordNotification;
use App\Traits\HasAttachments;
use App\Traits\HasHeroImage;
use App\Traits\HasImages;
use App\Traits\HasPhoto;
use Backpack\CRUD\CrudTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Plank\Mediable\Mediable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{

    /*
    |--------------------------------------------------------------------------
    | TRAITS
    |--------------------------------------------------------------------------
    */
    use Notifiable;
    use CrudTrait;
    use HasRoles;
    use Mediable;
    use HasAttachments;
    use HasImages;
    use HasPhoto;
    use HasHeroImage;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function getFullName()
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * Send the password reset notification.
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
