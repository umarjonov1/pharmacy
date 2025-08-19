<?php

namespace App\Http\Controllers\Like;

use App\Like;
use App\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function like(Request $request, Medicine $medicine)
    {
        $userId = auth()->id();
        $like = Like::where('user_id', $userId)
            ->where('medicine_id', $medicine->id)->first();

        if ($like) {
            // обновляем существующий лайк
            $like->update(['is_liked' => $like->is_liked ? 0 : 1]);

            return response()->json([
                'liked' => (bool) $like->is_liked
            ]);
        }

        // создаём новый лайк
        $newLike = Like::create([
            'user_id'    => $userId,
            'medicine_id'=> $medicine->id,
            'is_liked'   => 1,
        ]);

        return response()->json(['liked' => true]);
    }


}
