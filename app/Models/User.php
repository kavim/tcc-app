<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'slug_name',
        'email',
        'password',
        'user_type_id'
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // RELATIONS

    public function type()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    // FUNCTIONS
    public function getFirstName(): string
    {
        return explode(' ', $this->name)[0];
    }

    public function getLastName(): string
    {
        return explode(' ', $this->name)[1];
    }
}
