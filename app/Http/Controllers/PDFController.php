<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    public function PDF()
    {
        $posts = Post::all();
        $pdf = PDF::loadView('prueba',compact('posts'));
        return $pdf->stream('prueba.pdf');
    }
}
