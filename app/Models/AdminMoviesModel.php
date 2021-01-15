<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class AdminMoviesModel extends Model
{
    public $title;
    public $description;
    public $date;
    public $genreId;
    public $pictureFile;
    public $path;
    public $idMovie;
    public $idPicture;
    public $originalName;

    public function getMovies() {
        return DB::table('movie')
            ->join('movie_gallery', 'movie.picture_id', '=', 'movie_gallery.id_picture')
            ->get();
    }

    public function getGenres() {
        return DB::table('genre')
            ->get();
    }

    public function insertMovie() {
        try {
            DB::transaction(function (){
                $id = DB::table('movie_gallery')->insertGetId([
                        'name' => $this->originalName,
                        'path' => $this->pictureFile,
                        'alt' => $this->title
                    ]);

                DB::table('movie')->insert([
                    'title' => $this->title,
                    'description' => $this->description,
                    'date_released' => $this->date,
                    'genre_id' => $this->genreId,
                    'picture_id' => $id
                ]);
            });
        }catch(\Throwable $e){
            \Log::critical("Failed to insert movie into database.");
            throw new \Exception($e->getMessage());
        }
    }

    public function getMovie($id) {
        return DB::table('movie')->where([
            'id_movie' => $id
        ])->first();
    }

    public function getMovieGallery($id){
        return DB::table('movie')
            ->join('movie_gallery', 'movie.picture_id', '=', 'movie_gallery.id_picture')
            ->where([
                'movie.id_movie' => $id
            ])->first();
    }

//    public function updateMovie($id) {
//        try {
//            DB::transaction(function (){
//                DB::table('movie_gallery')
//                    ->where([
//                        'id_picture' => $this->idPicture
//                    ])
//                    ->update([
//                        'name' => $this->originalName,
//                        'path' => $this->pictureFile,
//                        'alt' => $this->title
//                    ]);
//
//                DB::table('movie')
//                    ->where([
//                        'id_movie' => $this->idMovie
//                    ])
//                    ->update([
//                        'title' => $this->title,
//                        'description' => $this->description,
//                        'date_released' => $this->date,
//                        'genre_id' => $this->genreId,
//                        'picture_id' => $this->idPicture
//                    ]);
//            });
//        }catch(\Throwable $e) {
//            \Log::critical("Failed to update movie");
//            echo $e->getMessage();
//        }
//    }

    public function deleteMovie() {
        try {
            DB::transaction(function(){
                DB::table('movie_gallery')->where([
                    "id_picture" => $this->idPicture
                ])->delete();

                DB::table('movie')->where([
                    "id_movie" => $this->idMovie
                ])->delete();
            });
        } catch (\Throwable $e) {
            \Log::critical("Failed to delete movie");
            echo $e->getMessage();
        }
    }
}
