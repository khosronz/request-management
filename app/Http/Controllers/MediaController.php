<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Repositories\MediaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Response;

class MediaController extends AppBaseController
{
    /** @var  MediaRepository */
    private $mediaRepository;

    public function __construct(MediaRepository $mediaRepo)
    {
        $this->mediaRepository = $mediaRepo;
    }

    /**
     * Display a listing of the Media.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $media = $this->mediaRepository->paginate(10);

        return view('media.index')
            ->with('media', $media);
    }

    /**
     * Show the form for creating a new Media.
     *
     * @return Response
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created Media in storage.
     *
     * @param CreateMediaRequest $request
     *
     * @return Response
     */
    public function store(CreateMediaRequest $request)
    {
        $input = $request->all();
        //dd($input);
        if ($request->hasFile('media_file')) {
            $media_file = $request->file('media_file');
            $filename = $media_file->getClientOriginalName();
            $extension = $media_file->getClientOriginalExtension();
            $media_file->move(public_path('img'), $filename);
            $input['url'] = '/img/'.$filename;
            echo 'Image Uploaded Successfully';
        }

        $media = $this->mediaRepository->create($input);

        Flash::success(__('Media').' '.__('saved successfully.'));

        return redirect(route('media.index'));
    }

    /**
     * Display the specified Media.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $media = $this->mediaRepository->find($id);
        if (empty($media)) {
            Flash::error(__('Media').' '.__('not found.'));
            return redirect(route('media.index'));
        }
        return view('media.show')->with('media', $media);

    }

    /**
     * Show the form for editing the specified Media.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            Flash::error(__('Media').' '.__('not found.'));

            return redirect(route('media.index'));
        }

        return view('media.edit')->with('media', $media);
    }

    /**
     * Update the specified Media in storage.
     *
     * @param int $id
     * @param UpdateMediaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMediaRequest $request)
    {
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            Flash::error(__('Media') . ' ' . __('not found.'));

            return redirect(route('media.index'));
        }
        $old_filename = $media->url;
        $input = $request->all();
        //dd($input);
        if (file_exists(public_path() . $old_filename)) {
            unlink(public_path().$old_filename);
            if ($request->hasFile('media_file')) {
                $media_file = $request->file('media_file');
                $filename = $media_file->getClientOriginalName();
                $media_file->move(public_path('img'), $filename);
                $input['url'] = '/img/' . $filename;
                echo 'Image Uploaded Successfully';
            }
        }else{
            if ($request->hasFile('media_file')) {
                $media_file = $request->file('media_file');
                $filename = $media_file->getClientOriginalName();
                $media_file->move(public_path('img'), $filename);
                $input['url'] = '/img/' . $filename;
                echo 'Image Uploaded Successfully';
            }
        }
        $this->mediaRepository->update($input,$id);
        return redirect(route('media.index'));
    }


    /**
     * Remove the specified Media from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            Flash::error(__('Media').' '.__('not found.'));

            return redirect(route('media.index'));
        }

        $this->mediaRepository->delete($id);

        Flash::success(__('Media').' '.__('deleted successfully.'));

        return redirect(route('media.index'));
    }
}
