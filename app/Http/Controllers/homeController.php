<?php

namespace App\Http\Controllers;

use App\Http\Requests\comentRequest;
use App\Models\articl;
use App\Models\categorie;
use App\Models\comment;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $articls =  articl::

           all()->random(2);


        $cates = categorie::select('id','name','image','ref_cat')
            ->limit(4)
            ->get();

        return view('home.index',compact('articls','cates'));
    }

    public function indexblog(){
        $articls =  articl::select('id','title','descr','image','date','ref','categorie_id','user_id')
            ->with('userarticl',function ($q){
                $q->select('id','name');
            })
            ->get();
        //return $articls;
        return view('home.blog',compact('articls'));
    }

    public function blogdetail(Request $request,$ref){
        $refcheck = articl::where('ref',$ref)-> first();
        if (!$refcheck)
            return redirect() -> back();

        $articl =  articl::select('id','title','descr','image','date','ref','user_id')
            ->with('userarticl',function ($q){
                $q->select('id','name');
            })
            ->where('ref',$ref)
            ->first();

        ###comment ###
        $articlid = articl::select('id','ref')->where('ref',$ref)
            ->first();

        $commentshows = comment::select('id','comment','name','email','website','date','valide','articl_id')
            ->where('articl_id',$articlid->id)
            ->get();

        ###comment ###


        return view('home.blogdetail',compact('articl','commentshows'));
    }
    ################## categorie #####################
    public function categories(){
        $cates = categorie::select('id','name','image','ref_cat')
        ->get();
        return view('home.categorie',compact('cates'));
    }

    public function categoriesbost($ref){
        $refcheck = categorie::where('ref_cat',$ref)-> first();
        if (!$refcheck)
            return redirect() -> back();

        $cate = categorie::where('ref_cat',$ref)->first();
        $articls   = $cate->artyicl;

        //return $articl;
        return view('home.catblog',compact('articls'));
    }

    ############## add comment ################
    public function addcomment(comentRequest $request){
        $commentadd = comment::create([
            'comment'     =>$request->comment,
            'name'        =>$request->name,
            'email'       =>$request->email,
            'website'     =>$request->website,
            'articl_id'     =>$request->articl_id,
        ]);
        if ($commentadd)
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
    ############## add comment ################

    ############## Contact ################
    public function contact(){
        return view('home.contact');
    }
    ############## /Contact/ ################
}
