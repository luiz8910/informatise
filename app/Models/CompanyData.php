<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class CompanyData.
 *
 * @package namespace App\Models;
 */
class CompanyData extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'opening_hours', 'address', 'facebook', 'instagram', 'messenger', 'whatsapp', 'skype', 'email', 'picture'
    ];

    protected $table = 'company_data';
}
