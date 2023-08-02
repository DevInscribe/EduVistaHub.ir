<?php
namespace App\Models;

use App\Models\Permission;
use App\Models\Role;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'img',
        'is_superuser',
        'is_staff',
        'username',
        'birth_year',
        'birth_month',
        'birth_day',
        'title_job',
        'about_us',
        'website',
        'telegram_link',
        'linkedin_link',
        'twitter_link',
        'instagram_link',
        'facebook_link',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isSuperUser(){
        return $this->is_superuser;
    }
    public function isStaffUser(){
        return $this->is_staff;
    }



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function setPasswordAttribute($value){
        $this -> attributes['password'] = bcrypt($value);
        
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function hasRole($roles){
        return !! $roles->intersect($this->roles)->all();

    }
    public function hasPermission($permission){

        return $this->permissions->contains('name',$permission->name) || $this->hasRole($permission->roles);
    }



}
