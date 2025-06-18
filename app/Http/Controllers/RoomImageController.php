<?php

namespace App\Http\Controllers;

use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\AnalyzeRoomImage;

class RoomImageController extends Controller
{
    public function create()
    {
        return view('room-images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png', 'max:5120'], // 5MB Max
            'time_of_day' => ['required', 'string', 'in:morning,evening'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ]);

        $roomImage = RoomImage::create([
            'user_id' => Auth::id(),
            'time_of_day' => $request->time_of_day,
            'comment' => $request->comment,
        ]);

        $roomImage->addMediaFromRequest('image')->toMediaCollection();

        AnalyzeRoomImage::dispatch($roomImage);

        return response()->json(['success' => true]);
    }
}
