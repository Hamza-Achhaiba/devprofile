<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class PublicProfileController extends Controller {
    public function show($username) {
        $user = User::where('username', $username)->firstOrFail();
        return view('profile.public', compact('user'));
    }
}
