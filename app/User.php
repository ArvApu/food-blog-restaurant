<?php

namespace App;

use App\UserRole;
use App\Role;
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
    protected $fillable = [
        'username','first_name', 'last_name','email','password',
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
        return $this->belongsToMany(Role::class,'user_roles','user_id', 'role_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function ownerOfRecipe($id)
    {
        return in_array($id, $this->recipes()->pluck('id')->all()) || $this->isAdmin();
    }

    public function ownerOfComment($id)
    {
        return in_array($id, $this->comments()->pluck('id')->all()) || $this->isAdmin();
    }

    public function isAdmin()
    {
        return in_array(1, $this->roles()->pluck('role_id')->all());
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function($user) {
            $role = Role::where('name','=','User')->pluck('id')->first();
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $role
            ]);
        });
    }
}
