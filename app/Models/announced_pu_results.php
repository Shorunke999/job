<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announced_pu_results extends Model
{
    use HasFactory;
    protected $table = 'announced_pu_results';
    protected $fillable = [
        'result_id',
        'polling_unit_uniqueid',
        'party_abbreviation',
        'party_score',
        'entered_by_user',
        'date_entered',
        'user_ip_address'
    ];
}
