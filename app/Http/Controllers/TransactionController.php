<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;
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
        $data = $request->validate(
            [
                'fullname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string'],
                'phoneNumber' => ['required', 'string'],
                'address' => ['required', 'string'],
                'treatment' => ['required', 'integer'],
                'bookDate' => ['required', 'date', 'after:today'],
                'deliver' => ['required', 'integer'],
                'jumlahSepatu' => ['required', 'integer']
            ],
            [
                'bookDate.after' => "Tanggal booking tidak boleh sebelum hari ini"
            ]
        );

        return redirect()->route('bookPayment')->with('data', $data);

        // return redirect()->route('bookPayment', compact('data'));
    }

    public function payment()
    {
        if (!empty(session('data'))) {
            return view('form.payment');
        } else {
            return redirect()->route('bookData');
        }
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
            $transaction->jumlahPembayaran = 20000 * $request->jumlahSepatu;
        } elseif ($treatment === 2) {
            $transaction->jumlahPembayaran = 30000 * $request->jumlahSepatu;
        } elseif ($treatment === 3) {
            $transaction->jumlahPembayaran = 35000 * $request->jumlahSepatu;
        }

        $transaction->status = 1;
        if ($request->paymentMethod === 1) {
            $transaction->status = 2;
        } else {
            $transaction->status = 1;
        }
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

        session([
            'metodePembayaran' => $request->paymentMethod,
            'phoneNumber' => $request->phoneNumber,
            'jumlahPembayaran' => $transaction->jumlahPembayaran
        ]);

        $transactionId = $transaction->id;

        return redirect()->route('kodeBayar', ['transactionId' => $transactionId]);
    }

    public function showCode(Request $request, $transactionId)
    {

        $stat = DB::table('transactions')
            ->select([
                'status',
                'jumlahPembayaran',
                'metodePembayaran'
            ])
            ->where('id', '=', $transactionId)
            ->first();

        $phone = DB::table('detail_transactions')
            ->select([
                'phoneNumber'
            ])
            ->where('transactionId', '=', $transactionId)
            ->first();

        // $status = (int) $stat->status;
        if ($stat->status == 2) {
            return view('form.confirm');
        } elseif ($stat->status > 2) {
            return view('treatment.status');
        }

        $jumlahPembayaran = $stat->jumlahPembayaran;
        $metodePembayaran1 = $stat->metodePembayaran;
        $phoneNumber = $phone->phoneNumber;
        $currentDate = Carbon::now()->toDateString();
        $kodeBayar = '';
        $metodePembayaran = '';

        if ($metodePembayaran1 == 1) {
            return view('form.confirm');
        } elseif ($metodePembayaran1 == 2) {
            $kodeBayar = '808' . $phoneNumber;
        } elseif ($metodePembayaran1 == 3) {
            $kodeBayar = '999' . $phoneNumber;
        } elseif ($metodePembayaran1 == 4) {
            $kodeBayar = '081786547725';
        } elseif ($metodePembayaran1 == 5) {
            $kodeBayar = '081786547725';
        }

        if ($metodePembayaran1 == 2) {
            $metodePembayaran = "Virtual Account";
        } elseif ($metodePembayaran1 == 3) {
            $metodePembayaran = "Transfer Bank";
        } elseif ($metodePembayaran1 == 4) {
            $metodePembayaran = 'DANA';
        } elseif ($metodePembayaran1 == 5) {
            $metodePembayaran = 'Gopay';
        }

        $remainingTime = $this->calculateRemainingTime($transactionId);

        // return response()->json(['formattedTime' => $remainingTime]);

        // return view('form.kode-bayar', compact('transactionId', 'jumlahPembayaran', 'metodePembayaran', 'currentDate', 'kodeBayar'));

        return view('form.kode-bayar', [
            'transactionId' => $transactionId,
            'jumlahPembayaran' => $jumlahPembayaran,
            'metodePembayaran' => $metodePembayaran,
            'currentDate' => $currentDate,
            'kodeBayar' => $kodeBayar,
            'formattedTime' => $remainingTime,
        ]);
    }

    public function confirm()
    {
        return view('form.confirm');
    }

    private function calculateRemainingTime($transactionId)
    {
        // For demonstration purposes, return a dummy value
        $remainingSeconds = 120; // 2 minutes

        // You may replace this with your own logic to calculate remaining time

        return gmdate("i:s", $remainingSeconds); // Format: MM:SS
    }

}
