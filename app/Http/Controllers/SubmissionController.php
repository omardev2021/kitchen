<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Seeker;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function seeker(Request $request) {

       $validated_arr = $this->validate($request,[
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'city_id' => 'required',
            'food_id' => 'required',
           'location_no'=>'required'
        ]);

       Seeker::create($validated_arr);
        $request->session()->flash('success', 'We will contact you shortly if there is a match.');

       return redirect()->route('home');

    }

    public function provider(Request $request) {

        $validated_arr = $this->validate($request,[
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'city_id' => 'required',
            'food_id' => 'required',
            'location_no'=>'required'
        ]);

        Provider::create($validated_arr);
        $request->session()->flash('success', 'We will contact you shortly if there is a match.');

        return redirect()->route('home');
    }


    public function all_providers() {
        $requests = Provider::all();
        return view('admin.requests.providers',compact('requests'));
    }

    public function all_seekers() {
        $requests = Seeker::all();
        return view('admin.requests.seekers',compact('requests'));
    }
}
