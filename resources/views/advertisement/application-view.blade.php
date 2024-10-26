@extends('include.main')
@section('content')
    <div class="xl:px-[4rem] md:px-[20px] px-[10px] py-[2rem]">
        <div class="lg:flex lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
            <h2 class="font-bold text-[31px] lg:text-[32px] leading-[40px] text-left text-[#000000]">
                Advertisement Verification
            </h2>
        </div>
        <div class="border border-[#B1B6C6] rounded-[20px] mt-10">
            <div class="border-b border-[#B1B6C6] pb-[100px]">
                <div class="lg:grid grid-cols-1 gap-10 px-[10px] lg:px-[40px] py-[20px]">
                    <div>
                        <div class="lg:flex md:flex justify-between items-center">
                            <div>
                                <h4 class="font-semibold text-[20px] leading-[25px]">Advertisement Details</h4>
                                <p class="font-medium text-[18px] leading-[22px] pt-3"></p>
                            </div>
                        </div>
                        <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                            <div class="mt-5">
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px]">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000]">Advertisement
                                            Image</div>
                                        <img src="{{ $advertisements->advertisement->image ?? 'NA' }}"
                                            alt="Advertisement Image" class="w-40 h-28" style="border-radius: 14px;" />
                                    </div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000]">Price</div>
                                        <p class="font-medium text-[18px] leading-[22px]">
                                            {{ '₹' . $advertisements->advertisement->price ?? 'NA' }}</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000]">Mobile</div>
                                        <p class="font-medium text-[18px] leading-[22px]">
                                            {{ $advertisements->advertisement->mobile ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000]">Address</div>
                                        <p class="font-medium text-[18px] leading-[22px]">
                                            {{ $advertisements->advertisement->adderss ?? 'NA' }}</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000]">City</div>
                                        <p class="font-medium text-[18px] leading-[22px]">
                                            {{ $advertisements->advertisement->city ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000]">Pincode</div>
                                        <p class="font-medium text-[18px] leading-[22px]">
                                            {{ $advertisements->advertisement->pincode ?? 'NA' }}</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000]">User Price</div>
                                        <p class="font-medium text-[18px] leading-[22px]">
                                            {{ $advertisements->user_price ?? 'NA' }}</p>
                                    </div>
                                    <div>
                                        <div class="font-normal text-[15px] leading-[30px] text-[#000000]">Status</div>
                                        <p class="font-medium text-[18px] leading-[22px]">
                                            @if ($advertisements->status == 0)
                                                Pending
                                            @elseif ($advertisements->status == 1)
                                                Approved
                                            @elseif ($advertisements->status == 2)
                                                Rejected
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                    @if ($advertisements->status == 1)
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000]">Chalan Number
                                            </div>
                                            <p class="font-medium text-[18px] leading-[22px]">
                                                {{ $advertisements->chalan_number ?? 'NA' }}</p>
                                        </div>
                                    @endif
                                </div>
                                @if ($advertisements->status == 2)
                                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000]">Remark</div>
                                            <p class="font-medium text-[18px] leading-[22px]">
                                                {{ $advertisements->remark ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if ($advertisements->status == 1)
                                    <div class="grid grid-cols-2 lg:px-[30px] px-[10px] mt-4">
                                        <div>
                                            <div class="font-normal text-[15px] leading-[30px] text-[#000000]">Amount</div>
                                            <p class="font-medium text-[18px] leading-[22px]">
                                                {{ $advertisements->advertisement->amount ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($advertisements->status == 0)
                <div class="px-[30px] mt-4">
                    <button id="approveButton" class="bg-green-500 text-white py-2 px-4 rounded"
                        onclick="showApproveAlert({{ $advertisements->id }}, 1)">Approve</button>
                    <button id="rejectButton" class="bg-red-500 text-white py-2 px-4 rounded"
                        onclick="showRejectAlert({{ $advertisements->id }}, 2)">Reject</button>
                </div>
            @endif
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showApproveAlert(propertyId) {
        Swal.fire({
            title: "Do you want to approve?",
            showCancelButton: true,
            confirmButtonText: "Approve",
            denyButtonText: `Don't save`
        }).then((result) => {
            if (result.isConfirmed) {
                return $.ajax({
                    url: '{{ route('advertisement.approve') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: propertyId,
                    },
                    success: (response) => {
                        if (response.success) {
                            Swal.fire(
                                'Status!',
                                'Application Approved successfully. Chalan Number: ' + response
                                .chalan_number,
                                'success'
                            ).then(() => {
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

    function showRejectAlert(propertyId) {
        Swal.fire({
            title: "Do you want to reject?",
            text: "Please provide a remark:",
            input: "textarea",
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
                    url: '{{ route('advertisement.reject') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: propertyId,
                        remark: remark
                    },
                    success: (response) => {
                        if (response.success) {
                            Swal.fire(
                                'Status!',
                                'Application Rejected successfully.',
                                'success'
                            ).then(() => {
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
