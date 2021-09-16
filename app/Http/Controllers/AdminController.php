<?php

namespace App\Http\Controllers;

use App\Http\Requests\articlRequest;
use App\Http\Requests\categorylRequest;
use App\Http\Requests\edarticlRequest;
use App\Http\Requests\edcategorylRequest;
use App\Http\Requests\usersRequest;
use App\Models\articl;
use App\Models\categorie;
use App\Models\comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\imageTrait;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use imageTrait;

    public function index(){
        return view('adminCp.index');
    }
    ###### Articl #######################################################
    public function articl(){
        $isadmin = Auth::user() ->role;
        $userid = Auth::user() ->id;

        if ($isadmin == "1"){
            $articls = articl::select('id','title','image','date','ref','user_id')->get();
            return view('adminCp.articl',compact('articls'));
        }else{
            $articls = articl::select('id','title','image','date','ref','user_id')->where('user_id',$userid)->get();
            return view('adminCp.articl',compact('articls'));
        }

    }
    public function addarticl(){
        $cates = categorie::select('name','id')->get();
        return view('adminCp.addarticl',compact('cates'));
    }
    public function articlstor(articlRequest $request){
        $image = $this->saveImage($request->image , 'img/blog');

        $articlAdd = articl::create([
            'title'         => $request->title,
            'descr'         => $request->ckeditor,
            'image'         => $image,
            'ref'           => base_convert(time(), 10, 36),
            'categorie_id'  => $request->cate,
            'user_id'       => Auth::user()->id
        ]);
        if ($articlAdd)
            return response() ->json([
               'status'=>true,
                'msg'=>'Done !!'
            ]);
        else
            return response() ->json([
                'status'=>false,
                'msg'=>'error'
            ]);
    }

    public function articledit($ref,$useid){
        $refcheck = articl::where('ref',$ref)-> first();

        if (!$refcheck)
            return redirect() -> back();
        elseif ($useid != Auth::user()->id)
            return redirect() -> back();

        $listcats = categorie::select('id','name')->get();
        $articls =  articl::select('title','descr','image','date','ref','categorie_id')
            ->where('ref',$ref)
            ->first();
         $cat = $articls->category;
        return view('adminCp.editarticl',compact('articls','cat','listcats'));
    }
    public function editarticlstor(edarticlRequest $request){
        $refcheck = articl::select('ref')->where('ref',$request->ref_articl);
        if (!$refcheck)
            return redirect()->back();

        if ($request->image == null){
            $refcheck->update([
                'title'         => $request->title,
                'descr'         => $request->ckeditor,
                'categorie_id'  => $request->cate,
            ]);
        }else{
            $image = $this->saveImage($request->image , 'img/blog');
            $refcheck->update([
                'image'         => $image,
                'title'         => $request->title,
                'descr'         => $request->ckeditor,
                'categorie_id'  => $request->cate,
            ]);
        }
        return response() -> json([
            'status' => true,
            'msg' => 'Done!!',
        ]);
    }

    public function deletarticl(Request $request){
        $attrdelet = articl::find($request -> id);
        if (!$attrdelet){
            redirect() -> back() -> with(['error' => 'programme not find']);
        }

        $attrdelet -> delete();

        return response() -> json([
            'status' => true,
            'msg' => 'will Done !!',
            'id' => $request -> id,
        ]);
    }
    ###### /Articl/ #######################################################

    ###### category #######################################################
    public function category(){
        $cates = categorie::select('id','name','ref_cat','image')->get();
        return view('adminCp.category',compact('cates'));
    }
    public function addcategory(){
        return view('adminCp.addcategory');
    }
    public function categorystor(categorylRequest $request){
        $image = $this->saveImage($request->image , 'img/category');

        $categoryAdd = categorie::create([
            'name'      => $request->title,
            'ref_cat'  => base_convert(time(), 10, 36),
            'image'     => $image,
        ]);
        if ($categoryAdd)
            return response() ->json([
                'status'=>true,
                'msg'=>'Done !!'
            ]);
        else
            return response() ->json([
                'status'=>false,
                'msg'=>'error'
            ]);
    }

    public function editcategory($ref_cat){
        $linkcheck = categorie::where('ref_cat',$ref_cat)-> first();
        if (!$linkcheck)
            return redirect() -> back();

        $cate = categorie::select('id','name','ref_cat','image')
            ->where('ref_cat',$ref_cat)
            ->first();

        return view('adminCp.editcategorie',compact('cate'));
    }

    public function editcategorystor(edcategorylRequest $request){
        $linkcheck = categorie::select('ref_cat')->where('ref_cat',$request->link_category);
        if (!$linkcheck)
            return redirect()->back();

        if ($request->image == null){
            $linkcheck->update([
                'name'      => $request->title,
            ]);
        }else{
            $image = $this->saveImage($request->image , 'img/category');
            $linkcheck->update([
                'name'      => $request->title,
                'image'     => $image,
            ]);
        }
        return response() -> json([
            'status' => true,
            'msg' => 'Done!!',
        ]);
    }

    ###### /category/ #######################################################


    ###### Comment #######################################################
    public function comment(){
        $comments = comment::select('id','comment','name','email','website','date','articl_id')->get();
        return view('adminCp.comment',compact('comments'));
    }

    public function commentcheck(Request $request){
        $commentid = comment::find($request->id);
        if (!$commentid)
            return abort('404');

        $commentstatu = comment::select('id','valide')->find($request->id);

        if ($commentstatu->valide == "1"){
            $commentid->update([
                'valide' => "0",
            ]);
        }elseif($commentstatu->valide == "0"){
            $commentid->update([
                'valide' => "1",
            ]);
        }

        return response() -> json([
            'status' => true,
            'msg' => 'will Done !!',
            'id' => $request -> id,
        ]);

    }

    public function deletcomment (Request $request){
        $attrdelet = comment::find($request -> id);
        if (!$attrdelet){
            redirect() -> back() -> with(['error' => 'programme not find']);
        }

        $attrdelet -> delete();

        return response() -> json([
            'status' => true,
            'msg' => 'will Done !!',
            'id' => $request -> id,
        ]);
    }
    ###### /Comment/ #######################################################


    ###### Users #######################################################
    public function users(){
        $users = User::select('id','name','email','role')->get();
        return view('adminCp.users',compact('users'));
    }

    public function usersupdate($id){
        $checkUser = User::find($id);
        if (!$checkUser){
            return redirect()->route('admin.users');
        }

        $users = User::select('id','name','email','role')->find($id);
        $userrole = User::select('id','role')->get();
        return view('adminCp.edituser',compact('users','userrole'));
    }

    public function usersupdatestr(Request $request){
        
        $checkUser = User::find($request->user_id);

        if (!$checkUser){
            return redirect()->route('admin.users');
        }

        $checkUser->update([
            'role' => $request->role,
        ]);

        return response() -> json([
            'status' => true,
            'msg' => 'Done!!',
        ]);
    }

    ###### /Users/ #####################################################


}
