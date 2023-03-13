<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'phone_number',
        'role',
        'degree',
        'experience',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public static function getInfoUser()
    {
        $user = User::all()->where('id', Auth::id());
        return $user;
    }

    public static function updateInfo($data)
    {
        User::where('id', $data['id'])->update([
            'user_name' => $data['user_name'],
            'phone_number' => $data['phone_number'],
            'degree' => $data['degree'],
            'experience' => $data['experience'],
        ]);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id');
    }

}
