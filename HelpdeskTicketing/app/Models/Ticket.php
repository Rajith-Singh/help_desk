<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    
    protected $fillable = ['subject', 'email', 'message'];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
}

