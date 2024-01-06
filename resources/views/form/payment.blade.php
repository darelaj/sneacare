@extends('layouts.form')
@section('border-div1', 'border-r border-gray-400')
@section('personal-info-text', 'text-[#ACA9BB]')
@section('border-div2', 'border-b-4 border-indigo-500')
@section('payment-text', 'text-[#6866E1]')
@section('content')
    <form action="{{ route('bookPaymentPost') }}" method="POST">
        @csrf

        <input type="hidden" name="fullname" value="{{ session('data.fullname') }}">
        <input type="hidden" name="email" value="{{ session('data.email') }}">
        <input type="hidden" name="phoneNumber" value="{{ session('data.phoneNumber') }}">
        <input type="hidden" name="address" value="{{ session('data.address') }}">
        <input type="hidden" name="treatment" value="{{ session('data.treatment') }}">
        <input type="hidden" name="bookDate" value="{{ session('data.bookDate') }}">
        <input type="hidden" name="deliver" value="{{ session('data.deliver') }}">
        <input type="hidden" name="jumlahSepatu" value="{{ session('data.jumlahSepatu') }}">

        <div>
            <input type="radio" name="paymentMethod" id="" class="my-4 ml-20 mr-6 font-['Inter'] font-semibold"
                value="1">
            <span class="text-[#908989] text-xl"><b>COD (Cash On Delivery)</b></span>
        </div>
        <div class="w-[1200px] h-[0px] border border-black m-auto my-3"></div>
        <div>
            <input type="radio" name="paymentMethod" id="" class="my-4 ml-20 mr-6 font-['Inter'] font-semibold"
                value="2">
            <span class="text-[#908989] text-xl"><b>Virtual Account</b></span>
        </div>
        <div>
            <input type="radio" name="paymentMethod" id="" class="my-4 ml-20 mr-6 font-['Inter'] font-semibold"
                value="3">
            <span class="text-[#908989] text-xl"><b>Transfer Bank</b></span>
        </div>
        <div>
            <input type="radio" name="paymentMethod" id="" class="my-4 ml-20 mr-6 font-['Inter'] font-semibold"
                value="4">
            <span class="text-[#908989] text-xl"><b>Dana</b></span>
        </div>
        <div>
            <input type="radio" name="paymentMethod" id="" class="my-4 ml-20 mr-6 font-['Inter'] font-semibold"
                value="5">
            <span class="text-[#908989] text-xl"><b>Gopay</b></span>
        </div>
        <div class="w-[1200px] h-[0px] border border-black m-auto my-3"></div>
        <div class="text-right">
            <x-form-next-button class="mt-14 mr-28 text-stone-400">
                {{-- {{ __('NEXT') }} --}}
                <b>
                    <p class="text-stone-400">NEXT</p>
                </b>
            </x-form-next-button>
        </div>
    </form>
@endsection
