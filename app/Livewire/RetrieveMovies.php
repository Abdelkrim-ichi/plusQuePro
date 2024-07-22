<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class RetrieveMovies extends Component
{
    public $message = '';
    public function retrieveMovies()
    {
        $exitCode = Artisan::call('movie:retrieve');

        if ($exitCode === 0) {
            $this->message = "Movies retrieved successfully!";
        } else {
            return response()->json(['message' => 'Failed to retrieve movies.'], 500);
        }
    }

    public function render()
    {
        return view('livewire.retrieve-movies');
    }
}
