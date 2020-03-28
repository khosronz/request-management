<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Repositories\CommentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CommentController extends AppBaseController
{
    /** @var  CommentRepository */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepository = $commentRepo;
    }

    /**
     * Display a listing of the Comment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $comments = $this->commentRepository->paginate(10);

        return view('comments.index')
            ->with('comments', $comments);
    }

    /**
     * Show the form for creating a new Comment.
     *
     * @return Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created Comment in storage.
     *
     * @param CreateCommentRequest $request
     *
     * @return Response
     */
    public function store(CreateCommentRequest $request)
    {
        $input = $request->all();

        $comment = $this->commentRepository->create($input);

        Flash::success(__('Comment').' '.__('saved successfully.'));

        return back();
//        return redirect(route('comments.index'));
    }

    /**
     * Display the specified Comment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Flash::error(__('Comment').' '.__('not found.'));

            return redirect(route('comments.index'));
        }

        return view('comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified Comment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Flash::error(__('Comment').' '.__('not found.'));

            return redirect(route('comments.index'));
        }

        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified Comment in storage.
     *
     * @param int $id
     * @param UpdateCommentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommentRequest $request)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Flash::error(__('Comment').' '.__('not found.'));

            return redirect(route('comments.index'));
        }

        $comment = $this->commentRepository->update($request->all(), $id);

        Flash::success(__('Comment').' '.__('updated successfully.'));

        return back();
//        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified Comment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Flash::error(__('Comment').' '.__('not found.'));

            return redirect(route('comments.index'));
        }

        $this->commentRepository->delete($id);

        Flash::success(__('Comment').' '.__('deleted successfully.'));

        return back();
//        return redirect(route('comments.index'));
    }
}
