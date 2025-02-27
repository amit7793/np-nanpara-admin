@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] md:px-[20px] px-[10px] py-[2rem]">
        <div class="lg:flex  \ lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
            <h2 class=" font-bold text-[31px] lg:text-[32px] leading-[40px] text-left text-[#000000]">Residentials
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
                                <h4 class=" font-semibold text-[20px] leading-[25px]">Residentials Property details</h4>
                                <p class=" font-medium text-[18px] leading-[22px] pt-3"></p>
                            </div>

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
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">B Description of
                                        building or land:-
                                        Internal dimensions (in square feet) of all rooms and all covered verandahs <span
                                            class="text-red-600">*</span></div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['res_internal_dimenssion_room'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Internal dimensions (in square feet) of all balconies, corridors, kitchens and
                                            store rooms</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['res_internal_dimenssion_balconies'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Internal dimensions
                                        of all garages (in square feet) </div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['res_internal_dimenssion_garages'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">C depth. Floor
                                            Area of ​​Building: B (One)+ 1/2B (Two)+1/4 B (Three) </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['res_floor_area_building'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">80% of the area
                                        covered {a (a) X 80% } <span class="text-red-600">*</span></div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['res_area_covered'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Location details :-
                                            A-The building or land is situated:-
                                            On road width more than 24 metres</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['more_24_meter'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">On road width more
                                        than 12 meters or less than 24 meter</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['more_12_meter'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            On road width more than 9 meters less than 12 meters</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['more_9_meter'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">On roads up to 9
                                        meters wide</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['wide_9_meter'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            B-Nature of building construction:-
                                            R. C. C. Roof or R. B. concrete building with roof</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['res_building_roof'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Other concrete
                                        buildings</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['res_concrete_building'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                            Kachha building means all other buildings which are not covered by (one) and two
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['broken_building'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                        C-The land (if no building is constructed on it) is located:-
                                        On road width more than 24 metres
                                    </div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['res_land_located'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">On road width
                                            more than 12 meters or less than 24 meter </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['res_land_more_12_meter'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">On road width more
                                        than 9 meters less than 12 meters</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $property['res_land_more_9_meter'] ?? 'NA' }}</p>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">On roads up to 9
                                            meters wide
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['res_land_wide_9_meter'] ?? 'NA' }}</p>
                                    </div>
                                </div>


                            </div>
                            <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Whether the
                                            building is owner-occupied or on rent</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['res_building_owner_rent'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Year of
                                            construction</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['construction_year'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Calculation of
                                            annual value:-
                                            The minimum monthly rental rate (per square foot) fixed for the building by the
                                            Executive Officer</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['res_rate_square'] ?? 'NA' }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">The minimum
                                            monthly rental rate fixed for the building by the Executive Officer</div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $property['res_monthly_rate'] ?? 'NA' }}</p>
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
