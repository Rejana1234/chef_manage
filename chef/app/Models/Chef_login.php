<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Chef_login extends Model
{
    use HasApiTokens, HasFactory;
    public $timestamps=false;
}
