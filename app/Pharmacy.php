<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $table = 'pharmacies';
    protected $fillable = ['title', 'address', 'owner', 'pharmacist','lat', 'lng'];

    public function pharmacistUser()
    {
        return $this->belongsTo(User::class, 'pharmacist');
    }
}
