@extends('layouts.form')
@section('border-div1', 'hidden')
@section('border-div2', 'hidden')

@section('content')
    <div class="w-1/2 h-[70px] bg-purple-100 m-auto">
        <b>
            <p class="text-center text-2xl py-4">
                @if ($metodePembayaran == 'Gopay' || $metodePembayaran == 'DANA')
                    No Tujuan : {{ $kodeBayar }}
                @else
                    Kode Pembayaran : {{ $kodeBayar }}
                @endif
            </p>
        </b>
    </div>
    <div class="flex flex-col w-1/2 m-auto">
        <div class="flex">
            <div class="text-left justify-start items-start ml-0 m-auto">
                <p class=" mt-10 font-['Inter'] text-xl">Tanggal Pemesanan : {{ $currentDate }}</p>
            </div>
            <div class="mt-10 font-['Inter'] text-right justify-end items-end text-xl mr-0 m-auto" id="countdown">
            </div>
        </div>
        <div class="flex flex-col">
            <p class="mt-10 font-['Inter'] text-xl">
                Metode Pembayaran : {{ $metodePembayaran }}
            </p>
            <p class="mt-6 text-xl font-['Inter']">
                Instruksi Pembayaran :

            </p>
        </div>
        <div class="mt-10">
            <form action="{{ route('kodeBayarPost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="transactionId" value="{{ $transactionId }}">

                <div>
                    <x-input-label for="buktiPembayaran" :value="__('Bukti Pembayaran')" class="mb-2 font-['Inter'] text-xl" />
                    <input type="file" name="buktiPembayaran" id="" required class="form-control">
                </div>
                <div class="text-right">
                    <x-form-next-button class="mt-3 text-stone-400">
                        <b>
                            <p class="text-stone-400">SUBMIT</p>
                        </b>
                    </x-form-next-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let countdownTime = 2 * 60 * 60; // 2 hours in seconds

        function updateCountdown() {
            const countdownElement = document.getElementById('countdown');

            // Calculate hours, minutes, and seconds
            const hours = Math.floor(countdownTime / 3600);
            const minutes = Math.floor((countdownTime % 3600) / 60);
            const seconds = countdownTime % 60;

            // Display the countdown in the format HH:MM:SS
            const formattedTime =
                `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            countdownElement.textContent = `Sisa Waktu : ${formattedTime}`;

            // Update the countdown time
            countdownTime--;

            // Set the remaining time in a cookie
            document.cookie = `countdownTime=${countdownTime}; path=/`;

            // Check if the countdown has reached zero
            if (countdownTime >= 0) {
                // Continue updating the countdown
                setTimeout(updateCountdown, 1000);
            } else {
                countdownElement.textContent = "Time's up!";
                // You can perform additional actions here when the countdown reaches zero
            }
        }

        // Check if a countdownTime cookie exists
        const countdownCookie = document.cookie.split(';').find(cookie => cookie.trim().startsWith('countdownTime='));
        if (countdownCookie) {
            countdownTime = parseInt(countdownCookie.split('=')[1]);
        }

        // Start the countdown
        updateCountdown();
    </script>
@endsection
