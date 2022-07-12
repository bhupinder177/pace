<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'logo',
        'email',
        'address',
        'phone',
        'fax',
        'mobile',
        'copy_right',
        'facebook',
        'instagram',
        'twitter',
    ];
}
