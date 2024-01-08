<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Passport\HasApiTokens;

class User extends Model implements AuthContract
{
    use Authenticatable, HasApiTokens, HasFactory;
    protected $table = 'users';
    protected $guarded = false;
    protected $hidden = [
        'created_at',
        'updated_at',
        'password'
    ];
    protected $casts = [
        'birth_day' => 'date'
    ];
    public function gender():BelongsTo
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }
    public function position():BelongsTo
    {
        return $this->belongsTo(Position::class,'position_id');
    }
    public function city():BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public  function  getFullName(){
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }
}
