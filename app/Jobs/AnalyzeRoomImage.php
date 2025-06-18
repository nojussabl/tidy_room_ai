<?php

namespace App\Jobs;

use App\Events\AnalysisCompleted;
use App\Models\RoomImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AnalyzeRoomImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public RoomImage $roomImage)
    {
    }

    public function handle(): void
    {
        // Simulate AI thinking time (3 to 5 seconds)
        sleep(rand(3, 5));

        // Expanded list of over 50 unique suggestion options
        $messyOptions = [
            ['issue' => 'Toys are scattered on the floor.', 'points' => 15], ['issue' => 'The bed is unmade.', 'points' => 15],
            ['issue' => 'Clothes are on the chair.', 'points' => 10], ['issue' => 'Books are not on the shelf.', 'points' => 10],
            ['issue' => 'Trash can is overflowing.', 'points' => 20], ['issue' => 'Desk is cluttered.', 'points' => 10],
            ['issue' => 'Dirty dishes were left out.', 'points' => 25], ['issue' => 'Window has smudges.', 'points' => 5],
            ['issue' => 'Shoes are not put away.', 'points' => 10], ['issue' => 'Crumbs are on the floor.', 'points' => 15],
            ['issue' => 'Drawers or closet doors are open.', 'points' => 5], ['issue' => 'The rug is crooked.', 'points' => 5],
            ['issue' => 'Pillows are on the floor.', 'points' => 10], ['issue' => 'Art supplies are not packed away.', 'points' => 15],
            ['issue' => 'The curtains are messy.', 'points' => 5], ['issue' => 'There are cobwebs in the corner.', 'points' => 20],
            ['issue' => 'The floor needs to be vacuumed.', 'points' => 15], ['issue' => 'Furniture needs dusting.', 'points' => 10],
            ['issue' => 'The computer keyboard is dusty.', 'points' => 5], ['issue' => 'Water bottle was left uncapped.', 'points' => 5],
            ['issue' => 'Blankets are not folded.', 'points' => 10], ['issue' => 'Game controllers are not organized.', 'points' => 5],
            ['issue' => 'Stickers are peeling off furniture.', 'points' => 10], ['issue' => 'The mirror is dirty.', 'points' => 10],
            ['issue' => 'Light switch has fingerprints.', 'points' => 5], ['issue' => 'A poster on the wall is tilted.', 'points' => 5],
            ['issue' => 'School bag is not packed.', 'points' => 10], ['issue' => 'Used tissues are on the nightstand.', 'points' => 15],
            ['issue' => 'Cables and chargers are tangled.', 'points' => 5], ['issue' => 'A plant in the room needs watering.', 'points' => 10],
            ['issue' => 'The laundry basket is full.', 'points' => 15], ['issue' => 'The lampshade is crooked.', 'points' => 5],
            ['issue' => 'Pencil shavings are on the desk.', 'points' => 5], ['issue' => 'A board game has been left out.', 'points' => 10],
            ['issue' => 'The blinds are uneven.', 'points' => 5], ['issue' => 'Socks are under the bed.', 'points' => 10],
            ['issue' => 'A backpack is unzipped on the floor.', 'points' => 5], ['issue' => 'The bedspread is wrinkled.', 'points' => 5],
            ['issue' => 'A collection of bottle caps is on the floor.', 'points' => 10], ['issue' => 'A half-eaten apple is on the desk.', 'points' => 20],
            ['issue' => 'The pet\'s water bowl is empty.', 'points' => 10], ['issue' => 'A towel is damp on the floor.', 'points' => 15],
            ['issue' => 'The bookshelf is dusty.', 'points' => 10], ['issue' => 'A single crayon is on the rug.', 'points' => 5],
            ['issue' => 'A puzzle is missing pieces and left out.', 'points' => 15], ['issue' => 'The doorknob is sticky.', 'points' => 5],
            ['issue' => 'A comic book is bent.', 'points' => 5], ['issue' => 'The curtains are half-open.', 'points' => 5],
            ['issue' => 'A sports ball is under the desk.', 'points' => 5], ['issue' => 'The gaming headset is not on its stand.', 'points' => 5],
        ];

        shuffle($messyOptions);
        $numberOfIssues = rand(2, 6);
        $selectedIssues = array_slice($messyOptions, 0, $numberOfIssues);

        $report = "";
        $totalPointsToSubtract = 0;
        foreach ($selectedIssues as $item) {
            $report .= "- " . $item['issue'] . "\n";
            $totalPointsToSubtract += $item['points'];
        }

        $score = 100 - $totalPointsToSubtract;
        if ($score < 0) { $score = rand(5, 15); }

        $this->roomImage->update([
            'ai_analysis' => trim($report),
            'tidiness_score' => $score,
        ]);

        // Fire the event to notify the user!
        AnalysisCompleted::dispatch($this->roomImage);
    }
}