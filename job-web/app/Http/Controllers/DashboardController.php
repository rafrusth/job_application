<?php

namespace App\Http\Controllers;

use App\Models\DataStatistic;
use App\Models\Statistic;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch companies with cities
        $companies = Company::with('cities')->limit(5)->get();
        // Fetch all statistics periods
        $statsPeriods = Statistic::orderBy('id', 'asc')->get();

        // Fetch aggregated data per period
        $dataPoints = DataStatistic::selectRaw('statistic_id, sum(applicant) as total_applicant, sum(employment) as total_employment, sum(reject) as total_reject')
            ->groupBy('statistic_id')
            ->orderBy('statistic_id', 'asc')
            ->get();

        // Latest period data for summary cards
        $latest = $dataPoints->last();
        
        $summary = [
            'applicants' => $latest ? $latest->total_applicant : 0,
            'accepted'   => $latest ? $latest->total_employment : 0,
            'rejected'   => $latest ? $latest->total_reject : 0,
            'rate'       => ($latest && $latest->total_applicant > 0) 
                            ? round(($latest->total_employment / $latest->total_applicant) * 100, 2) 
                            : 0,
        ];

        // Prepare chart data (Appliers trend) - Optimized to avoid N+1
        $stats = Statistic::whereIn('id', $dataPoints->pluck('statistic_id'))->get()->keyBy('id');
        
        $chartData = $dataPoints->map(function($item) use ($stats) {
            $stat = $stats->get($item->statistic_id);
            return [
                'label' => $stat ? $stat->name : 'Unknown',
                'value' => $item->total_applicant,
            ];
        });

        if (!auth()->check()) {
            return view('custom-welcome');
        }

        return view('homepage', compact('summary', 'chartData', 'companies'));
    }
}
