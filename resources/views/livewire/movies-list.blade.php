<div>
    @php
        $columns = [
            ['label' => 'Title', 'column' => 'title', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Overview', 'column' => 'overview', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Poster Path', 'column' => 'poster_path', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Release Date', 'column' => 'release_date', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Vote Average', 'column' => 'vote_average', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Popularity', 'column' => 'popularity', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Original Language', 'column' => 'original_language', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Original Title', 'column' => 'original_title', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Backdrop Path', 'column' => 'backdrop_path', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Video', 'column' => 'video', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Adult', 'column' => 'adult', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Vote Count', 'column' => 'vote_count', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Genre Ids', 'column' => 'genre_ids', 'isData' => true,'hasRelation'=> false],
            ['label' => 'Media Type', 'column' => 'media_type', 'isData' => true,'hasRelation'=> false],
            // ['label' => 'Genre', 'column' => 'genre', 'isData' => true,'hasRelation'=> false],
        ];

        if (Auth::check()) {
            $columns[] = ['label' => 'Action', 'column' => 'action', 'isData' => false,'hasRelation'=> false];
        }

    @endphp

    <x-table :title="'Liste des Films'" :columns="$columns" :items="$movies" :sortColumn="$sortColumn" :page="$page" :perPage="$perPage" :sortDirection="$sortDirection"
    />
</div>
