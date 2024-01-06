<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Update</title>
</head>

<body>
    <div class="min-h-screen bg-[#F5F5F5]">
        <div class="flex flex-col sm:justify-center items-center h-screen">
            <div class="w-[1280px] h-[720px] bg-white shadow">
                <form action="{{ route('detailUpdate') }}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach ($detailTransactions as $detailTransaction)
                        <input type="hidden" name="id" value="{{ $detailTransaction->id }}">

                        <div class="flex justify-center">
                            <input type="text" name="" id=""
                                value="{{ $detailTransaction->fullname }}"
                                class="bg-transparent border-b-2 border-0 font-['Inter'] border-[#908989] mr-24 mt-10 w-1/3"
                                readonly>
                            <input type="text" name="" id="" value="{{ $detailTransaction->email }}"
                                class="bg-transparent border-b-2 border-0 font-['Inter'] border-[#908989] ml-24 mt-10 w-1/3"
                                readonly>
                        </div>
                        <div class="flex justify-center">
                            <input type="text" name="" id=""
                                value="{{ $detailTransaction->phoneNumber }} "
                                class="bg-transparent border-b-2 border-0 font-['Inter'] border-[#908989] mr-24 mt-10 w-1/3"
                                readonly>
                            <input type="text" name="" id=""
                                value="{{ $detailTransaction->address }}"
                                class="bg-transparent border-b-2 border-0 font-['Inter'] border-[#908989] ml-24 mt-10 w-1/3"
                                readonly>
                        </div>
                        <div>
                            <p class="font-['Inter'] mt-5 ml-28">Bukti Pembayaran : </p>
                            <img src="{{ asset('storage/BuktiPembayaran/' . $detailTransaction->username . '/' . $detailTransaction->bukti_pembayaran) }}"
                                alt="" class="ml-20 max-w-80 max-h-80">
                        </div>
                        <div class="flex justify-center">
                            <select name="status" id=""
                                class="bg-transparent border-b-2 border-0 font-['Inter'] border-[#908989] mr-56 mt-4 w-1/3">
                                <option value="1" @if ($detailTransaction->status == 1) selected @endif>Menunggu
                                    Pembayaran
                                </option>
                                <option value="2" @if ($detailTransaction->status == 2) selected @endif>Menunggu
                                    Konfirmasi
                                </option>
                                <option value="3" @if ($detailTransaction->status == 3) selected @endif>Sedang Diproses
                                </option>
                                <option value="4" @if ($detailTransaction->status == 4) selected @endif>Selesai
                                </option>
                                <option value="5" @if ($detailTransaction->status == 5) selected @endif>Sudah Diambil
                                </option>
                            </select>
                            <x-form-next-button class="mt-4 ml-40 text-stone-400">
                                <b>
                                    <p class="text-stone-400">SUBMIT</p>
                                </b>
                            </x-form-next-button>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>

</body>

</html>
