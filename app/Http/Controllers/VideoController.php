<?php

namespace App\Http\Controllers;

use App\Repositories\VideoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * @var VideoRepository
     */
    private $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function edit()
    {
        $video = $this->repository->findByField('id', 1)->first();

        $route = 'video.form';

        $scripts[] = '../../js/banner.js';

        return view('admin.index', compact('video', 'route', 'scripts'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        $file = $request->file('file');

        if($file)
        {
            $path = $file->store('public/uploads');

            $data['thumbnail'] = $path;
        }

        $data['active'] = isset($data['active']) ? 1 : 0;

        try {

            $this->repository->update($data, 1);

            DB::commit();

            $request->session()->flash('success.msg', 'O Vídeo foi alterado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
        }

        return redirect()->back();
    }
}
