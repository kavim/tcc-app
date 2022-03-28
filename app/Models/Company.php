<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $casts = [
        'social_networks' => 'array',
        'academic_institution_data' => 'array',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // FUNCTIONS
    public function getAvatar(): string
    {
        return $this->avatar ? ImageHelper::checkIfIsALink($this->avatar) : asset('images/default-male-avatart.png');
    }

    public function getCover(): string
    {
        return $this->cover ? ImageHelper::checkIfIsALink($this->cover) : asset('images/default-cover-4.jpg');
    }
}
