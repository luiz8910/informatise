<?php

namespace App\Http\Controllers;

use App\Repositories\FAQRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FAQController extends Controller
{
    /**
     * @var FAQRepository
     */
    private $repository;

    public function __construct(FAQRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $route = 'FAQ.index';

        $scripts[] = '../../js/faq.js';

        $faq = $this->repository->orderBy('order')->findByField('active', 1);

        return view('admin.index', compact('route', 'faq', 'scripts'));
    }

    public function create()
    {
        $edit = false;

        $route = 'FAQ.form';

        $links[] = '../../assets/lib/summernote/summernote.css';

        $scripts[] = '../../assets/lib/summernote/summernote.min.js';
        $scripts[] = '../../assets/lib/summernote/summernote-ext-beagle.js';
        $scripts[] = '../../assets/lib/bootstrap-markdown/js/bootstrap-markdown.js';
        $scripts[] = '../../assets/lib/markdown-js/markdown.js';
        $scripts[] = '../../assets/js/app-form-wysiwyg.js';
        $scripts[] = '../../js/faq.js';

        $faq = $this->repository->orderBy('order')->findByField('active', 1);

        if(count($faq) == 0)
            $next_order = 1;
        else
            $next_order = $faq[count($faq ) - 1]->order + 1;


        return view('admin.index', compact('route', 'scripts', 'links', 'edit', 'next_order'));

    }

    public function edit($id)
    {
        $edit = true;

        $route = 'FAQ.form';

        $links[] = '../../assets/lib/summernote/summernote.css';

        $scripts[] = '../../assets/lib/summernote/summernote.min.js';
        $scripts[] = '../../assets/lib/summernote/summernote-ext-beagle.js';
        $scripts[] = '../../assets/lib/bootstrap-markdown/js/bootstrap-markdown.js';
        $scripts[] = '../../assets/lib/markdown-js/markdown.js';
        $scripts[] = '../../assets/js/app-form-wysiwyg.js';

        $faq = $this->repository->findByField('id', $id)->first();

        if($faq)
            return view('admin.index', compact('route', 'scripts', 'links', 'faq', 'edit'));

        return abort(404);
    }

    public function store(Request $request, $redirect = null)
    {
        $data = $request->all();

        if ($data['order'] == "") {
            $request->session()->flash('error.msg', 'Preencha o campo ordenação');

            return false;
        }

        if ($data['question'] == "") {
            $request->session()->flash('error.msg', 'Preencha o campo pergunta');

            return false;
        }

        if ($data['answer'] == "") {
            $request->session()->flash('error.msg', 'Preencha o campo resposta');

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

            $request->session()->flash('success.msg', 'FAQ foi criado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return $redirect ? redirect()->route('faq.create') : redirect()->route('faq.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();


        if ($data['question'] == "") {
            $request->session()->flash('error.msg', 'Preencha o campo pergunta');

            return false;
        }

        if ($data['answer'] == "") {
            $request->session()->flash('error.msg', 'Preencha o campo resposta');

            return false;
        }

        if($data['order'] == "")
        {
            $request->session()->flash('error.msg', 'Selecione a ordem de exibição da pergunta');

            return false;
        }

        DB::beginTransaction();

        if(!$this->repository->findByField('id', $id)->first())
        {
            $request->session()->flash('error.msg', 'Pergunta não encontrada');

            return redirect()->back();
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

            $request->session()->flash('success.msg', 'FAQ foi alterado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->route('faq.index');
    }

    public function delete($id)
    {
        if(!$this->repository->findByField('id', $id)->first())
            return json_encode(['status' => false, 'msg' => 'Pergunta não encontrada']);

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
