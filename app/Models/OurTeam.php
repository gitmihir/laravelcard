<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;
    protected $table = 'sg_our_team';
    protected $fillable = [
        'sg_our_team_title',
        'sg_our_team_image',
        'sg_our_team_text',
    ];
    public $timestamps = false;
}