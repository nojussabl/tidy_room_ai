<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoomImage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show the admin dashboard with all user uploads
    public function dashboard()
    {
        $allImages = RoomImage::with('user')->latest()->get();
        return view('admin.dashboard', ['allImages' => $allImages]);
    }

    // Show the user management page
    public function users()
    {
        // Get all users except the currently logged in admin
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.users', ['users' => $users]);
    }

    // Handle the logic for blocking or unblocking a user
    public function toggleBlock(User $user)
    {
        // Prevent admin from blocking another admin
        if ($user->hasRole('admin')) {
            return back()->with('error', 'Cannot block an admin user.');
        }

        $user->is_blocked = !$user->is_blocked;
        $user->save();

        return back()->with('status', 'User status updated.');
    }

    // Handle the CSV export
    public function export()
    {
        $fileName = 'tidy-room-data.csv';
        $images = RoomImage::with('user')->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = ['Image ID', 'Uploader Name', 'Uploader Email', 'Time of Day', 'Comment', 'AI Analysis', 'Tidiness Score', 'Uploaded At'];

        $callback = function() use($images, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($images as $image) {
                $row['Image ID']  = $image->id;
                $row['Uploader Name']  = $image->user->name;
                $row['Uploader Email'] = $image->user->email;
                $row['Time of Day'] = $image->time_of_day;
                $row['Comment'] = $image->comment;
                $row['AI Analysis'] = $image->ai_analysis;
                $row['Tidiness Score'] = $image->tidiness_score;
                $row['Uploaded At'] = $image->created_at;

                fputcsv($file, array($row['Image ID'], $row['Uploader Name'], $row['Uploader Email'], $row['Time of Day'], $row['Comment'], $row['AI Analysis'], $row['Tidiness Score'], $row['Uploaded At']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}