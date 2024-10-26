[13:26] Sumit Gyanani
@extends('include.main')
@section('content')
<style>
        /* Add your CSS styles here */
        .hidden-Residential {
            display: none;
        }
    </style>
<div class="xl:px-[4rem] px-[20px] py-[3rem]">
    <h2 class=" font-bold text-[24px] leading-[30px] lg:text-[32px] lg:leading-[40px] text-[#000000]">New Property</h2>
    <div class="flex  lg:gap-5 my-10  gap-2 items-center ">
            <button id="nonResidentialBtn"
                class="lg:w-[182px] md:w-[182px] h-[70px] rounded-[100px] bg-[#F26F00] text-[#FFFFFF] w-full font-semibold text-[16px] lg:text-[18px] leading-[30px]">
                Non-Residential
            </button>
            <button id="residentialBtn"
                class="lg:w-[205px] md:w-[205px] h-[70px] rounded-[100px] bg-[#FFE4CD] text-black w-full font-semibold text-[16px] lg:text-[18px] leading-[30px]">
                Residential
            </button>
        </div>
    <div>
        <form action="{{route('add-property.pay.save')}}" method="post" id="myForm">
            @csrf
        <div id="nonResidentialContent" class="border border-[#B1B6C6] rounded-[20px] mt-10 pb-[20px] ">
            <h3 class=" font-semibold text-[18px] leading-[30px]   lg:px-[20px] px-[10px]   py-[20px] text-[#000000]">Tax self-assessment form on annual value of non-residential building or land or both.</h3>
            <div class="lg:grid lg:grid-cols-3 md:grid md:grid-cols-2  lg:gap-10 border-b border-[#B1B6C6] mt-5   px-[10px] lg:px-[20px]   pb-[80px] flex flex-col gap-5">

                   <input type="hidden" id="Non_Residential" name="Non_Residential" value="Non Residential" class="w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Enter">

                <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Details of owner or director<span class="text-red-600">*</span></div>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="details_of_owner" name="details_of_owner"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Details of owner or director">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">owner. Name of Chairman.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Name of father/husband of owner/owner.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Building/house/root number and location address.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Building/house plot owner. Residential address of the Principal.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Any other details.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Description of building or land.<span class="text-red-600">*</span></div>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="land_building_description" name="land_building_description"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Description of building or land">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">Covered area of buildings (in square feet).</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Area of open land or plot (in square feet).</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Other details if any.</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Location details :-<span class="text-red-600">*</span></div>
                                <h1>A-The building or land is situated:-</h1>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="land_building_situated" name="land_building_situated"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select The building or land is situated">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">On road width more than 24 metres.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">On road width more than 12 meters and up to 24 meters.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">On road width more than 9 meters and up to 12 metres.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">On roads up to 9 meters wide.</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Location details :-<span class="text-red-600">*</span></div>
                                <h1>B-Nature of building construction:-</h1>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="nature_building_construction" name="nature_building_construction"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Nature of building construction">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">Concrete house more than 24 meters wide.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Other pucca bhayan, asbestos/fibre or tin shed.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">On road width more than 9 meters and up to 12 metres.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Kachha building means all other buildings which are not covered by (one) and two.</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                <div>

                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Year of construction<span class="text-red-600">*</span></div>
                    <input type="text" name="construction_year" class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Enter">
                </div>
                <div>
                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Predetermined Annual Value and Assessment Year<span class="text-red-600">*</span></div>
                    <input type="text" name="predetermind_value_year" class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Enter Name">
                </div>
                <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Calculating Annual Value:-<span class="text-red-600">*</span></div>
                                <h1>A. Annual value of the building:-</h1>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="annual_value_building" name="annual_value_building"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Calculating Annual Value">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">Monthly rental rate for residential building determined by the Executive Officer.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Coefficient related to residential building rate.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Monthly rental rate received for the building (one).</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Covered area of building.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Annual value of the building Monthly rental rate x Covered area X 12 (three X four x 12).</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Calculating Annual Value:-<span class="text-red-600">*</span></div>
                                <h1>B. Annual value of land:-</h1>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="annual_value_land" name="annual_value_land"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Annual value of land">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">Monthly rental rate for residential building determined by the Executive Officer.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Regarding residential land tax rate prescribed by rules coefficient.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Monthly rental rate received for the land (one).</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Covered area of land.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Annual value of the building Monthly rental rate X Covered area X 12 (Three X four X 12).</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                <div>
                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Calculating Annual Value<span class="text-red-600">*</span></div>
                    <h1>C. Total Annual Value (a) (five) (b) (five).</h1>
                    <input type="text" name="total_annual_value" class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Enter">

            </div>
            </div>
            <div class="lg:flex lg:flex-row md:flex md:flex-row flex flex-col items-center justify-center mt-5 gap-5">
                <button id="resetButton" class="w-[250px] h-[70px] text-center rounded-[100px] border border-[#B1B6C6] text-black font-semibold text-[18px] leading-[30px]">
                    Reset
                 </button>
                <button type="submit" class="w-[250px] h-[70px] text-center rounded-[100px] bg-[#F26F00] text-[#FFFFFF] font-semibold text-[18px] leading-[30px]">Submit→</button>
           </div>
       </div>

       <div id="residentialContent" class="hidden-Residential border border-[#B1B6C6] rounded-[20px] mt-10 pb-[20px] ">
            <h3 class=" font-semibold text-[18px] leading-[30px]   lg:px-[20px] px-[10px]   py-[20px] text-[#000000]">Tax self-assessment form on annual value of non-residential building or land or both.</h3>
            <div class="lg:grid lg:grid-cols-3 md:grid md:grid-cols-2  lg:gap-10 border-b border-[#B1B6C6] mt-5   px-[10px] lg:px-[20px]   pb-[80px] flex flex-col gap-5">
            <input type="hidden" id="Residential" name="Residential" value="" class="w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Enter">

            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Details of owner or director<span class="text-red-600">*</span></div>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="res_details_of_owner" name="res_details_of_owner"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Details of owner or director">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">owner. Name of Chairman.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Name of father/husband of owner/owner.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Building/house/root number and location address.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Residential address of Swami Adhyapiati.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Other details if any.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Description of building or land<span class="text-red-600">*</span></div>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="res_land_building_description" name="res_land_building_description"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Description of building or land">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">A- Covered area of ​​the house (in square feet...).</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Area of ​​open land or plot (in square feet).</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Other details if any.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Description of building or land.<span class="text-red-600">*</span></div>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="res_land_building_description_b" name="res_land_building_description_b"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Description of building or land">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">Internal input (in square feet) of all balconies, corridors, kitchens and storage rooms.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Internal input (in square feet) of all balconies, corridors, kitchens and storage rooms.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Internal dimensions of all garages (in sq. ft.).</li>

                                        </ul>

                                    </div>
                                    <h1>Note:- Covered by bathrooms, latrines, portica and sithi (jina).
                                    The area will not be part of the floor area.</h1>
                                </div>
                            </div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Description of building or land<span class="text-red-600">*</span></div>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="res_land_building_description_c" name="res_land_building_description_c"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Description of building or land">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">C- Floor area of ​​the building: B (one) 1/2 B (two) + 1/4 S (three).</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">80% of the area covered a (a) 80%.</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Location details :-<span class="text-red-600">*</span></div>
                                <h1>A- The building or land is situated:-</h1>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="res_land_building_situated" name="res_land_building_situated"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select The building or land is situated">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">On road width more than 24 meters...</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Width over 12m and up to 24m On the route.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">On road width more than 9 meters and up to 12 metres.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">On roads up to 9 meters wide...</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Location Details:-<span class="text-red-600">*</span></div>
                                <h1>B. - Nature of building construction:-</h1>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="res_nature_building_construction" name="res_nature_building_construction"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Nature of building construction">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">R. C. C. Roof or R. B. concrete building with roof.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Other concrete buildings.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Monthly rental rate received for the building (one).</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Kachha building means all other buildings which are not covered by (one) and two..</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Location Details:-<span class="text-red-600">*</span></div>
                                <h1>C- The land (if no building is constructed on it) is located:-</h1>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="res_land_located" name="res_land_located"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select The land (if no building is constructed on it) is located">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">On road width more than 24 metres.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">On road width more than 12 meters and up to 24 meters.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">On road width more than 9 meters and up to 12 metres..</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">On roads up to 1 meter wide...</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                <div>
                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Whether the building is owner-occupied or on rent.<span class="text-red-600">*</span></div>
                    <input type="text" name="res_building_owner_rent" class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Enter">

            </div>

            <div>
                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">year of construction<span class="text-red-600">*</span></div>
                    <input type="text" name="res_construction_year" class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Enter">

            </div>
            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">
                                Calculation of annual value:-<span class="text-red-600">*</span></div>
                                <div class="select-box relative">
                                    <div class="select-option relative">
                                        <input type="text" id="res_total_annual_value" name="res_total_annual_value"
                                            class="soValue     outline-none cursor-pointer w-full border border-[#B1B6C6] rounded-[100px] pl-[19px] h-[60px]"
                                            placeholder="Select Calculation of annual value">
                                    </div>
                                    <div
                                        class="content bg-[#ffffff] absolute text-black     w-full z-50 border  mt-[-7px]  rounded-bl-[24px] rounded-br-[24px]  border-[#B1B6C6] hidden">
                                        <ul class="options mt-[10px]    pb-[20px] cursor-pointer ">
                                            <li class=" font-normal text-[15px] leading-[30px]">Minimum monthly rental rate (per square foot) prescribed for the building by the Executive Officer.</li>
                                            <li class=" font-normal text-[15px] leading-[30px] ">Minimum monthly rental rate fixed for the building by the Executive Officer.</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
            </div>
            <div class="lg:flex lg:flex-row md:flex md:flex-row flex flex-col items-center justify-center mt-5 gap-5">
                <button id="resetButton" class="w-[250px] h-[70px] text-center rounded-[100px] border border-[#B1B6C6] text-black font-semibold text-[18px] leading-[30px]">
                    Reset
                 </button>
                <button type="submit" class="w-[250px] h-[70px] text-center rounded-[100px] bg-[#F26F00] text-[#FFFFFF] font-semibold text-[18px] leading-[30px]">Submit→</button>
           </div>
       </div>
    </form>
    </div>
</div>
    <div id="successModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50  px-[10px] hidden  overflow-scroll">
        <div class=" lg:w-[770px] popup w-full bg-[#FFFFFF] rounded-[20px] px-[10px] lg:px-[40px] pb-[40px] mt-[30px]">
            <div class="flex justify-center my-6">
                <img src="{{asset('admin-assets/images/success.png')}}" />
            </div>
            <h5 class=" font-semibold text-[22px] lg:text-[28px] text-center  leading-[40px]  lg:pt-10">New Property
                Application Submitted Successfully</h5>
            <p
                class=" font-normal text-[16px] lg:text-[20px] leading-[28px] text-center mt-2    lg:px-[20px] px-[10px]   text-[#B9B9B9]">
                Lorem ipsum dolor sit amet consectetur. Tellus dui quam nunc id ipsum consectetur dictum pulvinar id.
            </p>

            <div class="flex justify-center flex-col items-center">
                <div class="lg:flex md:flex items-center  gap-5 mt-3 lg:mt-10">
                    <div class="font-bold text-[20px] leading-[30px] text-center">New Property</div>
                    <p
                        class=" font-semiboldtext-[16px] lg:text-[20px] leading-[20px] text-[#B9B9B9]  text-center  lg:mt-0 md:mt-0 mt-2">
                        Property ID: PG-PT-2345-45-56-678900</p>
                </div>
                <div class="lg:flex md:flex items-center  gap-5 mt-3 lg:mt-10">
                    <div class="font-bold text-[20px] leading-[30px] text-center">Application No.</div>
                    <p
                        class=" font-semibold text-[16px] lg:text-[20px] leading-[20px] text-[#B9B9B9]  text-center  lg:mt-0 md:mt-0 mt-2">
                        PG-AC-1234567890</p>
                </div>

                <div class="lg:flex md:flex gap-5 mt-5 lg:mt-10">
                    <div>
                        <div id="toggle-button-1"
                            class="lg:w-[234px] w-[180px] h-[70px] rounded-full cursor-pointer text-[#000000]    lg:px-[20px] px-[10px]   border border-[#F26F00] font-semibold text-[18px] leading-[30px] flex justify-between items-center"
                            onclick="toggleDropdown('1')">
                            <div class="flex gap-3 items-center">
                                <img src="{{asset('admin-assets/images/print.png')}}" alt="Print Icon" />
                                Print
                            </div>
                            <img src="{{asset('admin-assets/images/arrowdown.png')}}" alt="Dropdown Icon" />
                        </div>
                        <ul id="dropdown-content-1"
                            class=" w-[181px] lg:w-[234px] z-50 bg-white hidden border border-[#F26F00] rounded-br-[35px] rounded-bl-[35px]">
                            <li class="border-b border-[#F26F00]    lg:px-[20px] px-[10px]   py-[20px] hover:bg-[#B1B6C6]">
                                <a href="#"><img src="" />TL_Certificate</a>
                            </li>
                            <li class="border-b border-[#F26F00]    lg:px-[20px] px-[10px]   py-[20px] hover:bg-[#B1B6C6]">
                                <a href="#">CSS</a>
                            </li>
                            <li class="   lg:px-[20px] px-[10px]   py-[20px] hover:bg-[#B1B6C6]"><a
                                    href="#">JavaScript</a></li>
                        </ul>
                    </div>

                    <!-- Second Dropdown -->
                    <div class="lg:mt-0 md:mt-0 mt-3">
                        <div id="toggle-button-2"
                            class="lg:w-[234px] w-[180px] h-[70px] rounded-full cursor-pointer text-[#000000]    lg:px-[20px] px-[10px]   border border-[#F26F00] font-semibold text-[18px] leading-[30px] flex justify-between items-center"
                            onclick="toggleDropdown('2')">
                            <div class="flex items-center gap-3">
                                <img src="{{asset('admin-assets/images/downloadimg.png')}}" alt="Print Icon" />
                                Download
                            </div>
                            <img src="{{asset('admin-assets/images/arrowdown.png')}}" alt="Dropdown Icon" />
                        </div>
                        <ul id="dropdown-content-2"
                            class="w-[181px] lg:w-[234px] z-50 bg-white hidden border border-[#F26F00] rounded-br-[35px] rounded-bl-[35px]">
                            <li
                                class="border-b  border-[#F26F00]    lg:px-[20px] px-[10px]   py-[20px] hover:bg-[#B1B6C6]">
                                <a class="flex items-center gap-5" href="#"><img
                                        src="{{asset('admin-assets/images/downloadoption1.png')}}" />TL_Certificate</a>
                            </li>
                            <li
                                class="border-b border-[#F26F00] flex     lg:px-[20px] px-[10px]   py-[20px] hover:bg-[#B1B6C6]">
                                <a class="flex items-center gap-5" href="#"><img
                                        src="{{asset('admin-assets/images/option2.png')}}" />Receipts</a>
                            </li>
                            <li class="   lg:px-[20px] px-[10px]    py-[20px] hover:bg-[#B1B6C6]"><a href="#"
                                    class="flex items-center gap-5"><img src="{{asset('admin-assets/images/application.png')}}" />Application</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('nonResidentialBtn').addEventListener('click', function() {
        document.getElementById('nonResidentialContent').classList.remove('hidden-Residential');
        document.getElementById('residentialContent').classList.add('hidden-Residential');
        document.getElementById('Non_Residential').value = "Non Residential";
        document.getElementById('Residential').value = "";
    });

    document.getElementById('residentialBtn').addEventListener('click', function() {
        document.getElementById('residentialContent').classList.remove('hidden-Residential');
        document.getElementById('nonResidentialContent').classList.add('hidden-Residential');
        document.getElementById('Non_Residential').value = "";
        document.getElementById('Residential').value = "Residential";
    });
    </script>

    <script>
        function nextPart(nextPartId) {
            hideAllParts();
            document.getElementById(nextPartId).classList.remove('hidden');

            updateProgressBar(nextPartId);
        }

        function prevPart(prevPartId) {
            hideAllParts();
            document.getElementById(prevPartId).classList.remove('hidden');

            updateProgressBar(prevPartId);
        }

        function hideAllParts() {
            document.getElementById('part1').classList.add('hidden');
            document.getElementById('part2').classList.add('hidden');
            document.getElementById('part3').classList.add('hidden');
            document.getElementById('part4').classList.add('hidden');
            document.getElementById('part5').classList.add('hidden');
        }

        function updateProgressBar(partId) {
            let progressBar = document.getElementById('progressBar');
            let stepElements = document.querySelectorAll('.step');
            stepElements.forEach(step => step.classList.remove('bg-orange-500', 'border-orange-500'));

            if (partId === 'part1') {
                progressBar.style.width = '20%';
                document.getElementById('step1').classList.add('bg-orange-500', 'border-orange-500');
            } else if (partId === 'part2') {
                progressBar.style.width = '40%';
                document.getElementById('step2').classList.add('bg-orange-500', 'border-orange-500');
            } else if (partId === 'part3') {
                progressBar.style.width = '60%';
                document.getElementById('step3').classList.add('bg-orange-500', 'border-orange-500');
            } else if (partId === 'part4') {
                progressBar.style.width = '80%';
                document.getElementById('step4').classList.add('bg-orange-500', 'border-orange-500');
            } else if (partId === 'part5') {
                progressBar.style.width = '100%';
                document.getElementById('step5').classList.add('bg-orange-500', 'border-orange-500');
            }
        }
    </script>



    <script>
        function toggleOptionContent() {
            console.log("hello")
            var optionContent = document.getElementById('optionContent');

            optionContent.classList.toggle('hidden');

        }

        function toggleOptionContent2() {
            var optionContent2 = document.getElementById('optionContent2');
            optionContent2.classList.toggle('hidden');
        }

        function toggleOptionContent3() {
            var optionContent3 = document.getElementById('optionContent3');
            optionContent3.classList.toggle('hidden');
        }
    </script>
    <script>
        function toggleMenu() {
            var menu = document.getElementById('menu');

            menu.classList.toggle('hidden');

        }
    </script>
    <script>
         function openModal() {
        document.getElementById('successModal').classList.remove('hidden');
    }

            var modal = document.getElementById('successModal');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            document.getElementById('successModal').classList.add('hidden');
        }
        }

    </script>
    <script>
        function toggleDropdown(id) {
            var dropdownContent = document.getElementById('dropdown-content-' + id);
            var toggleButton = document.getElementById('toggle-button-' + id);

            dropdownContent.classList.toggle('hidden');

            if (!dropdownContent.classList.contains('hidden')) {
                toggleButton.classList.remove('rounded-full');
                toggleButton.classList.add('rounded-tr-[35px]', 'rounded-tl-[35px]');
            } else {
                toggleButton.classList.remove('rounded-tr-[35px]', 'rounded-tl-[35px]');
                toggleButton.classList.add('rounded-full');
            }
        }
    </script>
    <script>
        // Select all select-box elements
        const selectBoxes = document.querySelectorAll('.select-box');

        // Loop through each select box
        selectBoxes.forEach(function(selectBox, index) {
            const selectOption = selectBox.querySelector('.select-option');
            const soValue = selectBox.querySelector('.soValue');
            const optionsLi = selectBox.querySelectorAll('.options li');
            const chooseFileButton = selectBox.querySelector('button');

            // Toggle active class on click of select-option
            selectOption.addEventListener('click', function() {
                selectBox.classList.toggle('active');
                if (selectBox.classList.contains('active')) {
                    chooseFileButton.classList.add('rounded-tr-[19px]');
                    chooseFileButton.classList.add('rounded-br-[0px]');
                } else {
                    chooseFileButton.classList.remove('rounded-tr-[19px]');
                }
            });
            // Set value on click of options
            optionsLi.forEach(function(option) {
                option.addEventListener('click', function() {
                    const text = this.textContent;
                    soValue.value = text;
                    selectBox.classList.remove('active');
                    chooseFileButton.classList.remove('rounded-tr-[19px]');
                    chooseFileButton.classList.remove('rounded-br-[0px]');
                });
            });
        });
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
@endsection

