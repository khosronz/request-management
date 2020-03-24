<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\Media;
use App\Repositories\MediaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
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
//        $medias = $this->mediaRepository->paginate(10);
//        $medias = Auth::user()->medias;
        $medias = Media::where('user_id', '=', Auth::id())->paginate(10);

        return view('media.index')
            ->with('medias', $medias);
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
        if ($request->hasFile('media_file')) {
            $media_file = $request->file('media_file');
            $filename = $media_file->getClientOriginalName();
            $extension = $media_file->getClientOriginalExtension();
            $media_file->move(public_path('img'), $filename);
            $input['url'] = '/img/' . $filename;
            echo 'Image Uploaded Successfully';
        } else {
            $input['url'] = isset($input['url']) ? $input['url'] : '';
        }
        $media = $this->mediaRepository->create($input);

        Flash::success(__('Media') . ' ' . __('saved successfully.'));

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
        if (Auth::user()->can('view', $media)) {

            if (empty($media)) {
                Flash::error(__('Media') . ' ' . __('not found.'));
                return redirect(route('media.index'));
            }
            return view('media.show')->with('media', $media);
        }

        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

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
        if (Auth::user()->can('update', $media)) {
            if (empty($media)) {
                Flash::error(__('Media') . ' ' . __('not found.'));

                return redirect(route('media.index'));
            }
            return view('media.edit')->with('media', $media);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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
        if(Auth::user()->can('update',$media)){
            if (empty($media)) {
                Flash::error(__('Media') . ' ' . __('not found.'));

                return redirect(route('media.index'));
            }
            $old_filename = $media->url;
            $input = $request->all();
            if (file_exists(public_path() . $old_filename)) {
                if ($request->hasFile('media_file')) {
                    $media_file = $request->file('media_file');
                    $filename = $media_file->getClientOriginalName();
                    $media_file->move(public_path('img'), $filename);
                    $input['url'] = '/img/' . $filename;
                    echo 'Image Uploaded Successfully';
                }
            } else {
                if ($request->hasFile('media_file')) {
                    $media_file = $request->file('media_file');
                    $filename = $media_file->getClientOriginalName();
                    $media_file->move(public_path('img'), $filename);
                    $input['url'] = '/img/' . $filename;
                    echo 'Image Uploaded Successfully';
                }
            }
            $this->mediaRepository->update($input, $id);
            return redirect(route('media.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

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
        if(Auth::user()->can('delete',$media)){
            if (empty($media)) {
                Flash::error(__('Media') . ' ' . __('not found.'));

                return redirect(route('media.index'));
            }

            $this->mediaRepository->delete($id);

            Flash::success(__('Media') . ' ' . __('deleted successfully.'));

            return redirect(route('media.index'));
        }

        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
