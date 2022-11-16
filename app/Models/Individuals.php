<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class Individuals extends Model
{
    protected $primaryKey = 'individual_id';

    protected $table = "individuals";
    protected $guarded = [];
    public $timestamps = false;

    public function members()
    {
        return $this->hasMany(FamilyMembers::class, 'individual_id_fk', 'individual_id');
    }

    public function create_by()
    {
        return $this->hasOne(Admin::class, 'id', 'created_by');
    }
}
