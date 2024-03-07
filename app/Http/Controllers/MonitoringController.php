<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Antrian;

class MonitoringController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request)
    {
        return view('monitoring');
    }

    public function getAntrianByLoket(Request $request)
    {
        $jenis = $request->jenis;
        $loket = $request->loket;

        $nomor   = "___";
        $status  = "___";
        $updated_at = "___";
        $antrian = Antrian::where('jenis', $jenis)->where('status', 1)->where('loket', $loket)
            ->orderBy('urut', 'asc')->first();

        if (!$antrian) {
            $antrian = Antrian::where('jenis', $jenis)->where('status', 2)->where('loket', $loket)
                ->orderBy('urut', 'asc')->first();
        }

        if ($antrian) {
            $nomor  = $antrian->nomor;
            $status = $antrian->status;
            $updated_at = $antrian->updated_at;
        }

        $sisaAntrian = Antrian::where('jenis', $jenis)->where('status', null)->count();

        return response()->json([
            'nomor' => $nomor,
            'status' => $status,
            'sisaAntrian' => $sisaAntrian,
            'updated_at' => $updated_at,
        ]);
    }
}
