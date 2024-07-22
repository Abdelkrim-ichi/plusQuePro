<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class MoviesList extends Component
{
    use WithPagination;

    public $isUpdatePage = false;
    public $page = 1;
    public $perPage = 10;
    public $search = '';
    public $sortDirection = 'DESC';
    public $sortColumn = 'created_at';
    public $confirmDeleteId;

    public function doSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = ($this->sortDirection === 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }

    public function updatingPage($page)
    {
        $this->page = $page ?: 1;

    }

    public function updatedPage()
    {
        session(['page' => $this->page]);
    }

    /**
     * Initialize component with stored page or default values.
     *
     * @return void
     */
    public function mount()
    {
        if (session()->has('page')) {
            $this->page = session('page');
        }
    }

    public function render()
    {
        $columns = [
            ['label' => 'Title', 'column' => 'title', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Overview', 'column' => 'overview', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Poster Path', 'column' => 'poster_path', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Release Date', 'column' => 'release_date', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Vote Average', 'column' => 'vote_average', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Popularity', 'column' => 'popularity', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Original Language', 'column' => 'original_language', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Original Title', 'column' => 'original_title', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Backdrop Path', 'column' => 'backdrop_path', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Video', 'column' => 'video', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Adult', 'column' => 'adult', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Vote Count', 'column' => 'vote_count', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Genre Ids', 'column' => 'genre_ids', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Media Type', 'column' => 'media_type', 'isData' => true,'hasRelation'=> false],

            ['label' => 'Action', 'column' => 'action', 'isData' => false,'hasRelation'=> false],

        ];
        $movies = Movie::search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perPage, ['*'], 'page');

        return view('livewire.movies-list', compact('movies', 'columns'));
    }

    public function customFormat($column, $data)
    {
        switch ($column) {
            case 'created_at':
            case 'release_date':
                $parsedDate = \Carbon\Carbon::parse($data);
                return $parsedDate->diffForHumans();
            default:
                return $data;
        }
    }
}
