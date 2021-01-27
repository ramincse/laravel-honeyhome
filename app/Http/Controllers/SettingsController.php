<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Admin Frontend Logo Index
     */
    public function logoIndex(){
        $logo = Settings::find(1);
        return view('admin.settings.logo.index', compact('logo'));
    }
    /**
     * Admin Frontend Logo data sent to database
     */
    public function logoUpdate(Request $request){
        $logo = $request -> file('logo');
        $logo_width = $request -> logo_width;
        $logo_height = $request -> logo_height;

        $logo_name = $request -> old_logo;
        if ( $request -> hasFile('logo') ){
            $logo_name = md5( time() . rand() ) . '.' . $logo -> getClientOriginalExtension();
            $logo -> move( public_path('media/settings/logo'), $logo_name );
        }else{
            $logo_name = $request -> old_logo;
        }
        $logo_update = Settings::find(1);
        $logo_update -> logo_name = $logo_name;
        $logo_update -> width = $logo_width;
        $logo_update -> height = $logo_height;
        $logo_update -> update();
        return redirect() -> route('logo.index') -> with('success', 'Logo updated successfull');
    }

    /**
     *
     */
    public function socialIndex(){
        $settings = Settings::find(1);
        return view('admin.settings.social.index', compact('settings'));
    }
    public function socialUpdate(Request $request){
        //Make Array for Json Data
        $social_data = [
            'fb' => $request -> fb,
            'tw' => $request -> tw,
            'link' => $request -> fb,
            'inst' => $request -> inst,
            'drib' => $request -> drib,
            'yout' => $request -> yout,
        ];
        //Array to Json
        $social_json = json_encode($social_data);

        //Data sent to Database
        $settings = Settings::find(1);
        $settings -> social = $social_json;
        $settings -> update();
        return redirect() -> route('social.index') -> with('success', 'Social link updated successfull');
    }
}
