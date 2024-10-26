@extends('include.main')
@section('content')
    <style>
        /* Add your CSS styles here */
        .hidden-Residential {
            display: none;
        }

    </style>

    <div class="xl:px-[4rem] px-[20px] py-[3rem]">
        <h2 class=" font-bold text-[24px] leading-[30px] lg:text-[32px] lg:leading-[40px] text-[#000000]">Add Sub Category
        </h2>

        <div>
            <form action="{{ route('trade.subcategory.save') }}" method="post" id="myForm" enctype="multipart/form-data">
                @csrf
                <div id="nonResidentialContent" class="border border-[#B1B6C6] rounded-[20px] mt-10 pb-[20px] ">
                    <div
                        class="lg:grid lg:grid-cols-3 md:grid md:grid-cols-2  lg:gap-10 border-b border-[#B1B6C6] mt-5   px-[10px] lg:px-[20px]   pb-[80px] flex flex-col gap-5">

                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Category<span class="text-red-600">*</span></div>
                            <select name="category" class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="" style="color:red">{{ $errors->first('category') }}</span>
                        </div>

                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Sub Category Name<span
                                    class="text-red-600">*</span></div>
                            <input type="text" name="subcategory_name" value=""
                                class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]"
                                placeholder="Enter Sub Category" required>
                            <span class="" style="color:red">{{ $errors->first('name') }}</span>
                        </div>
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Price<span
                                    class="text-red-600">*</span></div>
                            <input type="number" name="price" value=""
                                class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]"
                                placeholder="Enter Price" required>
                            <span class="" style="color:red">{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                </div>
             </div>
             <div
             class="lg:flex lg:flex-row md:flex md:flex-row flex flex-col items-center justify-center mt-5 gap-5">
             <button type="submit"
                 class="w-[250px] h-[70px] text-center rounded-[100px] bg-[#F26F00] text-[#FFFFFF] font-semibold text-[18px] leading-[30px]">Submit</button>
         </div>
        </form>
    </div>
    </div>
@endsection
