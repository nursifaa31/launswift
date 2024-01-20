<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogM extends Model
{
    use HasFactory;
    protected $table = "log";
    protected $fillable = ["id", "id_user", "activity"];

}
