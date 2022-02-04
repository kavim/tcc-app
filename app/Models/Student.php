<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'cover',
        'enrollment',
        'document',
        'registration_proof',
        'open_to_work',
        'phone',
        'academic_institution_email',
        'academic_institution_data',
        'social_networks',
        'resume',
        'user_id'
    ];

    protected $casts = [
        'social_networks' => 'array',
        'academic_institution_data' => 'array',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // FUNCTIONS
    public function getAvatar(): string
    {
        return $this->avatar ? asset('storage/' . $this->avatar) : asset('images/default-male-avatart.png');
    }

    public function getCover(): string
    {
        return $this->cover ? asset('storage/' . $this->cover) : asset('images/default-cover-4.jpg');
    }

    public function getBirthDateBr()
    {
        return $this->birth_date ? Carbon::parse($this->birth_date)->format('d/m/Y') : null;
    }
}
