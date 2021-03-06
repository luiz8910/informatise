<?php

namespace App\Http\Controllers;

use App\Repositories\BannerRepository;
use App\Repositories\CompanyDataRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\VideoRepository;
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
     * @var VideoRepository
     */
    private $video;
    /**
     * @var ServiceRepository
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CompanyDataRepository $company, BannerRepository $banner, VideoRepository $video,
                        ServiceRepository $service)
    {
        //$this->middleware('auth');
        $this->company = $company;
        $this->banner = $banner;
        $this->video = $video;
        $this->service = $service;
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

        $video = $this->video->findByField('id', 1)->first();

        $video->thumbnail = str_replace('public', '/storage', $video->thumbnail);

        $services = $this->service->orderBy('order')->findByField('active', 1);

        foreach ($services as $service)
            $service->picture = str_replace('public', '/storage', $service->picture);

        $col_size_services = 12 / count($services);

        return view('welcome', compact('data', 'banners', 'video', 'services', 'col_size_services'));
    }
}
