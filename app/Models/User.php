<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'user_type',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $appends = [
        'avatar_image_url',
        'user_type_name',
        'is_admin',
        'is_default'
    ];

    public function answers() 
    {
        return $this->hasMany(Answer::class);
    }

    public function results() 
    {
        return $this->hasMany(Result::class);
    }

    public function sendPasswordResetNotification($token) 
    {
        $this->notify(new ResetPasswordNotification($token, $this->email, $this->name));
    }

    protected function avatarImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email)))
        );
    }

    protected function userTypeName(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                1 => 'Administrador',
                2 => 'Padrão'
            ][$this->user_type]
        );
    }

    protected function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->user_type == 1
        );
    }

    protected function isDefault(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->user_type == 2
        );
    }
}
