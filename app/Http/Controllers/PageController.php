<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    protected function movies()
    {
        return [
            [
                'judul' => 'Inception',
                'tahun' => 2010,
                'genre' => 'Sci-Fi / Thriller',
                'sutradara' => 'Christopher Nolan',
                'status' => 'Sudah Ditonton',
                'poster' => './images/movies/inception.jpg'
            ],
            [
                'judul' => 'Interstellar',
                'tahun' => 2014,
                'genre' => 'Adventure / Drama',
                'sutradara' => 'Christopher Nolan',
                'status' => 'Sudah Ditonton',
                'poster' => './images/movies/interstellar.jpg'
            ],
            [
                'judul' => 'Parasite',
                'tahun' => 2019,
                'genre' => 'Thriller / Drama',
                'sutradara' => 'Bong Joon-ho',
                'status' => 'Sudah Ditonton',
                'poster' => './images/movies/parasite.jpg'
            ],
            [
                'judul' => 'Spider-Man: No Way Home',
                'tahun' => 2021,
                'genre' => 'Action / Adventure',
                'sutradara' => 'Jon Watts',
                'status' => 'Ingin Ditonton Ulang',
                'poster' => './images/movies/spiderman.jpg'
            ],
            [
                'judul' => 'The Godfather',
                'tahun' => 1972,
                'genre' => 'Crime / Drama',
                'sutradara' => 'Francis Ford Coppola',
                'status' => 'Belum Ditonton',
                'poster' => './images/movies/thegodfather.jpg'
            ]
        ];
    }

    public function dashboard(Request $request)
    {
        $username = $request->session()->get('username');
        return view('dashboard', ['username' => $username]);
    }

    public function login(Request $request)
    {
        if ($request->session()->has('username')) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($data['username'] === 'naura' && $data['password'] === 'naura123') {
            $request->session()->put('username', $data['username']);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah!'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        return redirect()->route('dashboard');
    }

    public function pengelolaan(Request $request)
    {
        if (!$request->session()->has('username')) {
            return redirect()->route('dashboard');
        }

        $movies = $this->movies();
        return view('pengelolaan', compact('movies'));
    }

    public function profile(Request $request)
    {
        if (!$request->session()->has('username')) {
            return redirect()->route('dashboard');
        }

        $username = $request->session()->get('username');

        $profile = [
            'username' => $username,
            'status' => 'Pecinta Film PlotTwist',
            'hobi' => 'Menonton film, menulis review, dan berdiskusi tentang film',
        ];

        return view('profile', compact('profile'));
    }
}