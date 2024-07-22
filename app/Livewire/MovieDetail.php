<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieDetail extends Component
{
    public $movie;
    public $state = [];

    public function render()
    {
        if (request()->movie_id) {
            $this->movie = Movie::find(request()->movie_id);
        }
        $this->state = [
            'title' => $this->movie->title,
            'overview' => $this->movie->overview,
            'poster_path' => $this->movie->poster_path,
            'release_date' => $this->movie->release_date,
            'vote_average' => $this->movie->vote_average,
            'popularity' => $this->movie->popularity,
            'original_language' => $this->movie->original_language,
            'original_title' => $this->movie->original_title,
            'backdrop_path' => $this->movie->backdrop_path,
            'video' => $this->movie->video,
            'adult' => $this->movie->adult,
            'vote_count' => $this->movie->vote_count,
            'genre_ids' => $this->movie->genre_ids,
            'media_type' => $this->movie->media_type,
        ];
        return view('livewire.movie-detail');
    }

    public function update()
    {
        try {
            $this->movie->update($this->state);
            session()->flash('message', 'Update successful.');

        } catch (\Exception $e) {
            session()->flash('error', 'Update failed: ' . $e->getMessage());
        }
    }
}
