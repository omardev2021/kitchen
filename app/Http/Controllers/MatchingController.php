<?php

namespace App\Http\Controllers;

use App\Models\Matching;
use App\Models\Provider;
use App\Models\Seeker;
use Illuminate\Http\Request;

class MatchingController extends Controller
{
    public function match() {
        //get all seekers
        $seekers = Seeker::all();
        $providers = Provider::all();




        //loop over seekers
        foreach ($seekers as $seeker) {
            foreach ($providers as $provider) {
                if($seeker->city_id !== $provider->city_id && $seeker->food_id === $provider->food_id ) {

                    $exist = Matching::where('seeker_id',$seeker->id)->where('provider_id',$provider->id)->where('score',9)->first();
                    if (!$exist) {
                        $match = new Matching();
                        $match->seeker_id = $seeker->id;
                        $match->provider_id = $provider->id;
                        $match->score = 9;
                        $match->save();
                    }


                }
                if ($seeker->city_id === $provider->city_id && $seeker->food_id === $provider->food_id) {

                    $exist = Matching::where('seeker_id',$seeker->id)->where('provider_id',$provider->id)->where('score',7)->first();
                    if (!$exist) {
                        $match = new Matching();
                        $match->seeker_id = $seeker->id;
                        $match->provider_id = $provider->id;
                        $match->score = 7;
                        $match->save();
                    }



                }



            }


        }
        //foreach seeker loop over providers
        return redirect()->route('admin.index');
        //if else and insert matching
    }
}
