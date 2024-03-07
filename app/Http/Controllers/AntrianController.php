<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Antrian;

class AntrianController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request)
    {
        $jenis = $request->jenis;
        $cekAntrian = Antrian::where('jenis', $jenis)->orderBy('urut', 'desc')->first();

        $urut = 1;
        if ($cekAntrian) {
            $urut =  $cekAntrian->urut + 1;
            $data = [
                'nomor' => ($jenis == 1 ? 'A' : 'B'). str_pad($urut, 3, "0", STR_PAD_LEFT),
                'jenis' => $jenis,
                'urut'  => $urut,
            ];
        }
        else {
            $data = [
                'nomor' => ($jenis == 1 ? 'A' : 'B'). str_pad(1, 3, "0", STR_PAD_LEFT),
                'jenis' => $jenis,
                'urut'  => $urut,
            ];
        }

        $sisaAntrian = Antrian::where('jenis', $jenis)->where('status', null)->count();
        $antrian = Antrian::create($data);

        return view('antrian', [
            'id' => $antrian->id,
            'jenis' => $jenis,
            'nomor' => $antrian->nomor,
            'sisaAntrian' => $sisaAntrian
        ]);
    }

    public function getAntrianByLoket(Request $request)
    {
        $jenis = $request->jenis;
        $loket = $request->loket;

        $nomor   = "___";
        $status  = "___";
        $antrian = Antrian::where('jenis', $jenis)->where('status', 1)->where('loket', $loket)
            ->orderBy('urut', 'asc')->first();

        if (!$antrian) {
            $antrian = Antrian::where('jenis', $jenis)->where('status', null)
                ->orderBy('urut', 'asc')->first();

            // if ($antrian) {
            //     $antrian->status = 1;
            //     $antrian->loket  = $loket;
            //     $antrian->update();
            // }
        }

        if ($antrian) {
            $nomor  = $antrian->nomor;
            $status = $antrian->status;
        }

        $sisaAntrian = Antrian::where('jenis', $jenis)->where('status', null)->count();

        return response()->json([
            'nomor' => $nomor,
            'status' => $status,
            'sisaAntrian' => $sisaAntrian
        ]);
    }

    public function setAntrianByLoket(Request $request)
    {
        $jenis = $request->jenis;
        $loket = $request->loket;

        $nomor   = "___";
        $status  = "___";
        $antrian = Antrian::where('jenis', $jenis)->where('status', 1)->where('loket', $loket)
            ->orderBy('urut', 'asc')->first();

        if (!$antrian) {
            $antrian = Antrian::where('jenis', $jenis)->where('status', null)
                ->orderBy('urut', 'asc')->first();
        }

        if ($antrian) {
            $antrian->status = 1;
            $antrian->loket  = $loket;
            $antrian->updated_at = now();
            $antrian->update();
        }

        return response()->json([
            'nomor' => $antrian->nomor,
            'loket' => $loket,
        ]);
    }

    public function nextAntrianByLoket(Request $request)
    {
        $jenis = $request->jenis;
        $loket = $request->loket;

        $nomor   = "___";
        $status  = "___";
        $antrian = Antrian::where('jenis', $jenis)->where('status', 1)->where('loket', $loket)
            ->orderBy('urut', 'asc')->first();

        if ($antrian) {
            $antrian->status = 2;
            $antrian->update();
        }
    }

    public function cetak(Request $request)
    {
        $antrian = Antrian::find($request->id);
        $sisaAntrian = Antrian::where('jenis', $antrian->jenis)->where('status', null)->count();

        return view('cetak', [
            'antrian' => $antrian,
            'sisaAntrian' => $sisaAntrian
        ]);
    }
}
