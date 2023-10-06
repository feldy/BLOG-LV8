<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Util\UtilController;
use App\Model\ArtikelModel;
use App\Model\UserModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getListArtikel() {
        $data = ArtikelModel::where(function ($query) {
            $value = Input::get('search');
            $query->where('judul', 'like', '%'.$value.'%')->orWhere('category', 'like', '%'.$value.'%')->orWhere('isi', 'like', '%'.$value.'%');
        })

        ->orderBy('created_at', 'desc')
        ->get();

        return $data;
    }
    public function index() {
        $data = AdminController::getListArtikel();
        return view('pages.admin.index', compact('data'));
    }

    public function viewCreate() {
        return view('pages.admin.create');
    }

    public function create(Request $request) {
        $post = ArtikelModel::find($request->idArtikel);
        if (!$post) {
            $post = new ArtikelModel;
            $post->id = UtilController::UUID();
        }
        $post->judul = $request->judul;
        $post->category = $request->category;
        $post->sub_category = $request->sub_category;
        $post->sumber = $request->sumber;
        $post->isi = htmlspecialchars($request->isi);

        $file = $request->file('cover');
        if ($file) {
//            dd($file);
            $file_name = 'cover_'.$post->id;
            $ext = '.'.$file->extension();
            $post->cover = $file_name.$ext;
            $upload_path = $file->storeAs('resources/uploads/cover', $file_name.$ext);
        }
        $post->save();

        return redirect()->route('admin.index')->with('success','Data Berhasil di Simpan !');
    }

    public function hint() {
        $value = Input::get('search');
        $data = DB::table('tbl_artikel')
            ->select('category')
            ->distinct('category')
            ->where('category', 'like', '%'.$value.'%')
            ->get();

        return json_encode($data->pluck('category'));
    }

    public function uploader(Request $request) {
        $obj = new \stdClass();
        $file = $request->file('image');
        $id = $request->id;
        $path = 'resources/uploads/post/'.$id;
        if ($file) {
            $file_name = $file->getClientOriginalName();
            $upload_path = $file->storeAs('resources/uploads/post/'.$id, $file_name);
            if ($upload_path) {
                $obj->url = $path.'/'.$file_name;
            }
        }

        return json_encode($obj);
    }

    public function delete() {
        $id = Input::get('id');
        //update viewed nya
        $artikel = ArtikelModel::find($id);
        if ($artikel) {
            $artikel->is_publish = 0;
            $artikel->save();
        }

        return redirect()->route('admin.index');
    }

    public function update() {
        $id = Input::get('id');
        //update viewed nya
        $artikel = ArtikelModel::find($id);
        if ($artikel) {
            $artikel->is_publish = 1;
            $artikel->save();
        }

        return redirect()->route('admin.index');
    }

    public function edit() {
        $id = Input::get('id');
        $artikel = ArtikelModel::find($id);
        return view('pages.admin.create', compact('artikel'));
    }

    public function daftar() {
        $dataEdit = null;
        $edit = Input::get('edit');
        $data = UserModel::orderBy('created_at', 'desc')->where(function ($query) {
            $value = Input::get('search');
            $query->where('name', 'like', '%'.$value.'%')->orWhere('email', 'like', '%'.$value.'%');
        })->get();

        if ($edit != null) {
            $dataEdit =  UserModel::find($edit);
        }

        return view('pages.admin.register')
            ->with('data', $data)
            ->with('dataEdit', $dataEdit);
    }

    public function reguser(Request $request) {
        // validation
        $arr = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];


        $usr = new UserModel;
        // dd($request);
        if ($request->idUser != null) {
            $usr = UserModel::find($request->idUser);
            $arr['email'] = "required|string|email|max:255|unique:users,email,".$usr->id;
        } else {
            $usr->id = UtilController::UUID();
        }
        
        $this->validate($request, $arr);
        $usr->name = $request['name'];
        $usr->email = $request['email'];
        $usr->password = bcrypt($request['password']);
        $usr->save();

        return redirect()->route('admin.daftar')->with('success','Data Berhasil di Simpan !');
    }

    public function hapusUser() {
        $id = Input::get('id');
        $user = UserModel::find($id);
        $user->delete();

        return redirect()->route('admin.daftar')->with('success','Data Berhasil di Hapus !');;

    }
}
