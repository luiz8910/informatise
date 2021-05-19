<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * @var ServiceRepository
     */
    private $repository;

    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($filter = null)
    {
        $route = 'services.index';

        $scripts[] = '../../js/service.js';

        $inactives = count($this->repository->findByField('active', 0));

        if($filter == 'inactive')
            $services = $this->repository->orderBy('order')->all();
        else
            $services = $this->repository->orderBy('order')->findByField('active', 1);

        return view('admin.index', compact('services', 'route', 'scripts', 'inactives'));
    }

    public function create()
    {
        $edit = false;

        $route = 'services.form';

        $scripts[] = '../../js/service.js';

        $services = $this->repository->orderBy('order')->findByField('active', 1);

        if(count($services) == 0)
            $next_order = 1;
        else
            $next_order = $services[count($services ) - 1]->order + 1;


        return view('admin.index', compact('route', 'scripts', 'edit', 'next_order'));
    }

    public function edit($id)
    {
        $edit = true;

        $route = 'services.form';

        $scripts[] = '../../js/service.js';

        $service = $this->repository->findByField('id', $id)->first();

        if($service)
            return view('admin.index', compact('route', 'scripts', 'edit', 'service'));

        abort(404);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //dd($data);

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

        $data['active'] = isset($data['active']) ? 1 : 0;

        DB::beginTransaction();

        try {

            $services = $this->repository->findWhere([
                ['order', '>=', $data['order']],
                'active' => $data['active']
            ]);

            $i = 1;

            foreach ($services as $s)
            {
                $x['order'] = $data['order'] + $i;

                $this->repository->update($x, $s->id);

                $i++;
            }

            $this->repository->create($data);

            DB::commit();

            $request->session()->flash('success.msg', 'O Serviço foi criado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->route('services.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::beginTransaction();

        if (!$this->repository->findByField('id', $id)->first()) {
            $request->session()->flash('error.msg', 'Serviço não encontrado');

            return redirect()->back();
        }

        if ($data['order'] == "") {
            $request->session()->flash('error.msg', 'Selecione a ordem de exibição do serviço');

            return false;
        }

        $file = $request->file('file');

        if ($file) {
            $path = $file->store('public/uploads');

            $data['picture'] = $path;
        }


        $data['active'] = isset($data['active']) ? 1 : 0;

        try {

            $services = $this->repository->findWhere([
                ['order', '>=', $data['order']],
                'active' => $data['active']
            ]);

            $i = 1;

            foreach ($services as $b) {
                $x['order'] = $data['order'] + $i;

                $this->repository->update($x, $b->id);

                $i++;
            }

            $this->repository->update($data, $id);

            $services = $this->repository->orderBy('order')->findByField('active', 1);

            $i = 1;

            foreach ($services as $b) {
                $x['order'] = $i;

                $this->repository->update($x, $b->id);

                $i++;
            }

            DB::commit();

            $request->session()->flash('success.msg', 'O Serviço foi alterado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->route('services.index');
    }
}
