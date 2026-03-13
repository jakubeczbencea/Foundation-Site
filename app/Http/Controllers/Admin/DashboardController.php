<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_donations' => Donation::completed()->sum('amount'),
            'donations_count' => Donation::completed()->count(),
            'this_month' => Donation::completed()->thisMonth()->sum('amount'),
            'pending_count' => Donation::where('status', 'pending')->count(),
            'news_count' => News::count(),
            'published_news' => News::published()->count(),
            'users_count' => User::count(),
        ];

        $recent_donations = Donation::latest()->take(5)->get();
        $recent_news = News::latest()->take(5)->get();

        // Havi összesítés az elmúlt 6 hónapra (chart-hoz)
        $monthly = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthly[] = [
                'month' => $date->translatedFormat('M'),
                'total' => Donation::completed()
                    ->whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->sum('amount'),
            ];
        }

        return view('admin.dashboard', compact('stats', 'recent_donations', 'recent_news', 'monthly'));
    }
}
