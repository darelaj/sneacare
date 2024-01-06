<x-app-layout>

    <!-- about us -->
    <section class="flex items-center  bg-stone-100  font-poppins  ">
        <div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-2">
            <div class="flex flex-wrap mt-[50px] ">
                <div class="w-full px-4 mb-2 mt-10 lg:w-1/2 lg:mb-0">

                    <div class="w-[500px] h-[750px] px-10 mr-32 mb-10 lg:mb-0">
                        <div class="relative">
                            <img src="https://cdn.discordapp.com/attachments/698554518278897664/1192905353080344596/unyellowing.jpg"
                                alt="aboutimage" class="relative z-10 object-cover w-full h-full rounded">

                            <div class="absolute hidden w-full h-full bg-blue-400 rounded -bottom-6 left-6 lg:block">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-1/2 px-4 mb-10 mt-10 lg:w-1/2 lg:mb-0 ">
                    <div class="relative">

                        <h1 class="pl-2 text-[32px] font-bold  dark:text-black">
                            Unyellowing
                        </h1>
                    </div>
                    <p class="mt-6 mb-10 text-base leading- text-gray-500 dark:text-gray-400">
                        Repaint sepatu adalah pengecatan ulang untuk memberikan tampilan baru pada sepatu.
                        Langkah-langkahnya
                        melibatkan persiapan, pemilihan cat, masking, pengecatan, dan penyelesaian.
                        Ini adalah cara ekonomis untuk memperbarui sepatu yang mengalami kerusakan warna layak nya
                        sepatu baru.
                    </p>

                    <img src="https://cdn.discordapp.com/attachments/698554518278897664/1192893937359278290/Frame_58.png"
                        alt="">

                    <h1 class="mt-10 text-xl">2-3 Hari</h1>

                    <h1 class="mt-10 text-x">Harga : Rp20,000,00- per Sepatu</h1>

                    <a href="{{ route('bookData') }}">
                        <button class="w-[200px] h-[40px] bg-[#1e4697] text-white mt-10">
                            Pesan Sekarang
                        </button>
                    </a>

                </div>

            </div>

        </div>
    </section>

</x-app-layout>