<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Application extends Model
{
    use HasFactory,Notifiable;
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function attachments()
    {
        return $this->hasMany(ApplicationAttachment::class);
    }
    public function referees()
    {
        return $this->hasMany(Referee::class);
    }
    public function qualifications()
    {
        return $this->hasMany(ProfessionQualification::class);
    }
}
