<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $person, $user;

    public function __construct(Person $person, User $user){
        $this->person = $person;
        $this->user = $user;
    }
    public function index(){
        return view('pages.login',[
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back();
    }

    public function register(){
        return view('pages.register',[
            'title' => 'Register',
        ]);
    }

    public function registerStore(Request $request){
        try {
            $request->validate([
                'fullname' => 'required',
                'email' => 'required',
                'username' => 'required',
                'password' => 'required',
                'alamat' => 'required',
                'tanggalLahir' => 'required',
                'jk'=>'required',
            ]);

            // save person
            $this->person->savePerson([
                'fullname' => $request->fullname,
                'tanggal_lahir'=> $request->tanggalLahir,
                'jenis_kelamin'=> $request->jk,
                'alamat'=> $request->alamat,
                'foto'=> $request->foto,
            ]);


            // get id person last
            $id_person = $this->person->getPersonLastId();

            // save users
            $this->user->saveUser([
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'id_person' => $id_person,
            ]);

            return redirect('/login');




        } catch (\Throwable $th) {
            dd('error');
            return back()->with('error', 'Terjadi kesalahan');
        }
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
