<?php

namespace App\Providers;

use App\Repositories\AboutRepository;
use App\Repositories\AboutRepositoryEloquent;
use App\Repositories\BannerRepository;
use App\Repositories\BannerRepositoryEloquent;
use App\Repositories\CompanyDataRepository;
use App\Repositories\CompanyDataRepositoryEloquent;
use App\Repositories\ContactRepository;
use App\Repositories\ContactRepositoryEloquent;
use App\Repositories\FAQRepository;
use App\Repositories\FAQRepositoryEloquent;
use App\Repositories\NewsletterRepository;
use App\Repositories\NewsletterRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\PersonRepository::class, \App\Repositories\PersonRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(AboutRepository::class, AboutRepositoryEloquent::class);
        $this->app->bind(FAQRepository::class, FAQRepositoryEloquent::class);
        $this->app->bind(ContactRepository::class, ContactRepositoryEloquent::class);
        $this->app->bind(CompanyDataRepository::class, CompanyDataRepositoryEloquent::class);
        $this->app->bind(NewsletterRepository::class, NewsletterRepositoryEloquent::class);
        $this->app->bind(BannerRepository::class, BannerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoleRepository::class, \App\Repositories\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VideoRepository::class, \App\Repositories\VideoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ServiceRepository::class, \App\Repositories\ServiceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        //:end-bindings:
    }
}
