@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] md:px-[20px] px-[10px] py-[2rem]">
        <div class="lg:flex lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
            <div class="top flex justify-between items-center w-full">
                <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Death Certificate Bill Generation</h2>
                <div class="ml-auto">
                    <a href="{{ route('export-exportDeathViewBill', ['id' => $deathcertificate->id]) }}">
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
                                <h4 class=" font-semibold text-[20px] leading-[25px]">Death Certificate details</h4>
                                <p class=" font-medium text-[18px] leading-[22px] pt-3"></p>
                            </div>

                        </div>
                        <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                            <div class="mt-5">
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Date Of Death
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->date_of_death ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name of the
                                                Deceased
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->deceased_name ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">UID No. of the
                                            deceased</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->deceased__uid_number ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mother's
                                                name</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->mother_name ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">UID No. of the
                                            Mother </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->mother_uid_number ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Father's
                                                name </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->father_name ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">UID No of the
                                            Father</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->father_uid_number ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name of
                                                Husband/Wife</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->spouse_names ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Spouse's UID No
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->spouse_uid_number ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Age of the
                                                deceased</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->death_person_age ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Address of the
                                            deceased at the time of death </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->time_of_death_address ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Permanent
                                                address of the deceased </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->address_of_death_person ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">If you were
                                            addicted to alcohol then for how many years </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->alchol_addicted ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                                Hospital/Institution</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->hospital_institution ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Home Path</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->home_path ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Other
                                                Location</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->another_location ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name of
                                            Informant</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->name_of_informant ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Path </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->path ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mobile Number
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->mobile_number ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Email id
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->email_id ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">City/Village
                                            Name</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->city_or_village_name ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Is it a city
                                                or a village</div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->city_or_village ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Occupation of
                                            the deceased</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->occupation ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Type of
                                                treatment received before death </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->received_treatment_before_death ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Whether the
                                            cause of death was medically certified</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->medical_certified ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name of the
                                                disease or actual cause of death </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->disease_name ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">In case of
                                            female death, whether the death occurred during pregnancy, at the time of
                                            delivery or within 6 weeks after termination of pregnancy</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->female_death ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">If you were
                                                addicted to smoking, for how many </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->smoking_addicted ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">If you were
                                            addicted to chewing tobacco in any form then for how many years</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->chewing_tobacco ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">If you were
                                                addicted to chewing betel nut (including pan masala), then for how many
                                                years </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->chewing_betel_nut ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">

                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">If you were
                                            addicted to alcohol then for how many years </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $deathcertificate->alchol_addicted ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Religion
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $deathcertificate->religion ?? 'NA' }}</p>
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
