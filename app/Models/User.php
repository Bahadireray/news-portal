<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const TYPE_ADMIN = 'ADMIN';

    const TYPE_MODERATOR = 'MODERATOR';

    const TYPE_EDITOR = 'EDITOR';

    const TYPE_USER = 'USER';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    public function getTypeOptions() {
        return [
            self::TYPE_ADMIN => 'Admin',
            self::TYPE_MODERATOR => 'Moderator',
            self::TYPE_EDITOR => 'Editor',
            self::TYPE_USER => 'User'
        ];
    }

    public static function getTypeName($type) {
        $type = 'TYPE_' . $type;

        return static::$type;
    }
}
