<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jaime;
use App\Models\PartageRecette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KimController extends Controller
{
    //Mention j'aime
    public function jaime(PartageRecette $id)
    {
        $person = Jaime::where('user_id',Auth::user()->id)->where('pub_id',$id->id)->first();
        $pub = PartageRecette::where('id',$id->id)->first();
        if(!$person)
        {
            Jaime::create([
                'user_id'=>Auth::user()->id,
                'pub_id'=>$id->id
            ]);
                $id->update([
                    'jaime'=>$pub->jaime+1
                ]);
        }else{
            Jaime::where('user_id',$person->user_id)->where('pub_id',$person->pub_id)->delete();
            $id->update([
                'jaime'=>$pub->jaime-1
            ]);
        }
        return back();
    }
    public function jaimes(PartageRecette $id, Request $request)
    {
        
        $person = Jaime::where('user_id',$request->userAgent())->where('pub_id',$id->id)->first();
        $pub = PartageRecette::where('id',$id->id)->first();
        if(!$person)
        {
            Jaime::create([
                'user_id'=>$request->userAgent(),
                'pub_id'=>$id->id
            ]);
                $id->update([
                    'jaime'=>$pub->jaime+1
                ]);
        }else{
            Jaime::where('user_id',$person->user_id)->where('pub_id',$person->pub_id)->delete();
            $id->update([
                'jaime'=>$pub->jaime-1
            ]);
        }
        return back();
    }
    public function sendComs(PartageRecette $id, Request $request)
    {
       
        $pub = PartageRecette::where('id',$id->id)->first();
            Commentaire::create([
                'user_id'=>Auth::user()->id,
                'pub_id'=>$id->id,
                'coms'=>nl2br($request->coms)
            ]);
                $id->update([
                    'coms'=>$pub->coms+1
                ]);
        return back();
    }
    public function sendCom(PartageRecette $id, Request $request)
    {
       
        $pub = PartageRecette::where('id',$id->id)->first();
            Commentaire::create([
                'user_id'=>$request->userAgent(),
                'pub_id'=>$id->id,
                'coms'=>nl2br($request->coms)
            ]);
                $id->update([
                    'coms'=>$pub->coms+1
                ]);
        return back();
    }
    public function recherche(Request $request)
    {
      
        return view('guest.search',['q'=> $request->q]);
    }
    public function delete_recette(PartageRecette $id)
    {
        Commentaire::where('pub_id',$id->id)->delete();
        Jaime::where('pub_id',$id->id)->delete();
        $id->delete();
        return back();
    }
}
