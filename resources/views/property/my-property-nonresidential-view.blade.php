@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] md:px-[20px] px-[10px] py-[2rem]">
        <div class="lg:flex  \ lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
            <h2 class=" font-bold text-[31px] lg:text-[32px] leading-[40px] text-left text-[#000000]">Non-Residentials
                Verification
            </h2>
            {{-- @if ($property['status'] == 1)
                @if ($property['payment_status'] == 0)
                    <div class="px-[30px] mt-4 lg:flex">
                        <b>Pay Value</b>: <b>{{ $charges['TotalAmount'] ?? 0 }}</b> ₹
                        <form action="{{ route('upload.property.pay.slip') }}" method="post" id="myForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="relative inline-block">
                                <button type="button" id="selectFileButton"
                                    class="bg-green-500 text-white ms-4 py-2 px-4 rounded"
                                    onclick="document.getElementById('fileInput').click();">
                                    Upload Pay Slip
                                </button>
                                <input type="file" id="fileInput" name="pay_slip" class="hidden"
                                    onchange="showFileName()" required>
                                <input type="hidden" name="id" value="{{ $property->id ?? 0 }}">
                            </div>
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded ms-4">
                                UPLOAD
                            </button>
                            <p id="fileName" class="mt-2 text-gray-700"></p>
                        </form>
                    </div>
                @else
                    <b>Pay Slip already Uploaded</b>
                @endif
            @endif --}}
        </div>
        <div class="border border-[#B1B6C6] rounded-[20px] mt-10 ">
            <div class=" border-b border-[#B1B6C6] pb-[100px]">
                <div class="lg:grid grid-cols-1 gap-10 px-[10px] lg:px-[40px] py-[20px]">
                    <div>
                        <div class="lg:flex md:flex justify-between items-center">
                            <div>
                                <h4 class=" font-semibold text-[20px] leading-[25px]">Non-Residentials Property details</h4>
                                <p class=" font-medium text-[18px] leading-[22px] pt-3"></p>
                            </div>
                            {{-- <div
                                class="w-[110px] h-[46px] lg:mt-0 md:mt-0 mt-4  rounded-[100px] bg-[#000000] text-[#FFFFFF] flex items-center justify-center ">
                                <img src="../images/edit.png" class="" />
                                Edit
                            </div> --}}

                        </div>
                        <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Details of owner or
                                        director
                                        Name of Chairman or Owner</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['name_chairman_owner'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Name of father/husband of Chairman/Owner</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['name_fh_chairman_owner'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Building/house/root
                                        number and location address <span class="text-red-600">*</span></div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['bhr_number_local_address'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Building/house plot owner / Residential address of the Principal</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['bhp_owner_res_address'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Any other details
                                        <span class="text-red-600">*</span></div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['any_other_details'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            A Description of building or land:-
                                            Covered area of buildings (in square feet)</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['buildings_area_covered'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Area of open land or
                                        plot (in square feet)</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['land_plot_area'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Other details if any</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['other_details'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Location details :-
                                        A-The building or land is situated:-
                                        On road width more than 24 metres</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['more_24_meter'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            On road width more than 12 meters or less than 24 meter</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['more_12_meter'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">On road width more
                                        than 9 meters less than 12 meters </div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['more_9_meter'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">On roads up to 9
                                            meters wide </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['wide_9_meter'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">B-Nature of building
                                        construction:-
                                        Concrete house more than 24 meters wide</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['corporate_house_24_meter'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Other Permanent buildings, atavest/fibre or tin sheds</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['other_premanent_buildings'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Kachha building
                                        means all other buildings which are not covered by (one) and two </div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['broken_building'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Year of construction</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['construction_year'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Predetermined Annual
                                        Value and Assessment Year </div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['predetermind_value_year'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Calculating Annual Value:-
                                            A. Annual value of the building:-</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['calc_annual_value_building'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Monthly rental rate
                                        for residential building determined by the Executive Officer </div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['rental_rate_residential_building'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Coefficient related to residential building rate </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['coefficient_res_building_rate'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                        Monthly rental rate received for the building (one)
                                    </div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['received_rental_rate_building'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Covered area of
                                            building </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['covered_area_building'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Annual value of the
                                        building Monthly rental rate x Covered area X 12 (three X four x 12)</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['annual_value_building'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">B. Annual value
                                            of land:-
                                            Monthly rental rate for residential land determined by the Executive Officer
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['residential_rate_land'] ?? 'NA' }}</p>
                                    </div>
                                </div>


                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">The coefficient
                                            relating to the rate of the tax on residential land as prescribed by the
                                            rules:-*
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['coefficient_land'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Monthly rent
                                            received for the land (one) x (two):- </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['rent_received_land'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Area of land:-
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['area_of_land'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Annual value of
                                            the building Monthly rental rate x Covered area X 12 (three X four x 12):-
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['calc_month_annual_value_building'] ?? 'NA' }}</p>
                                    </div>
                                </div>

                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">C. Total Annual
                                            Value (a) (five) (b) (five)</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['total_annual_value'] ?? 'NA' }}</p>
                                    </div>
                                </div>



                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div
                class="lg:border border-[#B1B6C6] rounded-[20px]  lg:p-3 mt-10 flex flex-col  items-center justify-center">
                <div class="mt-4 ">
                    <h4 class=" font-bold text-[22px] leading-[27px] px-[20px]">Fee Estimated</h4>
                    <div class="border border-[#B1B6C6] rounded-[20px] lg:w-[690px] md:w-[690px] w-full my-6  ">
                        <div>
                            {{-- <div class="flex justify-between items-center pt-[20px] px-[20px]   ">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">Holding Tax</p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">5000</p>
                            </div>
                            <div class="flex justify-between items-center px-[20px] py-[10px]   mt-4">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">Light Tax </p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">998</p>
                            </div>
                            <div class="flex justify-between items-center px-[20px] py-[10px]   mt-4">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">Water Tax</p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">100</p>
                            </div>

                            <div class="flex justify-between items-center px-[20px] py-[10px]   mt-4">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">
                                    PT_SOLID_Waste_USER-CHARGES</p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">75</p>
                            </div>

                            <div class="flex justify-between items-center px-[20px] py-[10px]  mt-4 ">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">Drainage Tax</p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">75</p>
                            </div>

                            <div class="flex justify-between items-center px-[20px] py-[10px]   mt-4">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">Parking Tax</p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">55</p>
                            </div>

                            <div class="flex justify-between items-center px-[20px] py-[10px]   mt-4 ">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">Latrine Tax</p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">10</p>
                            </div>

                            <div class="flex justify-between items-center px-[20px] py-[10px]  mt-4">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">PT_OWNERSHIP_EXCEMPTION
                                </p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">-10</p>
                            </div> --}}
                            <div class="flex justify-between items-center px-[20px] py-[10px]   mt-4">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">Property value</p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">
                                    {{ $charges['PropertyValue'] }} ₹</p>
                            </div>
                            <div class="flex justify-between items-center px-[20px] py-[10px]   mt-4">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">Deed Naming charge</p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">
                                    {{ $charges['deedCharge'] }} ₹</p>
                            </div>
                            <div class="bg-[#B1B6C6] h-[2px] w-full mt-4"></div>
                            <div class="flex justify-between items-center px-[20px] py-[10px]  my-[20px] ">
                                <p class=" font-medium text-[18px] leading-[30px] text-[#000000]">Total Amount</p>
                                <p class=" font-semibold text-[18px] leading-[30px] text-[#000000]">
                                    {{ $charges['TotalAmount'] }} ₹</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($property['status'] == 0)
                <div class="px-[30px] mt-4">
                    <!-- Your other content here -->
                    <button id="approveButton" class="bg-green-500 text-white py-2 px-4 rounded"
                        onclick="showApproveAlert({{ $property['id'] }},1,{{ $charges['TotalAmount'] }})">Approve</button>
                    <button id="rejectButton" class="bg-red-500 text-white py-2 px-4 rounded"
                        onclick="showRejectAlert({{ $property['id'] }},2)">Reject</button>
                </div>
            @endif
        </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function toggleMenu() {
            var menu = document.getElementById('menu');

            menu.classList.toggle('hidden');

        }
    </script>
    <script>
        function showApproveAlert(propertyId, status, charges) {
            Swal.fire({
                title: "Do you want Approve?",
                showCancelButton: true,
                confirmButtonText: "Approve",
                denyButtonText: `Don't save`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    return $.ajax({
                        url: '{{ route('property.status.change') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: propertyId,
                            status: status,
                            charges: charges,
                        },
                        success: (response) => {
                            if (response.success) {
                                Swal.fire(
                                    'Status!',
                                    'Application Approved successfully.',
                                    'success'
                                ).then(() => {
                                    // Optionally, reload the page or update the UI
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.message,
                                    'error'
                                );
                            }
                        },
                        error: (xhr, status, error) => {
                            Swal.showValidationMessage(`Request failed: ${xhr.responseText}`);
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        }
    </script>
    <script>
        function showRejectAlert(marriageId, status) {
            Swal.fire({
                title: "Do you want to reject ?",
                text: "Please provide a remark:",
                input: "textarea",
                // inputLabel: "Remark",
                inputPlaceholder: "Enter your remark here...",
                inputAttributes: {
                    autocapitalize: "off",
                    rows: 3
                },
                showCancelButton: true,
                confirmButtonText: "Reject",
                cancelButtonText: "Cancel",
                showLoaderOnConfirm: true,
                preConfirm: (remark) => {
                    if (!remark) {
                        Swal.showValidationMessage('Please enter a remark.');
                        return false;
                    }

                    return $.ajax({
                        url: '{{ route('property.status.change') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: marriageId,
                            status: status,
                            remark: remark
                        },
                        success: (response) => {
                            if (response.success) {
                                Swal.fire(
                                    'Status!',
                                    'Application Rejected successfully.',
                                    'success'
                                ).then(() => {
                                    // Optionally, reload the page or update the UI
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.message,
                                    'error'
                                );
                            }
                        },
                        error: (xhr, status, error) => {
                            Swal.showValidationMessage(`Request failed: ${xhr.responseText}`);
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
        }
    </script>
    <script>
        function showFileName() {
            var fileInput = document.querySelector('input[type="file"]');
            var fileName = document.getElementById('fileName');
            if (fileInput.files.length > 0) {
                fileName.textContent = 'Selected file: ' + fileInput.files[0].name;
            } else {
                fileName.textContent = '';
            }
        }
    </script>
