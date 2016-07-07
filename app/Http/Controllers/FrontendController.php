<?php

namespace App\Http\Controllers;

use App\Songs;
use App\Tags;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend/pages/index')->with([
            'data' => array()
        ]);
    }

    public function addSong(){
        return view('frontend/pages/add-song')->with([
            'data' => array()
        ]);
    }

    public function saveSong(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required'
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $input = $request->all();
        $song = new Songs();
        $song->fill($input);
        $song->save();
        if($input['tags']) {
            $tags = explode(',', $input['tags']);
            foreach($tags as $tag){
                $current = Tags::firstOrNew(array('name' => $tag));
                $current->name = $tag;
                $current->save();
                $song->tags()->attach($current->id);
            }
        }
        Flash::success('Piosenka została pomyślnie dodana!');
        return redirect()->action('FrontendController@index');
    }

    public function allSongs(){
        $songs = Songs::all();
        return view('frontend/pages/all-songs')->with([
            'songs' => $songs
        ]);

    }

    public function manageTags(){
        $tags = Tags::has('songs')->orderBy('name', 'ASC')->get();
        return view('frontend/pages/manage-tags')->with([
            'tags' => $tags
        ]);
    }

    public function search()
    {
        $query = Input::get('q');
        $type = Input::get('type');
        if ($query) {
            if($type == 'title') {
                $songs = Songs::where('title', 'LIKE', '%' . $query . '%')->get();
            } else {
                $songs = Songs::whereHas('tags', function($q) use($query){
                    $q->where('name', 'LIKE', '%'.$query.'%');
                })->get();
            }
            return view('frontend/pages/search')->with([
                'songs' => $songs,
                'type' => $type,
                'q' => $query
            ]);
        } else {
            return redirect()->action('FrontendController@allSongs');
        }
    }

    public function editSong($id){
        $song = Songs::findOrFail($id);
        return view('frontend/pages/edit-song')->with([
            'song' => $song
        ]);
    }

    public function updateSong($id, Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required'
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $input = $request->all();
        $song = Songs::findOrFail($id);
        $song->fill($input);
        $song->save();
        $song->tags()->detach($song->tags()->lists('id')->toArray());
        if($input['tags']) {
            $tags = explode(',', $input['tags']);
            foreach($tags as $tag){
                $current = Tags::firstOrNew(array('name' => $tag));
                $current->name = $tag;
                $current->save();
                $song->tags()->attach($current->id);
            }
        }
        Flash::success('Piosenka została pomyślnie zapisana!');
        return redirect()->action('FrontendController@editSong', ['id' => $id]);
    }

    public function showSong($id){
        $song = Songs::findOrFail($id);
        return view('frontend/pages/show-song')->with([
            'song' => $song
        ]);
    }
}
