<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Alert;
use DB;

class CommentController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = Comment::query();
        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute){
            if($request[$attribute] == true)
            {
                $query->where($attribute, $request[$attribute]);
                $attributes[$attribute] =  $request[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        $comments = $query->get();

        return view('comments.index')
            ->with('comments', $comments)
            ->with('attributes', $attributes);
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

		$comment = Comment::create($input);

		Alert::success('Comentario enviado exitosamente!')->persistent("Cerrar");

		return redirect(route('comments.index'));
	}

	/**
	 * Display the specified Comment.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$comment = Comment::find($id);

		if(empty($comment))
		{
			Alert::error('Comentario no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('comments.index'));
		}

		return view('comments.show')->with('comment', $comment);
	}

	/**
	 * Show the form for editing the specified Comment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = Comment::find($id);

		if(empty($comment))
		{
			Alert::error('Comentario no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('comments.index'));
		}

		return view('comments.edit')->with('comment', $comment);
	}

	/**
	 * Update the specified Comment in storage.
	 *
	 * @param  int    $id
	 * @param CreateCommentRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCommentRequest $request)
	{
		/** @var Comment $comment */
		$comment = Comment::find($id);

		if(empty($comment))
		{
			Alert::error('Comentario no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('comments.index'));
		}

		$comment->fill($request->all());
		$comment->save();

		Alert::info('Comentario actualizado exitosamente!')->persistent("Cerrar");

		return redirect(route('comments.index'));
	}

	/**
	 * Remove the specified Comment from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Comment $comment */
		$comment = Comment::find($id);

		if(empty($comment))
		{
			Alert::error('Comentario no encontrada en nuestros registros!')->persistent("Cerrar");
			return redirect(route('comments.index'));
		}

		$comment->delete();

		Alert::info('Comentario eliminado exitosamente!')->persistent("Cerrar");

		return redirect(route('comments.index'));
	}
}
