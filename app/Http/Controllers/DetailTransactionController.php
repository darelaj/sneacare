<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDetailTransactionRequest;
use App\Http\Requests\UpdateDetailTransactionRequest;

class DetailTransactionController extends Controller
{

    public function update(Request $request)
    {
        if ($request->hasFile('buktiPembayaran')) {
            // $fileName = $this->generateRandomString();
            // $extension = $request->file('buktiPembayaran')->extension();

            // Storage::putFileAs('bukti-bayar', $request->file('buktiPembayaran'), $fileName . '.' . $extension);

            DB::table('detail_transactions')
                ->where('transactionId', '=', $request->transactionId)
                ->update([
                    'bukti_pembayaran' => $request->file("buktiPembayaran")->store("public/BuktiPembayaran/" . auth()->user()->username),
                ]);

            DB::table('transactions')
                ->where('id', '=', $request->transactionId)
                ->update([
                    'status' => 2
                ]);

            return redirect()->route('confirmation');
        }
    }

    function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
