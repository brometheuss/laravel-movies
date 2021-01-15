<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MovieModel extends Model
{
    public function getMovies() {
        return DB::table('movie')
            ->join('movie_gallery', 'movie.picture_id', '=', 'movie_gallery.id_picture')
            ->paginate(2);
    }
    public function getGenres() {
        return DB::table('genre')
            ->get();
    }
    public function getSingleMovie($id) {
        return DB::table('movie')
            ->join('movie_gallery', 'movie.picture_id', '=', 'movie_gallery.id_picture')
            ->join('genre', 'movie.genre_id', '=', 'genre.id_genre')
            ->where('id_movie', '=', $id)
            ->first();
    }

    public function getMoviesByGenre($id) {
        return DB::table('movie')
            ->join('movie_gallery', 'movie.picture_id', '=', 'movie_gallery.id_picture')
            ->join('genre', 'movie.genre_id', '=', 'genre.id_genre')
            ->where('id_genre', '=', $id)
            ->paginate(2);
    }
}
