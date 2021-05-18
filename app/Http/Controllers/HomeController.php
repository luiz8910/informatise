<?php

namespace App\Http\Controllers;

use App\Repositories\BannerRepository;
use App\Repositories\CompanyDataRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var CompanyDataRepository
     */
    private $company;
    /**
     * @var BannerRepository
     */
    private $banner;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CompanyDataRepository $company, BannerRepository $banner)
    {
        //$this->middleware('auth');
        $this->company = $company;
        $this->banner = $banner;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = $this->company->all()->first();//dd($data);

        if($data->whatsapp != "") {
            $data->wa = $data->whatsapp;
            $data->wa = str_replace('(', '', $data->wa);
            $data->wa = str_replace(')', '', $data->wa);
            $data->wa = str_replace('+', '', $data->wa);
            $data->wa = str_replace('-', '', $data->wa);
            $data->wa = str_replace(' ', '', $data->wa);
            $data->wa = trim('+55' . $data->wa);
        }

        $banners = $this->banner->findByField('active', 1);

        foreach ($banners as $banner)
            $banner->picture = str_replace('public', '/storage', $banner->picture);



        return view('welcome', compact('data', 'banners'));
    }
}
