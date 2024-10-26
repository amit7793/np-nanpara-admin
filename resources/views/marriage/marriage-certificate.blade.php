<!DOCTYPE html>
<html>
<head>
    <title>Marriage Certificate</title>
</head>
<body>
     <div class=" border border-[#A0A0A0] rounded-[15px] mt-6 ">
            <div class="lg:flex justify-between">
                <div class="lg:w-[600px] w-full">
                    <div class=" border-b border-[#B1B6C6] pb-[30px]">
                        <div class="flex justify-between px-[15px] pt-[40px]">
                            <div class=" font-normal text-[16px] lg:text-[18px] leading-[30px]">Challan Fee</div>
                            <div class=" font-normal text-[16px] lg:text-[18px] leading-[30px]">Lorem ipsum dolor</div>
                        </div>
                        <div class="flex justify-between px-[15px] pt-[20px]">
                            <div class=" font-normal text-[16px] lg:text-[18px] leading-[30px]">Registration Fee</div>
                            <div class=" font-normaltext-[16px] lg:text-[18px] leading-[30px]">Lorem ipsum dolor</div>
                        </div>
                    </div>
                    <div class="flex justify-between px-[15px] py-[20px]">
                        <div class=" font-normal text-[16px] lg:text-[18px] leading-[30px]">Total Amount</div>
                        <div class=" font-normal text-[16px] lg:text-[18px] leading-[30px]">Lorem ipsum dolor</div>
                    </div>
                </div>

                <div class="pb-[40px]">
                    <div class=" font-bold text-[22px] leading-[27px] text-[#000000]   px-[18px] text-right  pt-[40px]">Fee
                        Estimated</div>
                    <div class=" font-semibold text-[22px] leading-[27px] text-right  px-[18px] pt-[10px]">$12,750</div>
                    <div class=" font-semibold text-[22px] leading-[27px] text-right  px-[18px] pt-[10px] text-[#579558]">
                        Paid Successfully</div>
                </div>
            </div>
        </div>

        <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] mt-7 w-full pb-[40px] ">
            <div class="border-b border-[#B1B6C6] py-[20px]  px-[30px]">
                <h4 class=" font-semibold text-[20px] leading-[25px]">Marriage Details</h4>
            </div>
            <div class="mt-5">
                <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                    <div>
                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">City<span
                                class="text-red-600">*</span></div>
                        <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->city ?? "NA"}}</p>
                    </div>
                    <div>
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Village<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->village ?? "NA"}}</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                    <div>
                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Ward
                            Name</div>
                        <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->ward ?? "NA"}}</p>
                    </div>
                    <div>
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Marriage Place</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->marriage_place ?? "NA"}}</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                    <div>
                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Marriage Date</div>
                        <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->marriage_date ?? "NA"}}</p>
                    </div>
                    <div>
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Pincode</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->pin_code ?? "NA"}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:grid grid-cols-2 gap-10  py-[20px]">
            <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] mt-7 w-full pb-[40px] ">
                <div class="border-b border-[#B1B6C6] py-[20px]  px-[30px]">
                    <h4 class=" font-semibold text-[20px] leading-[25px]">Bride Details</h4>
                </div>
                <div class="mt-5">
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">name<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_name ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Date Of Birth<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_date_of_birth ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Contact</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_contact ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Email</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_email ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Father Name</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_father_name ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mother Name</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_mother_name ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Address<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_address ?? "NA"}}</p>
                        </div>

                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">District
                                </div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_district ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">state<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_state ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Country
                                </div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_country ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Pin Code<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->pin_code ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Is Divyang
                                </div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_is_divyang ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] mt-7 w-full pb-[40px] ">
                <div class="border-b border-[#B1B6C6] py-[20px]  px-[30px]">
                    <h4 class=" font-semibold text-[20px] leading-[25px]">Groom Details</h4>
                </div>
                <div class="mt-5">
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">name<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_name ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Date Of Birth<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_date_of_birth ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Contact</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_contact ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Email</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_email ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Father Name</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_father_name ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mother Name</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_mother_name ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Address<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_address ?? "NA"}}</p>
                        </div>

                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">District
                                </div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_district ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">state<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_state ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Country
                                </div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_country ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Pin Code<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_pincode ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Is Divyang
                                </div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_is_divyang ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] mt-7 w-full pb-[40px] ">
                <div class="border-b border-[#B1B6C6] py-[20px]  px-[30px]">
                    <h4 class=" font-semibold text-[20px] leading-[25px]">Bride Guardian Details</h4>
                </div>
                <div class="mt-5">
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Relation With Bride<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_guardian_relation_with_bride ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_guardian_name ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Address</div>

                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_guardian_address ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">District</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_guardian_district ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">State</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_guardian_state ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Country</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_guardian_country ?? "NA"}}</p>
                            </div>
                        </div>


                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Pin Code<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_guardian_pincode ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Contact
                                </div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_guardian_contact ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Email<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->bride_guardian_email ?? "NA"}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] mt-7 w-full pb-[40px] ">
                <div class="border-b border-[#B1B6C6] py-[20px]  px-[30px]">
                    <h4 class=" font-semibold text-[20px] leading-[25px]">Groom Guardian Details</h4>
                </div>
                <div class="mt-5">
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Relation With Bride<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_guardian_relation_with_bride ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_guardian_name ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Address</div>

                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_guardian_address ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">District</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_guardian_district ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">State</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_guardian_state ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Country</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_guardian_country ?? "NA"}}</p>
                            </div>
                        </div>


                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Pin Code<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_guardian_pincode ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Contact
                                </div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_guardian_contact ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Email<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{$marriage->groom_guardian_email ?? "NA"}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] mt-7 w-full pb-[40px] ">
                <div class="border-b border-[#B1B6C6] py-[20px]  px-[30px]">
                    <h4 class=" font-semibold text-[20px] leading-[25px]">Bride Witness Details
                    </h4>
                </div>
                <div class="mt-5">
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->bride_witness_name ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Address<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->bride_witness_address ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">District
                                Name</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->bride_witness_district ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">State</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->bride_witness_state ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Country</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->bride_witness_country ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Pincode</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->bride_witness_pincode ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Contact<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->bride_witness_name ?? "NA"}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] mt-7 w-full pb-[40px] ">
                <div class="border-b border-[#B1B6C6] py-[20px]  px-[30px]">
                    <h4 class=" font-semibold text-[20px] leading-[25px]">Groom Witness Details
                    </h4>
                </div>
                <div class="mt-5">
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->groom_witness_name ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Address<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->groom_witness_address ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">District
                                Name</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->groom_witness_district ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">State</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->groom_witness_state ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Country</div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->groom_witness_country ?? "NA"}}</p>
                        </div>
                        <div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Pincode</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->groom_witness_pincode ?? "NA"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                        <div>
                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Contact<span
                                    class="text-red-600">*</span></div>
                            <p class=" font-medium  text-[18px] leading-[22px]">{{ $marriage->groom_witness_name ?? "NA"}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Add more details as needed -->
</body>
</html>
