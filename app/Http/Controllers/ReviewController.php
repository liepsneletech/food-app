<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        return view('pages.back.reviews.reviews');
    }

    function create()
    {
        return view('pages.back.reviews.reviews-create');
    }

    function store()
    {
        return view('pages.back.reviews-create');
    }

    function edit()
    {
        return view('pages.back.reviews.reviews-edit');
    }

    function update()
    {
        return view('pages.back.reviews.reviews-edit');
    }

    function delete()
    {
        return view('pages.back.reviews.reviews');
    }
}
