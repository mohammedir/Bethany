<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Events extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = "events";
    protected $guarded = [];
    public $timestamps = false;


}
