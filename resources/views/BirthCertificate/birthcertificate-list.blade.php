@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] md:px-[20px] px-[10px] py-[2rem]">
        <div class="lg:flex  \ lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
            <h2 class=" font-bold text-[31px] lg:text-[32px] leading-[40px] text-left text-[#000000]">Birth
                Verification
            </h2>
            {{-- @if ($birthcertificate['status'] == 1)
                @if ($birthcertificate['payment_status'] == 0)
                    <div class="px-[30px] mt-4 lg:flex">
                        <b>Pay Value</b>: <b>{{ $birthcertificate['amount'] ?? 0 }}</b> ₹
                        <form action="{{ route('birth.certificate.pay.slip') }}" method="post" id="myForm"
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
                                <input type="hidden" name="id" value="{{ $birthcertificate['id'] ?? 0 }}">
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
            @if ($birthcertificate['status'] == 0)
                <div class="px-[30px] mt-4">
                    <!-- Your other content here -->
                    <button id="approveButton" class="bg-green-500 text-white py-2 px-4 rounded"
                        onclick="showApproveAlert({{ $birthcertificate['id'] }},1)">Approve</button>
                    <button id="rejectButton" class="bg-red-500 text-white py-2 px-4 rounded"
                        onclick="showRejectAlert({{ $birthcertificate['id'] }},2)">Reject</button>
                </div>
            @endif
        </div>
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
<script>
    function showApproveAlert(propertyId, status) {
        Swal.fire({
            title: "Do you want Approve?",
            showCancelButton: true,
            confirmButtonText: "Approve",
            denyButtonText: `Don't save`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                return $.ajax({
                    url: '{{ route('birth.status.change') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: propertyId,
                        status: status,
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
                    url: '{{ route('birth.status.change') }}',
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
