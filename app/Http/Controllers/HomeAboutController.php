<?php

namespace App\Http\Controllers;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
    //
    public function AllAbout(){
        $abouts = HomeAbout::latest()->paginate(5);
        return view('admin.about.index', compact('abouts'));
    }

    public function Create(){
        return view('admin.about.create');
    }
    public function StoreAbout(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:20',
            'short_description' => 'required|max:200',
            'long_description' => 'required|max:200'
        ],[
            'title.required' => 'Please input title',
            'short_description.required' => 'Please input short description',
            'long_description.required' => 'Please input long description'
        ]);

        HomeAbout::insert([
            'title'=> $request->title,
            'short_des' => $request->short_description,
            'long_des' => $request->long_description,
        ]);
        
        return Redirect()->route('all.about')->with('success', 'Slider Inserted');
    }
    public function Portfolio(){
        $pics = Multipic::all();
        return view('pages.portfolio', compact('pics'));
    }
}
