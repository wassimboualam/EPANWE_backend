<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipRequest extends Model
{
    use HasFactory;
    
    protected $table = 'partnership_requests';

    protected $fillable = [
        'company_name',
        'ice',
        'address',
        'phone_number',
        'email',
        'website',
        'legal_form',
        'activity_field',
        'description',
        'contact_name',
        'contact_email',
        'contact_phone_number',
        'age_range',
        'number_of_users',
    ];
}
