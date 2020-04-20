<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "cities".
 *
 * Database fields:
 *
 * @property integer $id
 * @property string $name
 *
 * Defined relations:
 *
 */
class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
