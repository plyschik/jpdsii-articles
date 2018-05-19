<?php

namespace App\Http\Controllers;

use App\User;

class AuthorsController extends Controller
{
    public function listOfArticlesOfAuthor(User $user)
    {
        return view('site.authors.list', [
            'author_full_name'  => $user->fullName,
            'articles'          => $user->articles()->with(['user', 'category'])->latest('id')->paginate(10)
        ]);
    }
}
