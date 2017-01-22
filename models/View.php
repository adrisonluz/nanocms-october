<?php namespace AdrisonLuz\NanoCms\Models;

use Model;

/**
 * Model
 */
class View extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrisonluz_nanocms_views';
}