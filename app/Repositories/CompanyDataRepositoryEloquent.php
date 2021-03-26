<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CompanyDataRepository;
use App\Models\CompanyData;
use App\Validators\CompanyDataValidator;

/**
 * Class CompanyDataRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CompanyDataRepositoryEloquent extends BaseRepository implements CompanyDataRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CompanyData::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
