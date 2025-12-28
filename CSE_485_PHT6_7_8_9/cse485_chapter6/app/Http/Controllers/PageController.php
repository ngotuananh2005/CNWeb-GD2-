<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function showHomepage()
    {
        $viewTitle = 'PHT Chương 7 - Blade';
        $pageTitle = 'Chào mừng đến với Blade';
        $pageDescription = 'Trang này được render bằng Blade Template';
        $tasks = [
            'Cài Laravel',
            'Routing & Controller',
            'Blade Layout',
            'Truyền dữ liệu'
        ];

        return view('homepage', [
            'title' => $viewTitle,
            'page_title' => $pageTitle,
            'page_description' => $pageDescription,
            'tasks' => $tasks
        ]);
    }
}
