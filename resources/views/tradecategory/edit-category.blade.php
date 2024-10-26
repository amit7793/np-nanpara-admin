@extends('include.main')
@section('content')
    <style>
        .hidden-Residential {
            display: none;
        }

        .w-full {
            width: 304%;
        }
    </style>

    <div class="xl:px-[4rem] px-[20px] py-[3rem]">
        <h2 class="font-bold text-[24px] leading-[30px] lg:text-[32px] lg:leading-[40px] text-[#000000]">Add Category</h2>
        <div>
            <form action="{{ route('trade.tradeCategoryUpdate', ['id' => $data->id]) }}" method="post" id="myForm"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div id="nonResidentialContent" class="border border-[#B1B6C6] rounded-[20px] mt-10 pb-[20px] ">
                    <div
                        class="lg:grid lg:grid-cols-3 md:grid md:grid-cols-2  lg:gap-10 border-b border-[#B1B6C6] mt-5   px-[10px] lg:px-[20px]   pb-[80px] flex flex-col gap-5">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Name</div>
                            <input type="text" name="name" value="{{ $data->name }}"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter">
                            @error('name')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="lg:flex lg:flex-row md:flex md:flex-row flex flex-col items-center justify-center mt-5 gap-5">
                    <button type="submit"
                        class="w-[250px] h-[70px] text-center rounded-[100px] bg-[#F26F00] text-[#FFFFFF] font-semibold text-[18px] leading-[30px]">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
