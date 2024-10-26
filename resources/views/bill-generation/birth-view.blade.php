@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] md:px-[20px] px-[10px] py-[2rem]">
        <div class="lg:flex lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
            <div class="top flex justify-between items-center w-full">
                <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Birth Certificate Bill Generation</h2>
                <div class="ml-auto">
                    <a href="{{ route('export-exportBirthViewBill', ['id' => $birthcertificate->id]) }}">
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
                                <h4 class=" font-semibold text-[20px] leading-[25px]">Birth Certificate details</h4>
                                <p class=" font-medium text-[18px] leading-[22px] pt-3"></p>
                            </div>

                        </div>
                        <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                            <div class="mt-5">
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Born Date</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->date_of_birth ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Gender
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->gender ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name of new born
                                            baby, if any</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->name ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Father's
                                                name</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->name_of_father ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mother's name
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->name_of_mother ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Time of
                                                birth of child Address of parents</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->address_parent_child ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Permanent
                                            residential address of parents</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->permanent_address ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Place of
                                                Birth</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->place_of_birth ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name of
                                            Informant</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->name_of_informant ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Address
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->address ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mobile Number
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->mobile_number ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Email id
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->email_id ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name of the
                                            village or town where the mother resides</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->mother_resides_place ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Family
                                                Tradition</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->family_tradition ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Father's
                                            educational level</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->father_educational_level ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mother's
                                                educational level</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->mother_educational_level ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Father's
                                            business</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->father_business ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mother's age
                                                at birthcertificate</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->mother_age_at_marriage ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">At the time of
                                            this child's birth</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->time_of_child_birth ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Write the
                                                number of uninhabited people this year of Mother</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->uninhabited_people_this_year_of_mother ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Under what
                                            auspices did the delivery take place</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->Under_auspices_delivery_take_place ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Time of
                                                Conception</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $birthcertificate->time_of_conception ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Weight at Birth
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $birthcertificate->weight_at_birth ?? 'NA' }}</p>
                                    </div>
                                    <div>
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
