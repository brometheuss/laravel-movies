<?php

namespace App\Http\Controllers;

use App\Models\MovieModel;
use Illuminate\Http\Request;

class MovieController extends FrontEndController
{
    private $movieModel;

    public function __construct(){
        parent::__construct();
        $this->movieModel= new MovieModel();
        $this->data['genres'] = $this->movieModel->getGenres();
    }

    public function listMovies(){
        $this->data['movies'] = $this->movieModel->getMovies();
        $this->data['genres'] = $this->movieModel->getGenres();
        return view('pages.movies', $this->data);
    }

    public function listSingleMovie($id) {
        $this->data['single'] = $this->movieModel->getSingleMovie($id);
        //dd($this->data);
        return view('pages.single-movie', $this->data);
    }

    public function listMoviesGenre($id){
        $this->data['movies'] = $this->movieModel->getMoviesByGenre($id);
        return view('pages.movies', $this->data);
    }
}
