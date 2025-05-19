<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentityType extends Model
{
    protected $table = 'identity_type';

    protected $fillable = ['name',];
}
