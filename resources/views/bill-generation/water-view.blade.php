@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] md:px-[20px] px-[10px] py-[2rem]">
        <div class="lg:flex lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
            <div class="top flex justify-between items-center w-full">
                <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Water Tax Bill Generation</h2>
                <div class="ml-auto">
                    <a href="{{ route('export-exportWaterViewBill', ['id' => $data->id]) }}">
                        <button
                            class="bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300">
                            Import Excel
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="border border-[#B1B6C6] rounded-[20px] mt-10 ">
            <div class=" border-b border-[#B1B6C6] pb-[100px]">
                <div class="lg:grid grid-cols-1 gap-10 px-[10px] lg:px-[40px] py-[20px]">
                    <div>
                        <div class="lg:flex md:flex justify-between items-center">
                            <div>
                                <h4 class=" font-semibold text-[20px] leading-[25px]">Water Tax details</h4>
                                <p class=" font-medium text-[18px] leading-[22px] pt-3"></p>
                            </div>

                        </div>
                        <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                            <div class="mt-5">
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Emitra Code
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $data->emitra_12_code ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mobile
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $data->mobile ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Email
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $data->email ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
