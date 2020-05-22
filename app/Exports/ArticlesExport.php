<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


use App\Article;

// Only Data
// class UsersExport implements FromCollection
// {
//     public function collection()
//     {
//         return User::all();
//     }
// }
// With View
class ArticlesExport implements FromView
{
    public function view(): View
    {
        return view('Articles.excel', [
            'Articles' => Article::all()
        ]);
    }
}
