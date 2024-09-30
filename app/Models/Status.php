<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    const STATUS_PENDING =1;
    const STATUS_REVIEW =2;
    const STATUS_SCHEDULED =3;
    const STATUS_COMPLETED =4;
    const STATUS_ACCEPTED =5;
    const STATUS_REJECTED =5;
}
