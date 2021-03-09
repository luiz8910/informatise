<?php

namespace App\Http\Controllers;

use App\Repositories\PersonRepository;
use App\Repositories\UserRepository;
use App\Traits\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller{

    use Login;

    /**
     * @var PersonRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $users;

    public function __construct(PersonRepository $repository, UserRepository $users)
    {

        $this->repository = $repository;
        $this->users = $users;
    }

    public function index()
    {
        $people = $this->repository->findByField('active', 1);

        $route = 'people.index';

        $scripts[] = '../../js/person.js';

        return view('index', compact('people', 'route', 'scripts'));
    }

    public function create()
    {
        $route = 'people.form';

        $edit = false;

        $scripts[] = '../../js/person.js';

        return view('index', compact('route', 'edit', 'scripts'));
    }

    public function edit($id)
    {
        $route = 'people.form';

        $edit = true;

        $scripts[] = '../../js/person.js';

        $person = $this->repository->findByField('id', $id)->first();

        if($person)
            return view('index', compact('route', 'edit', 'person', 'scripts'));

        return abort(404);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;

        if($this->repository->findByField('email', $data['email'])->first())
        {
            $request->session()->flash('error.msg', "Já existe um usuário com este email");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $id = $this->repository->create($data)->id;

            $data['person_id'] = $id;

            $this->new_user($data);

            DB::commit();

            $request->session()->flash('success.msg', 'Um email foi enviado com os dados de acesso para ' . $data['email']);

            return redirect()->route('person.index');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;

        if($this->repository->findWhere(['email' => $data['email'], ['id', '<>', $id]])->first())
        {
            $request->session()->flash('error.msg', "Já existe um usuário com este email");

            return redirect()->back();
        }

        if(!$this->repository->findByField('id', $id)->first())
        {
            $request->session()->flash('error.msg', "Este usuário não existe");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $this->repository->update($data, $id);

            $u['name'] = $data['name'];
            $u['email'] = $data['email'];

            $user = $this->repository->findByField('id', $id)->first()->user->id;

            $this->users->update($u, $user);

            DB::commit();

            $request->session()->flash('success.msg', 'O usuário foi alterado com sucesso');

            return redirect()->route('person.index');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e);
        }
    }

    public function delete($id)
    {
        $person = $this->repository->findByField('id', $id)->first();

        if($person)
        {
            DB::beginTransaction();

            try {
                $u['active'] = 0;

                $this->users->update($u, $person->user->id);

                $p['active'] = 0;

                $this->repository->update($p, $person->id);

                DB::commit();

                return json_encode(['status' => true]);

            }catch (\Exception $e)
            {
                DB::rollBack();

                return json_encode(['status' => false, 'msg' => $e->getMessage()]);
            }

        }

        return json_encode(['status' => false, 'msg' => 'Este usuário não existe']);
    }

    public function deleted()
    {
        $people = $this->repository->findByField('active', 0);

        $route = 'people.deleted';

        $scripts[] = '../../js/person.js';

        return view('index', compact('people', 'route', 'scripts'));
    }

    public function activate($id)
    {
        $person = $this->repository->findByField('id', $id)->first();

        if($person)
        {
            DB::beginTransaction();

            try {
                $u['active'] = 1;

                $this->users->update($u, $person->user->id);

                $p['active'] = 1;

                $this->repository->update($p, $person->id);

                DB::commit();

                return json_encode(['status' => true]);

            }catch (\Exception $e)
            {
                DB::rollBack();

                return json_encode(['status' => false, 'msg' => $e->getMessage()]);
            }

        }

        return json_encode(['status' => false, 'msg' => 'Este usuário não existe']);
    }
}




