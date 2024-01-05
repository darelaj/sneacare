<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function data()
    {
        return view('form.data');
    }

    public function dataPost(Request $request)
    {
        $data = $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string'],
            'phoneNumber' => ['required', 'string'],
            'address' => ['required', 'string'],
            'treatment' => ['required', 'integer'],
            'bookDate' => ['required', 'date', 'after:today'],
            'deliver' => ['required', 'integer'],
            'jumlahSepatu' => ['required', 'integer']
        ]);

        return redirect()->route('bookPayment')->with('data', $data);

        // return redirect()->route('bookPayment', compact('data'));
    }

    public function payment()
    {
        return view('form.payment');
    }

    public function paymentPost(Request $request)
    {
        $request->validate([
            'paymentMethod' => ['required', 'integer']
        ]);

        $transaction = new Transaction;
        $transaction->userId = auth()->user()->id;
        $transaction->treatmentType = $request->treatment;
        $transaction->tanggalBooking = $request->bookDate;
        $transaction->metodePembayaran = $request->paymentMethod;
        $transaction->jumlah_sepatu = $request->jumlahSepatu;
        $transaction->jumlahPembayaran = 0;

        $treatment = (int) $request->treatment;

        if ($treatment === 1) {
            $transaction->jumlahPembayaran = 100000 * $request->jumlahSepatu;
        } elseif ($treatment === 2) {
            $transaction->jumlahPembayaran = 60000 * $request->jumlahSepatu;
        } elseif ($treatment === 3) {
            $transaction->jumlahPembayaran = 120000 * $request->jumlahSepatu;
        }

        $transaction->status = 1;
        $transaction->save();

        $lastTransactionStored = $transaction->id;

        $detailTransaction = new DetailTransaction;
        $detailTransaction->transactionId = $lastTransactionStored;
        $detailTransaction->fullname = $request->fullname;
        $detailTransaction->email = $request->email;
        $detailTransaction->phoneNumber = $request->phoneNumber;
        $detailTransaction->address = $request->address;
        $detailTransaction->deliveryType = $request->deliver;
        $detailTransaction->save();

        return redirect(RouteServiceProvider::HOME);
    }

    public function showCode()
    {
        return view('form.kode-bayar');
    }

}
