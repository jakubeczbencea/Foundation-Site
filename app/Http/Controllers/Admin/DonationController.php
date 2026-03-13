<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::query();

        // Szűrés státusz alapján
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Szűrés fizetési mód alapján
        if ($request->filled('payment_method')) {
            $query->where('payment_method', $request->payment_method);
        }

        // Szűrés hónap alapján
        if ($request->filled('month')) {
            $date = \Carbon\Carbon::parse($request->month);
            $query->whereMonth('created_at', $date->month)
                  ->whereYear('created_at', $date->year);
        }

        // Keresés név/email alapján
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('donor_name', 'like', "%{$search}%")
                  ->orWhere('donor_email', 'like', "%{$search}%");
            });
        }

        $donations = $query->latest()->paginate(20);

        // Összesítés a szűrt eredményekre
        $summary = [
            'total' => (clone $query)->sum('amount'),
            'count' => (clone $query)->count(),
        ];

        return view('admin.donations.index', compact('donations', 'summary'));
    }

    public function show(Donation $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    public function updateStatus(Request $request, Donation $donation)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,failed,refunded',
        ]);

        $donation->update(['status' => $request->status]);

        return back()->with('success', 'Adomány státusza frissítve.');
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('admin.donations.index')->with('success', 'Adomány törölve.');
    }
}
