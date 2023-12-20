<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Doctrine\DBAL\Schema\Index;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = DB::table('transaction as t')
            ->select(
                't.id as id',
                't.tanggalBooking as tglBook',
                DB::raw('
            (CASE
            WHEN treatmentType="1" THEN "Repaint"
            WHEN treatmentType="2" THEN "Repair"
            WHEN treatmentType="3" THEN "Unyellowing"
            ) AS treatment
            '),
                't.metodePembayaran as metodePembayaran',
                't.jumlahPembayaran as jumlahPembayaran'
            )
            ->orderBy('t.id', 'desc')
            ->get();
        return view('order.status', compact('transactions'));
    }

    public function create()
    {
        return view('order.order_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'treatmentType' => 'required',
            'tanggalBooking' => 'required',
            'deliveryType' => 'required',
            'metodePembayaran' => 'required',
        ]);

        $transaction = new Transaction;
        $transaction->userId = auth()->user()->id;
        $transaction->treatmentType = $request->treatmentType;
        $transaction->tanggalBooking = $request->tanggalBooking;
        $transaction->metodePembayaran = $request->metodePembayaran;
        $transaction->jumlahPembayaran = $request->jumlahPembayaran;
        $transaction->save();

        $lastTransactionStored = $transaction->id;

        $detailTransaction = new DetailTransaction;
        $detailTransaction->transactionId = $lastTransactionStored;
        $detailTransaction->fullname = $request->fullname;
        $detailTransaction->email = $request->email;
        $detailTransaction->phoneNumber = $request->phoneNumber;
        $detailTransaction->address = $request->address;
        $detailTransaction->deliveryType = $request->deliveryType;
        $detailTransaction->save();
    }
}
