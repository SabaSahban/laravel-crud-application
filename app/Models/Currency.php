<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * @property string currency_name
 * @package App\Models
 */
class Currency extends Model
{
    /**
     * define currencies table
     * @var string
     */
    protected $table = 'currencies';

    /**
     * allow insertion in columns
     * @var string[]
     */
    protected $fillable = [
        'currency_name',
    ];

    /**
     * define property and currency relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function property(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Property');
    }
}
