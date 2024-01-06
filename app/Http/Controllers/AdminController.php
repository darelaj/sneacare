<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;


class AdminController extends Controller
{
    public function index(Request $request)
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
                ->get();

            $data = $transactions;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('detailData', $row->id) . '" class="w-12 h-4 px-5 py-3.5 bg-neutral-600 rounded-lg justify-center items-center">Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.homepage');
    }

    public function show(Request $request)
    {
        $detailTransactions = DB::table('detail_transactions as dt')
            ->select([
                'dt.transactionId as id',
                'dt.fullname as fullname',
                'dt.email as email',
                'phoneNumber',
                'address',
                'bukti_pembayaran',
                't.status as status',
                'u.username as username'
            ])
            ->join('transactions as t', 'dt.transactionId', '=', 't.id')
            ->join('users as u', 't.userId', '=', 'u.id')
            ->where('dt.id', '=', $request->id)
            ->get();

        return view('admin.edit', compact('detailTransactions'));

    }

    public function update(Request $request)
    {
        DB::table('transactions')
            ->where('id', '=', $request->id)
            ->update([
                'status' => $request->status
            ]);

        return redirect()->route('admin');
    }
}
