<?php

namespace App\Repositories;

use App\Models\Media;
use App\Repositories\BaseRepository;

/**
 * Class MediaRepository
 * @package App\Repositories
 * @version February 20, 2020, 10:57 pm +0330
*/

class MediaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Media::class;
    }

    public function create($request)
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
        
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }

    public function updateFile($request, $id,$old_filename)
    {
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

        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }
}
