<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $connection = 'mysql_cashu';

    protected $table = 'countries';
}

