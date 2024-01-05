<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Booking</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <div class="min-h-screen bg-[#FAF8FF]">
        <div class="flex flex-col sm:justify-center items-center h-screen">
            <div class="w-[1280px] h-[720px] bg-white shadow">
                <div class="flex mt-11 mb-11 sm:justify-center">
                    <div class="@yield('border-div1') w-[420px] h-[50px] bg-purple-100">
                        <b>
                            <p class="@yield('personal-info-text') text-center py-3 text-l">PERSONAL INFO</p>
                        </b>
                    </div>
                    <div class="@yield('border-div2') w-[420px] h-[50px] bg-purple-100">
                        <b>
                            <p class="@yield('payment-text') text-center py-3 text-l">PAYMENT</p>
                        </b>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
