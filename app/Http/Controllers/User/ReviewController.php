<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        Review::create([
            'id_product' => $request->id_product,
            'id_user' => Auth::user()->id,
            'comment' => $request->comment,
        ]);
        return back()->with([
            'message' => 'Your review has been received',
        ]);
    }

    public function show($id){
        $reviews = Review::where('id_product', $id)->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroy($id){
        $review = Review::findOrFail($id);
        $review->delete();
        return back()->with([
            'message' => 'Data review berhasil dihapus'
        ]);
    }
}
