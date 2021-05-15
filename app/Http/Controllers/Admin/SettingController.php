<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view settings')->only('index');
        $this->middleware('can:edit settings')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.index', [
            'items' => Setting::all()
        ]);
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        if ($setting) {
            return response()->json(['status' => true, 'body' => $setting]);
        }
        return response()->json(['status' => false, 'body' => '']);
    }

    public function update(Request $request, Setting $setting)
    {
        $this->validator($request, $setting->slug);
        $value = $request->value;
        
        if ($setting->slug === 'logo') {
            $setting->storeNewLogo($value);
        }else{
            $setting->update(['value' => $value]);
        }
        success(__('flashes.update'));
        return redirect()->route('admin.settings.index');
    }

    private function validator($request, $slug)
    {
        if ($slug === 'logo') {
            $request->validate([
                'value' => 'required|image'
            ]);
        }else{
            $request->validate([
                'value' => 'required|string|max:191'
            ]);
        }  
    }
}