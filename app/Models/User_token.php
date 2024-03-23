<?php

namespace App\Models;
use Str;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class User_token extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'token',
        'expiredAt',
        'userId'
    ];
    protected $table = 'user_tokens';

    protected function getToken()
    {
        return Str::random(40);
    }

    public function createActivation($user)
    {

        $activation = $this->getActivation($user);

        if (!$activation) {
            return $this->createToken($user);
        }
        return $this->regenerateToken($user);

    }

    private function regenerateToken($user)
    {

        $token = $this->getToken();
        User_token::where('user_id', $user->id)->update([
            'token' => $token,
            'expiredAt' => Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(10)
        ]);
        return $token;
    }

    private function createToken($user)
    {
        $token = $this->getToken();
        User_token::insert([
            'userId' => $user->id,
            'token' => $token,
            'expiredAt' => Carbon::now('Asia/Ho_Chi_Minh')->addHours(24)
        ]);
        return $token;
    }

    public function getActivation($user)
    {
        return User_token::where('userId', $user->id)->first();
    }

    public function getActivationByToken($token)
    {
        return User_token::where('token', $token)->first();
    }

    public function deleteActivation($token)
    {
        User_token::where('token', $token)->delete();
    }
}
