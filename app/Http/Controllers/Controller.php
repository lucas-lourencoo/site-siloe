<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage()
    {
        return view('index');
    }

    public function register(Request $request)
    {
        if (User::all()->count() <= 150) {
            if (User::where('name', request('nome'))->count() == 0) {

                $data = [
                    'name' => request('nome'),
                    'data_nasc' => request('nascimento'),
                    'telephone' => request('telefone'),
                    'congregation' => request('igreja')
                ];

                User::create($data);

                return response()->json(['result' => 0]);
            }else{
                return response()->json(['result' => 1]);
            }
        } else {
            return response()->json(["result" => 2]);
        }
    }
}
