<?php

namespace App\Http\Controllers;

use App\Models\Preorder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $preorders = Preorder::with([
            'items.product.media'
        ])
            ->where('status', 'open')
            ->where('started_at', '<=', now())
            ->where('closed_at', '>=', now())
            ->orderBy('started_at', 'desc')
            ->get();

        return view('home_page', compact('preorders'));
    }
}
