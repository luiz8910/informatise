<?php

namespace App\Http\Controllers;

use App\Repositories\BannerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * @var BannerRepository
     */
    private $repository;

    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $route = 'banners.index';

        $scripts[] = '../../js/banner.js';

        $banner = $this->repository->orderBy('order')->findByField('active', 1);

        return view('index', compact('route', 'banner', 'scripts'));
    }

    public function create()
    {
        $edit = false;

        $route = 'banners.form';

        $scripts[] = '../../js/banner.js';

        $banners = $this->repository->orderBy('order')->findByField('active', 1);

        if(count($banners) == 0)
            $next_order = 1;
        else
            $next_order = $banners[count($banners ) - 1]->order + 1;


        return view('index', compact('route', 'scripts', 'edit', 'next_order'));
    }

    public function edit($id)
    {
        $edit = true;

        $route = 'banners.form';

        $banner = $this->repository->findByField('id', $id)->first();

        if($banner)
            return view('index', compact('route', 'scripts', 'banner', 'edit'));

        return abort(404);
    }

    public function store(Request $request, $redirect = null)
    {
        $data = $request->all();

        if ($data['order'] == "") {
            $request->session()->flash('error.msg', 'Preencha o campo ordenação');

            return false;
        }

        $file = $request->file('file');

        if($file)
        {
            $path = $file->store('public/uploads');

            $data['picture'] = $path;
        }
        else{
            $request->session()->flash('error.msg', 'Faça o upload de uma imagem');

            return false;
        }

        DB::beginTransaction();

        try {

            $faq = $this->repository->findWhere([
                ['order', '>=', $data['order']],
                'active' => 1
            ]);

            $i = 1;

            foreach ($faq as $f)
            {
                $x['order'] = $data['order'] + $i;

                $this->repository->update($x, $f->id);

                $i++;
            }

            $this->repository->create($data);

            DB::commit();

            $request->session()->flash('success.msg', 'Banner foi criado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return $redirect ? redirect()->route('banner.create') : redirect()->route('banner.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::beginTransaction();

        if(!$this->repository->findByField('id', $id)->first())
        {
            $request->session()->flash('error.msg', 'Banner não encontrado');

            return redirect()->back();
        }

        if($data['order'] == "")
        {
            $request->session()->flash('error.msg', 'Selecione a ordem de exibição do banner');

            return false;
        }

        $file = $request->file('file');

        if($file)
        {
            $path = $file->store('public/uploads');

            $data['picture'] = $path;
        }
        else{
            $request->session()->flash('error.msg', 'Faça o upload de uma imagem');

            return false;
        }

        try {

            $faq = $this->repository->findWhere([
                ['order', '>=', $data['order']],
                'active' => 1
            ]);

            $i = 1;

            foreach ($faq as $f)
            {
                $x['order'] = $data['order'] + $i;

                $this->repository->update($x, $f->id);

                $i++;
            }

            $this->repository->update($data, $id);

            $faq = $this->repository->orderBy('order')->findByField('active', 1);

            $i = 1;

            foreach ($faq as $f)
            {
                $x['order'] = $i;

                $this->repository->update($x, $f->id);

                $i++;
            }

            DB::commit();

            $request->session()->flash('success.msg', 'Banner foi alterado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->route('banner.index');
    }

    public function delete($id)
    {
        if(!$this->repository->findByField('id', $id)->first())
            return json_encode(['status' => false, 'msg' => 'Banner não encontrado']);

        DB::beginTransaction();

        try {
            $x['active'] = 0;

            $this->repository->update($x, $id);

            $faq = $this->repository->orderBy('order')->findByField('active', 1);

            $i = 1;

            foreach ($faq as $f)
            {
                $y['order'] = $i;

                $this->repository->update($y, $f->id);

                $i++;
            }

            DB::commit();

            return json_encode(['status' => true]);

        }catch (\Exception $e){
            DB::rollBack();

            return json_encode(['status' => false, 'Um erro ocorreu, tente novamente mais tarde']);
        }

    }
}
