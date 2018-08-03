<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'user_id','hajNumber', 'boardNumber', 'address', 'hamlaName', 'hamlaNumber', 'hamlaContact',
        'healty','avatar','lat','long',
    ];
public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
}
