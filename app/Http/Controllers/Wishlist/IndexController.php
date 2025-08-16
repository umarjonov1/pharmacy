<?php

namespace App\Http\Controllers\Wishlist;

use App\Medicine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private const SESSION_KEY = 'wishlist';

    private function ids(): array
    {
        return array_values(array_unique(array_map('intval', (array) session(self::SESSION_KEY, []))));
    }

    public function index()
    {
        $ids = $this->ids();
        $medicines = empty($ids) ? collect()
            : Medicine::whereIn('id', $ids)->get()
                ->sortBy(function ($m) use ($ids) {
                    return array_search((int)$m->id, $ids, true);
                })
                ->values();

        return view('pages.wishlist', compact('medicines'));
    }

    public function toggle(Request $request, Medicine $medicine)
    {
        $ids = $this->ids();
        $id  = (int) $medicine->id;

        if (in_array($id, $ids, true)) {
            // remove
            $ids = array_values(array_diff($ids, [$id]));
            $isFavorite = false;
        } else {
            // add
            $ids[] = $id;
            $ids = array_values(array_unique($ids));
            $isFavorite = true;
        }

        session([self::SESSION_KEY => $ids]);

        return response()->json([
            'success'     => true,
            'id'          => $id,
            'is_favorite' => $isFavorite,
            'count'       => count($ids),
            'ids'         => $ids,
        ]);
    }
}
