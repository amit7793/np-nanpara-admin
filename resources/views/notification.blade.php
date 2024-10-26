@extends('include.main')
@section('content')
<div class="xl:px-[4rem] px-[10px] py-[1rem]">
    <h2 class=" font-bold text-[32px] leading-[40px] text-[#000000]">Notifications</h2>
    <div class="border border-[#A0A0A0] rounded-[15px] mt-6">
        @if(!$notification_data->isEmpty())
        @foreach($notification_data as $notification_data_list)
        <div class=" flex flex-col gap-4 lg:flex lg:flex-row  md:flex md:flex-row justify-between items-center border-b border-[#B1B6C6] md:px-[25px] px-[10px] lg:px-[25px] pt-[20px] pb-[20px]">

        <div>
            <div class=" font-semibold lg:text-[18px]  text-[16px]  leading-[22px] text-[#000000]">{{$notification_data_list->id}} &nbsp; {{$notification_data_list->notification}}</div>
            <div class="flex items-center gap-5">
            {{-- <p class=" font-medium lg:text-[18px]  text-[16px]  leading-[22px] " style="color:orange;">Waiting</p> --}}

        </div>
        </div>
        </div>
        @endforeach
        @else
        <div class="text-center py-4">
        <p class="font-medium text-[18px] leading-[22px] text-[#000000]">No Notification</p>
        </div>
        @endif


    </div>
</div>
@endsection
