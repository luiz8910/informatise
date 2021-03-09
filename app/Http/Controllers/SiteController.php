<?php

namespace App\Http\Controllers;


use App\Repositories\AboutRepository;
use App\Repositories\BannerRepository;
use App\Repositories\BrandRepository;
use App\Repositories\BrandSegmentRepository;
use App\Repositories\CompanyDataRepository;
use App\Repositories\FAQRepository;
use App\Repositories\MenuRepository;
use App\Repositories\SegBrandChoosesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * @var MenuRepository
     */
    private $menu;
    /**
     * @var BrandRepository
     */
    private $brands;
    /**
     * @var BrandSegmentRepository
     */
    private $segments;
    /**
     * @var SegBrandChoosesRepository
     */
    private $segBrand;
    /**
     * @var AboutRepository
     */
    private $abouts;
    /**
     * @var FAQRepository
     */
    private $faq;
    /**
     * @var CompanyDataRepository
     */
    private $data;
    /**
     * @var BannerRepository
     */
    private $banner;

    public function __construct(MenuRepository $menu, BrandRepository $brands,
                                BrandSegmentRepository $segments, SegBrandChoosesRepository $segBrand,
                                AboutRepository $abouts, FAQRepository $faq, CompanyDataRepository $data,
                                BannerRepository $banner)
    {
        $this->menu = $menu;
        $this->brands = $brands;
        $this->segments = $segments;
        $this->segBrand = $segBrand;
        $this->abouts = $abouts;
        $this->faq = $faq;
        $this->data = $data;
        $this->banner = $banner;
    }

    public function home()
    {
        $menus = $this->menu->orderBy('order')->all();

        $brands = $this->brands->findByField('status', 1);

        foreach ($brands as $brand)
            $brand->segments = $this->segBrand->findByField('brand_id', $brand->id);


        $segments = $this->segments->orderBy('name')->findByField('status', 1);

        $about = $this->abouts->findByField('id', 1)->first();

        $faq = $this->faq->orderBy('order')->findByField('active', 1);

        $data = $this->data->findByField('id', 1)->first();

        $banner = $this->banner->orderBy('order')->findByField('active', 1);

        return view('welcome', compact('menus', 'brands', 'segments', 'about', 'faq', 'data', 'banner'));
    }

    public function reorder_menu()
    {
        $route = 'menu.index';

        $scripts[] = '../../js/menu.js';

        $menu = $this->menu->orderBy('order')->all();

        return view('index', compact('route', 'scripts', 'menu'));
    }

    public function reorder(Request $request)
    {
        $order = json_decode($request->get('order'));

        DB::beginTransaction();

        try {

            for ($i = 0; $i < count($order); $i++)
            {
                $x['order'] = $i;

                $this->menu->update($x, $order[$i]->id);
            }

            DB::commit();

            return json_encode(['status' => true]);

        }catch (\Exception $e){
            DB::rollBack();

            return json_encode(['status' => false, 'msg' => $e->getMessage()]);
        }


    }

}
