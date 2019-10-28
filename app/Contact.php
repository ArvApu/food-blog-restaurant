<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['address', 'longitude', 'latitude', 'manager', 'user_id', 'email', 'phone_number'];

    protected $table = 'contacts_information';
}
