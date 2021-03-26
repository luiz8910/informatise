<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Person.
 *
 * @package namespace App\Models;
 */
class Person extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'cpf', 'cel', 'date_birth', 'zip_code', 'street',
        'number', 'district', 'city', 'state', 'status', 'active', 'role_id'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
