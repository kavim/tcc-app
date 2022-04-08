<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'email',
        'phone',
        'address',
        'avatar',
        'cover',
        'website',
        'resume',
        'verified',
        'social_networks',
        'bio'
    ];

    protected $casts = [
        'social_networks' => 'array',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // FUNCTIONS
    public function getAvatar(): string
    {
        return $this->avatar ? ImageHelper::checkIfIsALink($this->avatar) : asset('images/default-img.jpg');
    }

    public function getCover(): string
    {
        return $this->cover ? ImageHelper::checkIfIsALink($this->cover) : asset('images/default-cover-4.jpg');
    }

    public function isVerified(): string
    {
        return $this->verified ? 'Verificado' : 'No verificado';
    }

    public function checkVerified()
    {
        return $this->verified ? true : false;
    }
}
