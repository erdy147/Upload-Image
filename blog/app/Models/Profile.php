<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    public function getProfilePictureAttribute($value){
        return url("storage/app/".$value);
    }
}
