@extends('include.main')
@section('content')
    <style>
        .hidden-Residential {
            display: none;
        }
    </style>
    <div class="xl:px-[4rem] px-[20px] py-[3rem]">
        <h2 class=" font-bold text-[24px] leading-[30px] lg:text-[32px] lg:leading-[40px] text-[#000000]">Profile Details
        </h2>

        <div>
            <form action="{{ route('profile.update') }}" method="post" id="myForm" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div id="nonResidentialContent" class="border border-[#B1B6C6] rounded-[20px] mt-10 pb-[20px] ">
                    <div class="lg:grid lg:grid-cols-3 md:grid md:grid-cols-2 lg:gap-10 border-b border-[#B1B6C6] mt-5 px-[10px] lg:px-[20px] pb-[80px] flex flex-col gap-5">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Name<span class="text-red-600">*</span></div>
                            <input type="text" name="name" value="{{ $user_data->name }}" autocomplete="off"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter">
                            <span class="" style="color:red">{{ $errors->first('name') }}</span>
                        </div>
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Email<span class="text-red-600">*</span></div>
                            <input type="email" name="email" value="{{ $user_data->email }}" autocomplete="off"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter">
                            <span class="" style="color:red">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="w-full">
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Profile Image<span class="text-red-600">*</span></div>
                            <label class="relative select-box w-full">
                                <input type="text" id="soValue13"
                                    class="soValue outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                    placeholder="Choose Profile Image" readonly>
                                <input type="file" name="profile_image" class="absolute inset-0 opacity-0 cursor-pointer"
                                    id="profileImageInput" onchange="showFileName()">
                                <button type="button"
                                    class="absolute right-0 top-0 w-[85px] h-[60px] bg-[#F26F00] text-white font-normal text-[12px] leading-[20px] text-center rounded-tr-[32px] rounded-br-[32px] z-30">
                                    Choose File
                                </button>
                            </label>

                            <br>

                            @if ($errors->has('profile_image'))
                                <span class="text-red-600">{{ $errors->first('profile_image') }}</span>
                            @endif

                            @if (Auth::user()->profile_image)
                                <img src="{{ Auth::user()->profile_image }}" class="w-[200px] mt-2" alt="Profile Image" />
                            @endif
                        </div>

                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Current Password<span class="text-red-600">*</span></div>
                            <input type="password" name="current_password" autocomplete="new-password"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter Current Password">
                            <span style="color:red">{{ $errors->first('current_password') }}</span>
                        </div>

                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">New Password<span class="text-red-600">*</span></div>
                            <input type="password" name="password" autocomplete="new-password"
                                class="w-full border border-[#B1B6C6] pl-[19px] rounded-[100px] h-[60px]"
                                placeholder="Enter New Password">
                            <span style="color:red">{{ $errors->first('password') }}</span>
                        </div>
                    </div>

                    <div class="lg:flex lg:flex-row md:flex md:flex-row flex flex-col items-center justify-center mt-5 gap-5">
                        <button id="resetButton"
                            class="w-[250px] h-[70px] text-center rounded-[100px] border border-[#B1B6C6] text-black font-semibold text-[18px] leading-[30px]">
                            Reset
                        </button>
                        <button type="submit"
                            class="w-[250px] h-[70px] text-center rounded-[100px] bg-[#F26F00] text-[#FFFFFF] font-semibold text-[18px] leading-[30px]">Update →</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="successModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50  px-[10px] hidden  overflow-scroll">
        <div class=" lg:w-[770px] popup w-full bg-[#FFFFFF] rounded-[20px] px-[10px] lg:px-[40px] pb-[40px] mt-[30px]">
            <div class="flex justify-center my-6">
                <img src="{{ asset('admin-assets/images/success.png') }}" />
            </div>
            <h5 class=" font-semibold text-[22px] lg:text-[28px] text-center  leading-[40px]  lg:pt-10">
                Profile Update Successfully</h5>
        </div>
    </div>


    <script>
        function openModal() {
            document.getElementById('successModal').classList.remove('hidden');
        }

        var modal = document.getElementById('successModal');

        window.onclick = function(event) {
            if (event.target == modal) {
                document.getElementById('successModal').classList.add('hidden');
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const resetButton = document.getElementById('resetButton');
            const form = document.getElementById('myForm');

            resetButton.addEventListener('click', (event) => {
                event.preventDefault();
                form.reset();
            });
        });
    </script>
    @if (session('success'))
        <script>
            openModal()
        </script>
    @endif

    <script>
        function showFileName() {
            var input = document.getElementById('profileImageInput');
            var fileName = input.files[0].name;
            document.getElementById('soValue13').value = fileName;
        }
    </script>
@endsection
