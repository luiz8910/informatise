<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyDataRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var CompanyDataRepository
     */
    private $company;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CompanyDataRepository $company)
    {
        $this->middleware('auth');
        $this->company = $company;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = $this->company->all()->first();

        return view('welcome', compact('data'));
    }
}
