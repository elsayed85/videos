<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class ChangeDomainController extends Controller
{
    public function changedomain(Request $request)
    {

        
        $request->validate([
            'domain' => 'required',
        ]);

        $code = file_exists(storage_path() . '/app/keys/license.json') && file_get_contents(storage_path() . '/app/keys/license.json') != null ? file_get_contents(storage_path() . '/app/keys/license.json') : '';

        $code = json_decode($code);

        if ($code->code == '') {
            return back()->withInput()->withErrors(['domain' => __('Purchase code not found please contact support !')]);
        }

        $d = $request->domain;
        $domain = str_replace("www.", "", $d);
        $domain = str_replace("http://", "", $domain);
        $domain = str_replace("https://", "", $domain);

        $alldata = ['app_id' => "21435489", 'ip' => $request->ip(), 'domain' => $domain, 'code' => $code->code];


        return "done";

    }
}
