@extends('include.main')
@section('content')
    <div class=" xl:pl-[4rem] px-[20px] py-[1rem]">
        <h2 class=" font-bold text-[32px] leading-[40px] text-[#000000]">Advertisements</h2>

        <div class=" xl:grid lg:grid lg:grid-cols-3 xl:grid-cols-5 md:grid md:grid-cols-2 gap-5">
            <a href="{{ route('admin.advertisementList') }}">
                <div class="w-full mt-10 px-[20px] py-[30px] box-shadow rounded-[20px] cursor-pointer">
                    <div>
                        <img src="{{ asset('admin-assets//images/contact.png') }}">
                    </div>
                    <p class="font-semibold text-[22px] leading-[32px] text-[#202224] pt-5">Advertisment →</p>
                </div>
            </a>
            <a href="{{ route('admin.applicationList') }}">
                <div class="w-full mt-10 px-[20px] py-[30px] box-shadow rounded-[20px] cursor-pointer">
                    <div>
                        <img src="{{ asset('admin-assets//images/contact.png') }}">
                    </div>
                    <div class="mt-5 ">
                        <p class="font-semibold text-[22px] leading-[32px] text-[#202224]">Applications →</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
