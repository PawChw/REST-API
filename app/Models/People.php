<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(string $id)
 */
class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastName',
        'phoneNumber',
        'street',
        'city',
        'country'
    ];
}
