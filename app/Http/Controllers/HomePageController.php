<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $sliders = HomePage::find(1);
        return view('admin.pages.home.slider.index', compact('sliders'));
    }

    public function sliderStore(Request $request){
        $slide_num = count($request -> slide_code);

        $slider = [];
        for ( $i = 0; $i < $slide_num; $i++){
            if ($request -> hasFile('photo')){
                $img = $request -> file('photo');

                foreach ($img as $image) {
                    $file_name = md5(time().rand()).'.'.$image -> getClientOriginalExtension();
                    //$image -> move( public_path('media/sliders'),$file_name );
                    $image -> move( public_path('media/sliders'), $file_name );
                    //$image->move('media/sliders/', $file_name);
                }
            }else{
                $file_name = '';
            }

            $slide_arr = [
                'slide_code' => $request -> slide_code[$i],
                'title' => $request -> title[$i],
                'sub_title' => $request -> sub_title[$i],
                'btn_text' => $request -> btn_text[$i],
                'btn_link' => $request -> btn_link[$i],
                'photo' => $file_name,
//                'bg_img' => $request -> bg_img[$i],
            ];
            array_push($slider, $slide_arr);
        }


        $slider_arr = [
            'slider' => $slider,
        ];

        //Json Encode from Array
        $slider_json = json_encode($slider_arr);

        //Data sent to Database
        $slider_data = HomePage::find(1);
        $slider_data -> sliders = $slider_json;
        $slider_data -> update();
        return redirect() -> route('slider.index') -> with('success', 'Slider updated successfull');

    }
}
