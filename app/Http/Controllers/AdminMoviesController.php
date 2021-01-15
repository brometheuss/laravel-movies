<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\AdminMoviesModel;
use Illuminate\Http\Request;

class AdminMoviesController extends Controller
{
    private $model;
    private $data;

    public function __construct(){
        $this->model = new AdminMoviesModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['movies'] = $this->model->getMovies();
        return view('admin.movies.movie', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['genres'] = $this->model->getGenres();
        return view('admin.movies.insert-movie', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $file = $request->file('moviePic');
        $fileName = $file->getClientOriginalName();
        $originalName = $file->getClientOriginalName();
        $fileName = time() . "_" . $fileName;
        try{
            $file->move(public_path("images\movies"), $fileName);
            $new = 'images/movies' . $fileName;
            $this->model->title = $request->input('movieTitle');
            $this->model->description = $request->input('movieDescription');
            $this->model->date = $request->input('dateReleased');
            $this->model->genreId = $request->input('genreId');
            $this->model->pictureFile = $new;
            $this->model->originalName = $originalName;

            $this->model->insertMovie();
            return redirect('/admin-panel/movies')->with('movie-success', 'You successfully add a movie.');
        }catch (\Throwable $e) {
            return redirect('/admin-panel/movies')->with('movie-fail', 'Error while trying to add a movie.');
            //echo $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $this->data['genres'] = $this->model->getGenres();
//        $this->data['movie'] = $this->model->getMovieGallery($id);
//        return view('admin.movies.edit-movie', $this->data);
        return redirect('/admin-panel/movies');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        try{
//            $file = $request->file('moviePic');
//            $fileName = $file->getClientOriginalName();
//            $originalName = $file->getClientOriginalName();
//            $fileName = time() . "_" . $fileName;
//
//            $file->move(public_path("images/movies"), $fileName);
//
//            $this->model->title = $request->input('movieTitle');
//            $this->model->description = $request->input('movieDescription');
//            $this->model->date = $request->input('dateReleased');
//            $this->model->genreId = $request->get('genreId');
//            $this->model->pictureFile = $fileName;
//            $this->model->originalName = $originalName;
//            $this->model->idMovie = $id;
//
//            $this->model->updateMovie($this->model->idMovie);
//
//            dd($this->model);
//            return redirect('/admin-panel/movies')->with('upd-suc', 'Successfully updated the movie.');
//        }catch(\Exception $e) {
//            \Log::info("Failed to update movie.");
//            return redirect('/admin-panel/movies')->with('upd-fail', 'Failed to update the movie    .');
//            //echo $e->getMessage();
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $row = $this->model->getMovie($id);
            $picId = $row->picture_id;

            $this->model->idMovie = $id;
            $this->model->idPicture = $picId;

            $this->model->deleteMovie();
            return redirect('/admin-panel/movies')->with('movie-del-suc', 'Movie successfully deleted');
        } catch (\Exception $e) {
            \Log::critical("Failed to delete movie.");
            return redirect('/admin-panel/movies')->with('movie-del-fail', 'Something went wrong, please try again.');
            //echo $e->getMessage();
        }
    }
}
