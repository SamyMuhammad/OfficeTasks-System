<?php

use App\Models\Setting;

if(!function_exists('storeFile')){
    /**
     * Store file in the uploads disk;
     */
    function storeFile($file, $path)
    {
        $name = time() .'_'. $file->getClientOriginalName();
        $file->storeAs($path, $name, 'uploads');
        return $name;
    }
}

if(!function_exists('success')){
    /**
     * Flash a success message with session;
     */
    function success($message)
    {
        return session()->flash('success', $message);
    }
}

if(!function_exists('warning')){
    /**
     * Flash a warning message with session;
     */
    function warning($message)
    {
        return session()->flash('warning', $message);
    }
}

if(!function_exists('error')){
    /**
     * Flash a error message with session;
     */
    function error($message)
    {
        return session()->flash('error', $message);
    }
}

if(!function_exists('setActiveClass')){
    /**
     * Set active class for sidebar list items.
     */
    function setActiveClass($route)
    {
        if (is_array($route)) {
            $routeName = $route[0];
            $routeArg = $route[1];

            return request()->url() === route($routeName, $routeArg) ? 'active open' : '';
        }
        return request()->routeIs($route) ? 'active open' : '';
    }
}

if(!function_exists('activeGuard')){
    /**
     * Get the current active guard.
     */
    function activeGuard(){
    
        foreach(array_keys(config('auth.guards')) as $guard){
        
            if(auth()->guard($guard)->check()) return $guard;
        }
        return null;
    }
}

if(!function_exists('getLogo')){
    /**
     * Get the Logo path from the uploads disk;
     */
    function getLogo()
    {
        $logo = Setting::where('slug', 'logo')->first()->value;
        return !empty($logo) ? 'uploads/logo/'.$logo : config('appGlobals.logo_path');
    }
}

if(!function_exists('routeIsAdmin')){
    /**
     * Determine if the current route is admin.*
     */
    function routeIsAdmin()
    {
        if (request()->routeIs('admin.*')) {
            return true;
        }
        return false;
    }
}

if(!function_exists('properRoute')){
    /**
     * Get the proper route whether for user or admin.
     */
    function properRoute(string $route, $arg = null)
    {
        if (request()->routeIs('admin.*')) {
            return route('admin.' . $route, $arg);
        }
        return route($route, $arg);
    }
}