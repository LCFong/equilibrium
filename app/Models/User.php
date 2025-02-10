<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use LaravelAndVueJS\Traits\LaravelPermissionToVueJS;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Notifiable;
    use LaravelPermissionToVueJS;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'dob', 'education'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $with=['roles'];

    protected static function boot(){
        parent::boot();
        // static::created(
        //     function($user){
        //         $role = Role::find(1);
        //         if( $role ){
        //             // dd($user->roles);  
        //             $user->roles()->attach( Role::find(1) );
        //         }
        // });
    }

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }

    public function mediates(){
        return $this->hasMany(Mediate::class);
    }

    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }

    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
    
    public function quizToday(){
        return $this->quizzes->where('created_at','>=',date('Y-m-d'));
    }
}
