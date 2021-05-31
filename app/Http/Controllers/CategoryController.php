<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($filter = null)
    {
        $route = 'categories.index';

        $scripts[] = '../../js/category.js';

        $inactives = count($this->repository->findByField('active', 0));

        if($filter == 'inactive')
            $categories = $this->repository->orderBy('order')->all();
        else
            $categories = $this->repository->orderBy('order')->findByField('active', 1);

        return view('admin.index', compact('categories', 'route', 'scripts', 'inactives'));
    }

    public function create()
    {
        $edit = false;

        $route = 'categories.form';

        $scripts[] = '../../js/category.js';

        $categories = $this->repository->orderBy('order')->findByField('active', 1);

        if(count($categories) == 0)
            $next_order = 1;
        else
            $next_order = $categories[count($categories ) - 1]->order + 1;


        return view('admin.index', compact('route', 'scripts', 'edit', 'next_order'));
    }

    public function edit($id)
    {
        $edit = true;

        $route = 'categories.form';

        $scripts[] = '../../js/category.js';

        $category = $this->repository->findByField('id', $id)->first();

        if($category)
            return view('admin.index', compact('route', 'scripts', 'edit', 'category'));

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

            $categories = $this->repository->findWhere([
                ['order', '>=', $data['order']],
                'active' => $data['active']
            ]);

            $i = 1;

            foreach ($categories as $s)
            {
                $x['order'] = $data['order'] + $i;

                $this->repository->update($x, $s->id);

                $i++;
            }

            $this->repository->create($data);

            DB::commit();

            $request->session()->flash('success.msg', 'A Categoria foi criado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->route('categories.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::beginTransaction();

        if (!$this->repository->findByField('id', $id)->first()) {
            $request->session()->flash('error.msg', 'Categoria não encontrada');

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

            $categories = $this->repository->findWhere([
                ['order', '>=', $data['order']],
                'active' => $data['active']
            ]);

            $i = 1;

            foreach ($categories as $b) {
                $x['order'] = $data['order'] + $i;

                $this->repository->update($x, $b->id);

                $i++;
            }

            $this->repository->update($data, $id);

            $categories = $this->repository->orderBy('order')->findByField('active', 1);

            $i = 1;

            foreach ($categories as $b) {
                $x['order'] = $i;

                $this->repository->update($x, $b->id);

                $i++;
            }

            DB::commit();

            $request->session()->flash('success.msg', 'A categoria foi alterada com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->route('categories.index');
    }
}
