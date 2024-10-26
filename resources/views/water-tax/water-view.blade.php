@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] md:px-[20px] px-[10px] py-[2rem]">
        <div class="lg:flex  \ lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
            <h2 class=" font-bold text-[31px] lg:text-[32px] leading-[40px] text-left text-[#000000]">Water Tax</h2>
        </div>

        <div class="border border-[#B1B6C6] rounded-[20px] mt-10 ">
            <div class=" border-b border-[#B1B6C6] pb-[100px]">
                <div class="lg:grid grid-cols-1 gap-10 px-[10px] lg:px-[40px] py-[20px]">
                    <div>
                        <div class="lg:flex md:flex justify-between items-center">
                            <div>
                                <h4 class=" font-semibold text-[20px] leading-[25px]">Water Tax details</h4>
                                <p class=" font-medium text-[18px] leading-[22px] pt-3"></p>
                            </div>

                        </div>
                        <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                            <div class="mt-5">
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Emitra Code
                                        </div>
                                        <p class=" font-medium  text-[18px] leading-[22px]">
                                            {{ $data->emitra_12_code ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Mobile
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $data->mobile ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Email
                                            </div>
                                            <p class=" font-medium  text-[18px] leading-[22px]">
                                                {{ $data->email ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($data['status'] == 0)
                <div class="px-[30px] mt-4">
                    <button id="approveButton" class="bg-green-500 text-white py-2 px-4 rounded"
                        onclick="showApproveAlert({{ $data['id'] }},1)">Approve</button>
                    <button id="rejectButton" class="bg-red-500 text-white py-2 px-4 rounded"
                        onclick="showRejectAlert({{ $data['id'] }},2)">Reject</button>
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
                    url: '{{ route('waterStatus') }}',
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
                    url: '{{ route('waterStatus') }}',
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
