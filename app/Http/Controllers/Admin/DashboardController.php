<?php

namespace App\Http\Controllers\Admin;

use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $checkouts = Checkout::with('Camp')->get();
        return view('admin.dashboard', [
            'checkouts' => $checkouts
        ]);
    }
}
