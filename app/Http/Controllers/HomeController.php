<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class HomeController extends Controller
{
    public function AllSlider(){
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }
    public function AddSlider(){
        return view('admin.slider.create');
    }
    public function StoreSlider(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:20',
            'image' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required|max:100'
        ],[
            'title.required' => 'Please input title',
            'description.required' => 'Please input description'
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 1080)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'.$name_gen;

        Slider::insert([
            'title'=> $request->title,
            'description' => $request->description,
            'image' => $last_img
        ]);
        
        return Redirect()->route('all.slider')->with('success', 'Slider Inserted');
    }
}
