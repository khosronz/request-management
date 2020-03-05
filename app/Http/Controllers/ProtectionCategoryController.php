<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProtectionCategoryRequest;
use App\Http\Requests\UpdateProtectionCategoryRequest;
use App\Repositories\ProtectionCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProtectionCategoryController extends AppBaseController
{
    /** @var  ProtectionCategoryRepository */
    private $protectionCategoryRepository;

    public function __construct(ProtectionCategoryRepository $protectionCategoryRepo)
    {
        $this->protectionCategoryRepository = $protectionCategoryRepo;
    }

    /**
     * Display a listing of the ProtectionCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $protectionCategories = $this->protectionCategoryRepository->paginate(10);

        return view('protection_categories.index')
            ->with('protectionCategories', $protectionCategories);
    }

    /**
     * Show the form for creating a new ProtectionCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('protection_categories.create');
    }

    /**
     * Store a newly created ProtectionCategory in storage.
     *
     * @param CreateProtectionCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProtectionCategoryRequest $request)
    {
        $input = $request->all();

        $protectionCategory = $this->protectionCategoryRepository->create($input);

        Flash::success(__('Protection Category').' '.__('saved successfully.'));

        return redirect(route('protectionCategories.index'));
    }

    /**
     * Display the specified ProtectionCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $protectionCategory = $this->protectionCategoryRepository->find($id);

        if (empty($protectionCategory)) {
            Flash::error(__('Protection Category').' '.__('not found.'));

            return redirect(route('protectionCategories.index'));
        }

        return view('protection_categories.show')->with('protectionCategory', $protectionCategory);
    }

    /**
     * Show the form for editing the specified ProtectionCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $protectionCategory = $this->protectionCategoryRepository->find($id);

        if (empty($protectionCategory)) {
            Flash::error(__('Protection Category').' '.__('not found.'));

            return redirect(route('protectionCategories.index'));
        }

        return view('protection_categories.edit')->with('protectionCategory', $protectionCategory);
    }

    /**
     * Update the specified ProtectionCategory in storage.
     *
     * @param int $id
     * @param UpdateProtectionCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProtectionCategoryRequest $request)
    {
        $protectionCategory = $this->protectionCategoryRepository->find($id);

        if (empty($protectionCategory)) {
            Flash::error(__('Protection Category').' '.__('not found.'));

            return redirect(route('protectionCategories.index'));
        }

        $protectionCategory = $this->protectionCategoryRepository->update($request->all(), $id);

        Flash::success(__('Protection Category').' '.__('updated successfully.'));

        return redirect(route('protectionCategories.index'));
    }

    /**
     * Remove the specified ProtectionCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $protectionCategory = $this->protectionCategoryRepository->find($id);

        if (empty($protectionCategory)) {
            Flash::error(__('Protection Category').' '.__('not found.'));

            return redirect(route('protectionCategories.index'));
        }

        $this->protectionCategoryRepository->delete($id);

        Flash::success(__('Protection Category').' '.__('deleted successfully.'));

        return redirect(route('protectionCategories.index'));
    }
}
