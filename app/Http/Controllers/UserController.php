<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function delete(Request $request, $id){
        User::destroy($id);
        return Redirect::route('dashboard');
    }

    public function index(Request $request){

        $perPage = $request->get('perPage') ?? 5;
        $orderBy = $request->get('orderBy') ?? 'asc';
        $search = $request->get('search') ?? null;

        $users = User::whereRaw('name ~* ? OR email ~* ?', [$search ?? '.*', $search ?? '.*'])
            ->orderBy('name', $orderBy)
            ->paginate($perPage)
            ->appends(request()->input());
        
        return Inertia::render('Dashboard', [
            'users' => $users,
            'perPage' => strval($perPage),
            'orderBy' => $orderBy,
            'search' => $search
        ]);
    }
}