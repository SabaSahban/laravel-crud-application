<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Property
 * @property string name
 * @property int currency_id
 * @property string show_name
 * @property string explorer
 * @property string show_order
 * @property string deposit
 * @property string withdraw
 * @property string has_tag
 * @property string withdraw_min
 * @property string withdraw_fee
 * @property string deposit_min
 * @package App\Models
 */
class Property extends Model
{

    /**
     * define properties table
     * @var string
     */
    protected $table = 'properties';

    /**
     * allow table insertion
     * @var string[]
     */
    protected $fillable = [
        'name', 'currency_id', 'show_name',
        'explorer', 'show_order', 'deposit',
        'withdraw', 'has_tag', 'withdraw_min',
        'withdraw_fee', 'deposit_min',
    ];


    /**
     * define currency and model relationship
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo('App\Models\Currency');
    }
}
