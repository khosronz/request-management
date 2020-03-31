<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
//        $this->authorizeResource(Category::class,'categories');
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
//        $images=get_html_element_img_src('https://www.digikala.com/');
//        $titles=get_html_element_titles('tahlilyar','h2');
////
//        dd($images,$titles);

        if(Auth::user()->can('viewAny',Category::class)){
            $categories = $this->categoryRepository->paginate(10);

            return view('categories.index')
                ->with('categories', $categories);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->can('create',Category::class)){
            return view('categories.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {

        if(Auth::user()->can('create',Category::class)){
            $input = $request->all();

            $category = $this->categoryRepository->create($input);

            Flash::success(__('Category').' '.__('saved successfully.'));

            return redirect(route('categories.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Display the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(Auth::user()->can('view',Category::class)){
            $category = $this->categoryRepository->find($id);

            if (empty($category)) {
                Flash::error(__('Category').' '.__('not found.'));

                return redirect(route('categories.index'));
            }

            return view('categories.show')->with('category', $category);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    public function showproducts($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('update',Category::class)){
            $category = $this->categoryRepository->find($id);

            if (empty($category)) {
                Flash::error(__('Category').' '.__('not found.'));

                return redirect(route('categories.index'));
            }

            return view('categories.edit')->with('category', $category);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Update the specified Category in storage.
     *
     * @param int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {

        if(Auth::user()->can('update',Category::class)){

            $category = $this->categoryRepository->find($id);

            if (empty($category)) {
                Flash::error(__('Category').' '.__('not found.'));

                return redirect(route('categories.index'));
            }

            $category = $this->categoryRepository->update($request->all(), $id);

            Flash::success(__('Category').' '.__('updated successfully.'));

            return redirect(route('categories.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('delete',Category::class)){
            $category = $this->categoryRepository->find($id);

            if (empty($category)) {
                Flash::error(__('Category').' '.__('not found.'));

                return redirect(route('categories.index'));
            }

            $this->categoryRepository->delete($id);

            Flash::success(__('Category').' '.__('deleted successfully.'));

            return redirect(route('categories.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
