@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] px-[20px] py-[3rem]">
        <h2 class=" font-bold text-[24px] leading-[30px] lg:text-[32px] lg:leading-[40px] text-[#000000]">Add Advertisement
        </h2>

        <div>
            <form action="{{ route('admin.storeAdvertisement') }}" method="post" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="border border-[#B1B6C6] rounded-[20px] mt-10 pb-[20px]">
                    <div
                        class="lg:grid lg:grid-cols-3 md:grid md:grid-cols-2 lg:gap-10 border-b border-[#B1B6C6] mt-5 px-[10px] lg:px-[20px] pb-[80px] flex flex-col gap-5">

                        <!-- Image Upload -->
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Upload Image<span class="text-red-600">*</span>
                            </div>
                            <label for="image"
                                class="flex items-center justify-center w-full h-[60px] border border-[#B1B6C6] rounded-[100px] cursor-pointer hover:shadow-lg transition-shadow duration-200">
                                <span class="text-center text-[#B1B6C6]">Choose Image</span>
                                <input type="file" name="image" id="image" class="hidden">
                            </label>
                            @if ($errors->has('image'))
                                <span class="text-red-600">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <!-- Price -->
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Price<span
                                    class="text-red-600">*</span></div>
                            <input type="number" name="price" value="{{ old('price') }}"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter Price">
                            @if ($errors->has('price'))
                                <span style="color:red">{{ $errors->first('price') }}</span>
                            @endif
                        </div>

                        <!-- Mobile Number -->
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Mobile Number<span
                                    class="text-red-600">*</span></div>
                            <input type="text" name="mobile_number" value="{{ old('mobile_number') }}"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter Mobile Number">
                            @if ($errors->has('mobile_number'))
                                <span style="color:red">{{ $errors->first('mobile_number') }}</span>
                            @endif
                        </div>

                        <!-- Size (Width x Height) -->
                        <div class="lg:col-span-2">
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Size (Width x
                                Height)<span class="text-red-600">*</span></div>
                            <div class="flex items-center border border-[#B1B6C6] rounded-[100px] h-[60px]">
                                <input type="number" name="width" value="{{ old('width') }}"
                                    class="w-full border-0 pl-[19px] h-full rounded-l-[100px] focus:outline-none"
                                    placeholder="Width">
                                <span class="mx-2">x</span>
                                <input type="number" name="height" value="{{ old('height') }}"
                                    class="w-full border-0 h-full rounded-r-[100px] focus:outline-none"
                                    placeholder="Height">
                            </div>
                            @if ($errors->has('width'))
                                <span style="color:red">{{ $errors->first('width') }}</span>
                            @endif
                            @if ($errors->has('height'))
                                <span style="color:red">{{ $errors->first('height') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Address Section -->
                    <div
                        class="lg:grid lg:grid-cols-3 md:grid md:grid-cols-2 lg:gap-10 mt-10 px-[10px] lg:px-[20px] flex flex-col gap-5">
                        <h3 class="col-span-3 font-bold text-[20px] text-[#000000]">Address Details</h3>
                        <!-- Address -->
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Address<span
                                    class="text-red-600">*</span></div>
                            <input type="text" name="address" value="{{ old('address') }}"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter Address">
                            @if ($errors->has('address'))
                                <span style="color:red">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <!-- City -->
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">City<span
                                    class="text-red-600">*</span></div>
                            <input type="text" name="city" value="{{ old('city') }}"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter City">
                            @if ($errors->has('city'))
                                <span style="color:red">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
                        <!-- Pincode -->
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Pincode<span
                                    class="text-red-600">*</span></div>
                            <input type="number" name="pincode" value="{{ old('pincode') }}"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter Pincode">
                            @if ($errors->has('pincode'))
                                <span style="color:red">{{ $errors->first('pincode') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="lg:flex lg:flex-row md:flex md:flex-row flex flex-col items-center justify-center mt-5 gap-5">
                    <button type="submit" id="submitBtn"
                        class="w-[250px] h-[70px] text-center rounded-[100px] bg-[#F26F00] text-[#FFFFFF] font-semibold text-[18px] leading-[30px]">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
{{--
    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(e) {
                e.preventDefault();

                $('#submitBtn').prop('disabled', true).text('Submitting...');

                var form = $(this);

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        form[0].reset();

                        $('#submitBtn').prop('disabled', false).text('Submit');

                        alert('Form submitted successfully!');
                    },
                    error: function(xhr) {
                        $('#submitBtn').prop('disabled', false).text('Submit');
                    }
                });
            });
        });
    </script> --}}
@endsection
