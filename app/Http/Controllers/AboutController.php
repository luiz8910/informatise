<?php

namespace App\Http\Controllers;

use App\Repositories\AboutRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * @var AboutRepository
     */
    private $repository;

    public function __construct(AboutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function edit()
    {
        $route = 'about.form';

        $links[] = '../../assets/lib/summernote/summernote.css';

        $scripts[] = '../../assets/lib/summernote/summernote.min.js';
        $scripts[] = '../../assets/lib/summernote/summernote-ext-beagle.js';
        $scripts[] = '../../assets/lib/bootstrap-markdown/js/bootstrap-markdown.js';
        $scripts[] = '../../assets/lib/markdown-js/markdown.js';
        $scripts[] = '../../assets/js/app-form-wysiwyg.js';

        $about = $this->repository->findByField('id', 1)->first();

        return view('index', compact('route', 'scripts', 'links', 'about'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        //dd($data);

        if($data['about'] == "")
        {
            $request->session()->flash('error.msg', 'Preencha o campo quem somos');

            return false;
        }

        if($data['our_mission'] == "")
        {
            $request->session()->flash('error.msg', 'Preencha o campo nossa missão');

            return false;
        }

        DB::beginTransaction();

        try {
            $file = $request->file('file');

            if($file)
            {
                $path = $file->store('public/uploads');

                $data['picture'] = $path;
            }

            $this->repository->update($data, 1);

            DB::commit();

            $request->session()->flash('success.msg', 'Quem somos foi alterado com sucesso');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->back();
    }


}
