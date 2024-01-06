<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class TreatmentController extends Controller
{
    public function status(Request $request)
    {
        if ($request->ajax()) {

            $transactions = DB::table('transactions')
                ->select(
                    'id',
                    'tanggalBooking',
                    'treatmentType',
                    'jumlah_sepatu',
                    'metodePembayaran',
                    'jumlahPembayaran',
                    'status'
                )
                ->where('userId', '=', auth()->user()->id)
                ->get();
            $data = $transactions;
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('treatment.status');
    }

    public function repaint(){

        return view('treatment.repaint');

     }

     public function repair(){

        return view('treatment.repair');

     }

     public function unyellowing(){

        return view('treatment.unyellowing');

     }

}
