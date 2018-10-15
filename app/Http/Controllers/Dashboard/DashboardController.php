<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:super_admin');
    }

    public function showDashboard()
    {
        $userCount = count(User::all());
        $categoryCount = count(Category::all());
        $productCount = count(Item::all());

        $stats = [
            'user_count' => $userCount,
            'category_count' => $categoryCount,
            'product_count' => $productCount,
        ];

        return view('dashboard.dash')->with('stats', $stats);

    }

}
