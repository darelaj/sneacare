@extends('layouts.form')
@section('border-div1', 'hidden')
@section('border-div2', 'hidden')

@section('content')
    <div class="w-1/2 h-[70px] bg-purple-100 m-auto">
        <b>
            <p class="text-center text-3xl py-4 font-['Inter']">
                Pesananmu akan diverifikasi oleh admin
            </p>
        </b>
    </div>
    <div class="h-1/2"></div>
    <div class="m-auto justify-center text-center items-center w-1/3">
        <a href="{{ route('user-status') }}">
            <x-form-next-button class="">
                <b>
                    Lihat Status
                </b>
            </x-form-next-button>
        </a>
    </div>
@endsection
