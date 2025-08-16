<?php

namespace App\Http\Controllers\Comment;

use App\Comment;
use App\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */

    public function store(Request $request, Medicine $medicine)
    {
        // Только AJAX — чтобы обычный submit не создавал дубль
        if (! $request->ajax()) {
            return response()->json(['status' => 'error', 'message' => 'Only AJAX allowed'], 400);
        }

        $validated = $request->validate([
            'comment' => 'required|string|max:2000',
        ]);

        $userId = auth()->id();
        if (! $userId) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        // Анти-дубль: если ровно такой же комментарий от того же пользователя за 3 сек.
        $exists = Comment::where('medicine_id', $medicine->id)
            ->where('user_id', $userId)
            ->where('comment', $validated['comment'])
            ->where('created_at', '>=', now()->subSeconds(3))
            ->exists();

        if ($exists) {
            return response()->json(['status' => 'ignored_duplicate']);
        }

        $comment = Comment::create([
            'comment'      => $validated['comment'],
            'user_id'      => $userId,
            'medicine_id'  => $medicine->id,
        ])->load('user');

        // Собираем корректный URL аватара
        $raw = $comment->user->image ?? null; // если в БД хранится имя файла
        $avatar = $raw
            ? (Str::startsWith($raw, ['http://','https://','/']) ? $raw : asset('uploads/' . ltrim($raw, '/')))
            : asset('images/no-image.png');

        return response()->json([
            'status'  => 'success',
            'comment' => [
                'user_name' => $comment->user->name,
                'avatar'    => $avatar,
                'date'      => $comment->created_at->translatedFormat('d F Y'),
                'time'      => $comment->created_at->format('g:i a'),
                'text'      => $comment->comment,
            ],
        ], 201);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
