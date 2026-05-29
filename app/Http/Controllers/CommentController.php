<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentController extends Controller
{
    
    public function index()
    {
        $comments = Comment::select( ['id', 'comment', 'user_id', 'created_at'] )
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('comments.index', [
            'comments' => $comments
        ]);
    }

}
