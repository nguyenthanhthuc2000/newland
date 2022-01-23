<?php

namespace App\Http\Controllers;

use App\Repository\Article\ArticleRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function searchByPrice(Request $request)
    {
        $from = convert_words_to_numbers($request->tu);
        $to = convert_words_to_numbers($request->den);

    }
}
