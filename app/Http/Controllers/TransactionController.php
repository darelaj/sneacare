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
            'phoneNumber' => $request->phoneNumber
        ]);

        $transactionId = $transaction->id;

        return redirect()->route('kodeBayar', ['transactionId' => $transactionId]);
    }

    public function showCode(Request $request, $transactionId)
    {

        $stat = DB::table('transactions')
            // ->select('status')
            ->where('id', '=', $transactionId)
            ->value('status');

        $status = (int) $stat;
        if ($status == 2) {
            return view('form.confirm');
        } elseif ($status > 2) {
            return view('treatment.status');
        }

        $metodePembayaran = session('metodePembayaran');
        $phoneNumber = session('phoneNumber');
        $currentDate = Carbon::now()->toDateString();
        $kodeBayar = '';
        $metodePembayaran1 = '';

        if ($metodePembayaran == 1) {
            return view('form.confirm');
        } elseif ($metodePembayaran == 2) {
            $kodeBayar = '808' . $phoneNumber;
        } elseif ($metodePembayaran == 3) {
            $kodeBayar = '999' . $phoneNumber;
        } elseif ($metodePembayaran == 4) {
            $kodeBayar = '081786547725';
        } elseif ($metodePembayaran == 5) {
            $kodeBayar = '081786547725';
        }

        if ($metodePembayaran == 2) {
            $metodePembayaran = "Virtual Account";
        } elseif ($metodePembayaran == 3) {
            $metodePembayaran = "Transfer Bank";
        } elseif ($metodePembayaran == 4) {
            $metodePembayaran = 'DANA';
        } elseif ($metodePembayaran == 5) {
            $metodePembayaran = 'Gopay';
        }

        return view('form.kode-bayar', compact('transactionId', 'metodePembayaran', 'currentDate', 'kodeBayar'));
    }

    public function insertCode(Request $request)
    {
        // if ($request->file('buktiBayar')) {
        //     $file = $request->file('buktiBayar');
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('public/Image'), $filename);
        //     $data['bukti_pembayaran'] = $filename;
        // }

        $file = $request->file('buktiPembayaran');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('public/Image'), $filename);

        $data = [
            'bukti_pembayaran' => $filename,
        ];

        $data = DB::table('detail_transactions')
            ->where('transactionId', '=', $request->transactionId)
            ->update($data);

        return redirect()->route('confirmation');
    }

}
