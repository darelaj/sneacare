@extends('layouts.form')
@section('border-div1', 'border-b-4 border-indigo-500')
@section('personal-info-text', 'text-[#6866E1]')
@section('border-div2', 'border-l border-gray-400')
@section('payment-text', 'text-[#ACA9BB]')
@section('content')
    <form action="{{ route('bookDataPost') }}" method="POST">
        @csrf

        <div class="flex justify-center">
            <input type="text" name="fullname" id="fullname" :value="old('fullname')"
                class="bg-transparent border-b-2 border-0 font-['Inter'] font-semibold border-[#908989] mr-24 mt-10 w-1/3"
                required placeholder="Nama Lengkap">
            <input type="email" name="email" id="email" :value="old('email')"
                class="bg-transparent border-b-2 border-0 font-['Inter'] font-semibold border-[#908989] ml-24 mt-10 w-1/3"
                required placeholder="Email">
        </div>
        <div class="flex justify-center">
            <input type="text" name="phoneNumber" id="phoneNumber" :value="old('phoneNumber')"
                class="bg-transparent border-b-2 border-0 font-['Inter'] font-semibold border-[#908989] mr-24 mt-10 w-1/3"
                required placeholder="No Telepon">
            <input type="text" name="address" id="address"
                class="bg-transparent border-b-2 border-0 font-['Inter'] font-semibold border-[#908989] ml-24 mt-10 w-1/3"
                required placeholder="Alamat">
        </div>
        <div class="flex justify-center">
            <select name="treatment" id="treatment"
                class="bg-transparent border-b-2 border-0 font-['Inter'] font-semibold border-[#908989] mr-24 mt-10 w-1/3">
                <option value="-1" disabled selected>Jenis Treatment</option>
                <option value="1">Repair</option>
                <option value="2">Repaint</option>
                <option value="3">Unyellowing</option>
            </select>

            <input type="date" placeholder="Tanggal Booking" name="bookDate" id="bookDate"
                class="bg-transparent border-b-2 border-0 font-['Inter'] font-semibold border-[#908989] ml-24 mt-10 w-1/3"
                required>
        </div>
        <div class="flex justify-center">
            <select name="deliver" id="deliver"
                class="bg-transparent border-b-2 border-0 font-['Inter'] font-semibold border-[#908989] mr-24 mt-10 w-1/3">
                <option value="-1" disabled selected>Dikirim / Ke Toko</option>
                <option value="1">Dikirim</option>
                <option value="2">Ke Toko</option>
            </select>
            <input type="text" name="jumlahSepatu" id="jumlahSepatu"
                class="bg-transparent border-b-2 border-0 font-['Inter'] font-semibold border-[#908989] ml-24 mt-10 w-1/3"
                required placeholder="Jumlah Sepatu">
        </div>
        <div class="text-right">
            <x-form-next-button class="mt-14 mr-28 text-stone-400">
                {{-- {{ __('NEXT') }} --}}
                <b>
                    <p class="text-stone-400">NEXT</p>
                </b>

            </x-form-next-button>
        </div>
    </form>

    {{-- <script>
        // Attach an event listener to all input fields with a class of 'auto-save'
        $(document).ready(function() {
            $('.auto-save').on('input', function() {
                // Automatically submit the form using AJAX when any input changes
                $('#formData').submit();
            });
        });
    </script> --}}
@endsection
