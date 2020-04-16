<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 * @package App\Models
 *
 * @var string name
 * @var string email
 * @var string message
 *
 */
class Contact extends Model
{
    protected $fillable = ['name', 'email', 'message'];
}
