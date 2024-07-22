<?php

namespace App\Console;

use App\Http\Traits\SaveMoviesTrait;
use App\Services\ApiClient;
use Illuminate\Console\Command;

class RetrieveMoviesCommand extends Command
{
    use SaveMoviesTrait;


    public $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature  = 'movie:retrieve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve today\'s movies from the API.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ApiClient $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $movies = $this->client->get('get', 'trending/movie/day?language=en-US')->results;
        $count = count($movies);

        $this->info('Retrieved ' . $count . ' movies.');

        try {
            $this->save($movies, $count, function($progress, $movie) {
                $this->info("Progress: {$progress}%. Saving movie: {$movie->title}");
            });
        } catch (\Exception $e) {
            $this->error('An error occurred while saving the movies: ' . $e->getMessage());
        }
    }
}
