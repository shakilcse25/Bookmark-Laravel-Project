<?php

namespace App\Http\Controllers;

use App\BookmarkModel;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index() {
        $data = BookmarkModel::all();
        return view('bookmarks.index')->with('bookmarks',$data);
    }

    public function create() {
        $this->validate(request(),[
            'title'=>'required|min:3',
            'link'=>'required|min:5',
            'tag'=>'required',
        ]);

        $data = request()->all();

        $model = new BookmarkModel();

        $model->title = $data['title'];
        $model->link = $data['link'];
        $model->tag = $data['tag'];

        $model->save();

        session()->flash('success','Bookmark Successfully Created!');

        return redirect('/');
    }

    public function update(BookmarkModel $id) {
        $this->validate(request(), [
            'title' => 'required|min:3',
            'link' => 'required|min:5',
            'tag' => 'required',
        ]);

        $data = request()->all();

        $id->title = $data['title'];
        $id->link = $data['link'];
        $id->tag = $data['tag'];

        $id->save();

        return redirect('/');
    }

    public function singlebookmark(BookmarkModel $id){
        $data = BookmarkModel::all();
        return view('bookmarks.index')->with('bookmarks', $data)->with('singlebookmark', $id);
    }

    public function destroy(BookmarkModel $id) {
        $id->delete();
        return redirect('/');
    }
}
