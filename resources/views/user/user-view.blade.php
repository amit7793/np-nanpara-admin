@extends('include.main')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">
        <div class="bg-white shadow-lg rounded-3xl border border-gray-300 p-8 lg:p-12 max-w-md w-full">
            <!-- Header Section -->
            <div class="flex flex-col items-center justify-center mb-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">User Details</h2>
                {{-- <span class="inline-block bg-yellow-200 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">
                    Pending
                </span> --}}
            </div>

            <!-- User Details Section -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Name</label>
                    <p class="mt-1 text-lg font-medium text-gray-800">{{ $user->name ?? 'NA' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Email</label>
                    <p class="mt-1 text-lg font-medium text-gray-800">{{ $user->email ?? 'NA' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Phone No</label>
                    <p class="mt-1 text-lg font-medium text-gray-800">{{ $user->mobile ?? 'NA' }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            {{-- <div class="mt-8 flex justify-center space-x-4">
                <button id="approveButton"
                    class="flex items-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-full transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-400"
                    onclick="confirmAction({{ $user->id }}, 'approve')">
                    <!-- Approve Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Approve
                </button>
                <button id="rejectButton"
                    class="flex items-center bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-full transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-400"
                    onclick="confirmAction({{ $user->id }}, 'reject')">
                    <!-- Reject Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Reject
                </button>
            </div> --}}
        </div>
    </div>
@endsection


{{-- @extends('include.main')
@section('content')
    <div class="border border-[#B1B6C6] rounded-[20px] mt-10    lg:px-[4rem] px-[10px]  ">
        <div class=" border-b border-[#B1B6C6] pb-[100px]">

            <div class="lg:flex lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
                <h2 class=" font-bold text-[29px] lg:text-[32px] leading-[40px] text-left text-[#000000]">User Approval
                </h2>
            </div>


            <div class="lg:grid grid-cols-2 gap-6 py-[20px]">
                <div>
                    <div class="lg:flex md:flex justify-between items-center">
                        <div>
                            <h4 class=" font-semibold text-[20px] leading-[25px]">User Details</h4>
                        </div>
                    </div>

                    <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-5 w-full h-full">
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $user->name ?? 'NA' }}</p>
                            </div>
                            <div>
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Email</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $user->email ?? 'NA' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Phone No</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $user->mobile ?? 'NA' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-[30px] mt-4">
            <!-- Your other content here -->
            <button id="approveButton" class="bg-green-500 text-white py-2 px-4 rounded" onclick="showApproveAlert({{ $user['id']  }},0)">Approve</button>
            <button id="rejectButton" class="bg-red-500 text-white py-2 px-4 rounded" onclick="showApproveAlert({{ $user['id'] }},1)">Reject</button>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showApproveAlert(marriageId,status) {
        Swal.fire({
            title: "Status change",
            text: "Please provide a remark:",
            input: "textarea",
            inputLabel: "Remark",
            inputPlaceholder: "Enter your remark here...",
            inputAttributes: {
                autocapitalize: "off",
                rows: 3
            },
            showCancelButton: true,
            confirmButtonText: "Change",
            cancelButtonText: "Cancel",
            showLoaderOnConfirm: true,
            preConfirm: (remark) => {
                if (!remark) {
                    Swal.showValidationMessage('Please enter a remark.');
                    return false;
                }

                return $.ajax({
                    url: '{{ route("user.status.change") }}',
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
                                'Status changed successfully.',
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
</script> --}}
