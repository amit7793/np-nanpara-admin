@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] md:px-[20px] px-[10px] py-[2rem]">
        <div class="lg:flex  \ lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
            <h2 class=" font-bold text-[31px] lg:text-[32px] leading-[40px] text-left text-[#000000]">Death
                Verification
            </h2>
            {{-- @if ($deathcertificate['status'] == 1)
                @if ($deathcertificate['payment_status'] == 0)
                    <div class="px-[30px] mt-4 lg:flex">
                        <b>Pay Value</b>: <b>{{ $deathcertificate['amount'] ?? 0 }}</b> ₹
                        <form action="{{ route('death.certificate.pay.slip') }}" method="post" id="myForm"
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
                                <input type="hidden" name="id" value="{{ $deathcertificate['id'] ?? 0 }}">
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
            @if ($deathcertificate['status'] == 0)
                <div class="px-[30px] mt-4">
                    <!-- Your other content here -->
                    <button id="approveButton" class="bg-green-500 text-white py-2 px-4 rounded"
                        onclick="showApproveAlert({{ $deathcertificate['id'] }},1)">Approve</button>
                    <button id="rejectButton" class="bg-red-500 text-white py-2 px-4 rounded"
                        onclick="showRejectAlert({{ $deathcertificate['id'] }},2)">Reject</button>
                </div>
            @endif
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    function toggleMenu() {
        var menu = document.getElementById('menu');

        menu.classList.toggle('hidden');

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
                    url: '{{ route('death.status.change') }}',
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
                    url: '{{ route('death.status.change') }}',
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
