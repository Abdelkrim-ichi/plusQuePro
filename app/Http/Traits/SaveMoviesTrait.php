<?php

namespace App\Http\Traits;

use App\Models\Movie;

trait SaveMoviesTrait
{
    public function save($movies, $count, callable $progressCallback)
    {
        $total = count($movies);
        $count = 0;

        foreach ($movies as $movie) {
            $existingMovie = Movie::where('movie_id', $movie->id)->first();

            if ($existingMovie) {
                $existingMovie->update([
                    'vote_average' => $movie->vote_average,
                    'popularity' => $movie->popularity,
                    'vote_count' => $movie->vote_count,
                ]);

                $count++;
                $progress = ($count / $total) * 100;
                $progressCallback($progress, $movie);

            } else {
                Movie::create([
                    'movie_id' => $movie->id,
                    'title' => $movie->title,
                    'overview' => $movie->overview,
                    'poster_path' => $movie->poster_path,
                    'release_date' => $movie->release_date,
                    'vote_average' => $movie->vote_average,
                    'popularity' => $movie->popularity,
                    'original_language' => $movie->original_language,
                    'original_title' => $movie->original_title,
                    'backdrop_path' => $movie->backdrop_path,
                    'video' => $movie->video,
                    'adult' => $movie->adult,
                    'vote_count' => $movie->vote_count,
                    'genre_ids' => $movie->genre_ids,
                    'media_type' => $movie->media_type,
                ]);

                $count++;
                $progress = ($count / $total) * 100;
                $progressCallback($progress, $movie);
            }
        }

    }
}
