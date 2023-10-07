<?php

namespace App\Http\Controllers\Artikel;

use App\Http\Controllers\Util\UtilController;
use App\Model\ArtikelModel;
use App\Model\CommentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as Input;

class ArtikelController extends Controller
{

    public function comment(Request $request) {
        // dd($request);

        $post = CommentModel::find($request->idArtikel);
        if (!$post) {
            $post = new CommentModel;
            $post->id = UtilController::UUID();
        }
        $post->artikel_id = $request->idArtikel;
        $post->comment = $request->comment;
        $post->name = $request->name;
        $post->save();

        // return redirect()->url('detail?id='.$post->artikel_id)->with('success','Data Berhasil di Simpan !');
        return redirect('detail?id='.$request->idArtikel);
    }
    public function like() {
        $obj = new \stdClass();
        $id = Input::get('id');
        $artikel = ArtikelModel::find($id);
        if ($artikel) {
            $artikel->like = $artikel->like + 1;
            $artikel->save();
        }

        $obj->lastLike = $artikel->like;
        return $obj;
    }
    public function dislike() {
        $obj = new \stdClass();
        $id = Input::get('id');
        $artikel = ArtikelModel::find($id);
        if ($artikel) {
            $artikel->dislike = $artikel->dislike + 1;
            $artikel->save();
        }

        $obj->lastDislike = $artikel->dislike;
        return $obj;
    }
    //
    public function getDataSideBar() {
        $obj = new \stdClass();
        $obj->list_dosir = ArtikelModel::where('is_publish', 1)->orderBy('viewed', 'asc')->groupBy('category')->get();
        $obj->list_recent_post = ArtikelModel::where('is_publish', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        $obj->list_popular_post = ArtikelModel::where('is_publish', 1)->orderBy('viewed', 'desc')->limit(5)->get();
//        dd($obj);
        return $obj;
    }
    public function getDataArtikel($value = "", $key = "") {
        $obj = new \stdClass();

        $data_artikel = ArtikelModel::where('is_publish', 1)->orderBy('created_at', 'desc')->limit(10);
        $data_sidebar = ArtikelController::getDataSideBar();

        if ($value != "" && $key != "") {
            $data_artikel->where($key, $value);
        }

        $obj->data_artikel = $data_artikel->get();
        $obj->data_sidebar = $data_sidebar;

        return $obj;
    }
    public function index() {
        $data = ArtikelController::getDataArtikel();
        return view('pages.index')
            ->with('data_sidebar', $data->data_sidebar)
            ->with('data_artikel', $data->data_artikel);
    }

    public function detail() {
        $id = Input::get('id');
        $data = ArtikelController::getDataArtikel($id, 'id');

        //update viewed nya
        $artikel = ArtikelModel::find($id);
        if ($artikel) {
            $artikel->viewed = $artikel->viewed + 1;
            $artikel->save();
        }

        // dd($data->data_artikel);
        foreach($data->data_artikel as $item) {
            $item->list_comment = CommentModel::where('artikel_id', $item->id)->orderBy('created_at', 'asc')->get();
        }

        return view('pages.detail_artikel')
            ->with('data_sidebar', $data->data_sidebar)
            ->with('data_artikel', $data->data_artikel);
    }

    public function kategori() {
        $kategori = Input::get('kategori');
        $data = ArtikelController::getDataArtikel($kategori, 'category');

        return view('pages.kategori')
            ->with('data_sidebar', $data->data_sidebar)
            ->with('data_artikel', $data->data_artikel);
    }

    public function search() {
        $data_sidebar = ArtikelController::getDataSideBar();
        $data_artikel = ArtikelModel::where(function ($query) {
            $value = Input::get('search');
            $query->where('judul', 'like', '%'.$value.'%')->orWhere('category', 'like', '%'.$value.'%')->orWhere('sub_category', 'like', '%'.$value.'%')->orWhere('isi', 'like', '%'.$value.'%');
        })
        ->where('is_publish', 1)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('pages.search')
            ->with('data_sidebar', $data_sidebar)
            ->with('data_artikel', $data_artikel);
    }
}
