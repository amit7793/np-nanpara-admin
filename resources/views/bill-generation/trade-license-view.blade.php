@extends('include.main')
@section('content')
    <div class="border border-[#B1B6C6] rounded-[20px] mt-10    lg:px-[4rem] px-[10px]  ">
        <div class=" border-b border-[#B1B6C6] pb-[100px]">
            <div class="lg:flex lg:flex-row lg:items-center justify-between gap-4 flex flex-col md:flex md:flex-row">
                <div class="top flex justify-between items-center w-full">
                    <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Trade License Bill Generation</h2>
                    <div class="ml-auto">
                        <a href="{{ route('export-exportTradeViewBill', ['id' => $trades->id]) }}">
                            <button
                                class="bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300">
                                Import Excel
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="lg:grid grid-cols-2 gap-6 py-[20px]">
                <div>
                    <div class="lg:flex md:flex justify-between items-center">
                        <div>
                            <h4 class=" font-semibold text-[20px] leading-[25px]">Trade Details</h4>
                        </div>
                    </div>
                    <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-5 w-full h-full">
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Name of Trade<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->name ?? 'NA' }}</p>
                            </div>
                            <div>
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Trade Commencement
                                        Date</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $trades->commencement_date ?? 'NA' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Trade Period</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->trade_period ?? 'NA' }}</p>
                            </div>
                            <div>
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Trade GST No.</div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->trade_gst_no ?? 'NA' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">
                                    TL_NEW_TRADE_PURPOSE_LABEL</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->trade_purpose ?? 'NA' }}</p>
                            </div>
                            <div>
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Trade License Type
                                    </div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->license_type ?? 'NA' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:mt-0 md:mt-10  mt-10 ">
                    <div class="lg:flex md:flex justify-between items-center">
                        <div>
                            <h4 class=" font-semibold text-[20px] leading-[25px]">Trade Location Details</h4>
                        </div>
                    </div>
                    <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">City<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->city ?? 'NA' }}</p>
                            </div>
                            <div>
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Door/House
                                        Number<span class="text-red-600">*</span></div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->door ?? 'NA' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Building /Colony
                                    Name<span class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->colony_name ?? 'NA' }}</p>
                            </div>
                            <div>
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Street Name<span
                                            class="text-red-600">*</span></div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->state_name ?? 'NA' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Village <span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->village ?? 'NA' }}</p>
                            </div>
                            <div>
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Pin code <span
                                            class="text-red-600">*</span></div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->pin_code ?? 'NA' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Electricity
                                    Connection Number</div>
                                <p class=" font-medium  text-[18px] leading-[22px]">{{ $trades->collection_name ?? 'NA' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-20">
                    <div class="lg:flex md:flex justify-between items-center">
                        <div>
                            <h4 class=" font-semibold text-[20px] leading-[25px]">Owner Details</h4>
                        </div>
                    </div>
                    <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Type OF Ownership<span
                                        class="text-red-600">*</span></div>
                                <p class=" font-medium  text-[18px] leading-[22px]">
                                    {{ $trades->type_of_ownership ?? 'NA' }}</p>
                            </div>
                            <div>
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Type OF Subownership
                                        <span class="text-red-600">*</span>
                                    </div>
                                    <p class=" font-medium  text-[18px] leading-[22px]">
                                        {{ $trades->type_of_sub_ownership ?? 'NA' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-20">
                    <div class="lg:flex md:flex justify-between items-center">
                        <div>
                            <h4 class=" font-semibold text-[20px] leading-[25px]">Required Document</h4>
                        </div>
                    </div>
                    <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px]">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Owners ID Proof<span
                                        class="text-red-600">*</span></div>
                                <div class="lg:flex md:flex gap-4 items-center pt-3">
                                    <img src="{{ asset('admin-assets/images/pdf.png') }}" />
                                    <div>
                                        @if (!empty($trades['ownership_id_proof_img']))
                                            <a href="{{ $trades['ownership_id_proof_img'] ?? 'NA' }}" target="_blank"
                                                class="font-bold text-[15px] leading-[28px] text-[#000000]">
                                                View PDF →
                                            </a>
                                        @else
                                            <a href="" class="font-bold text-[15px] leading-[28px] text-[#000000]">
                                                View PDF →
                                            </a>
                                        @endif
                                        <p class=" font-medium text-[14px] text-[#CFC7C0] leading-[22px]">
                                            {{ $trades['ownership_id_proof'] ?? 'NA' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Ownership
                                        Proof<span class="text-red-600">*</span></div>
                                    <div class="lg:flex md:flex gap-4 items-center pt-3">
                                        <img src="{{ asset('admin-assets/images/pdf.png') }}" />
                                        <div>
                                            @if (!empty($trades['ownership_proof_img']))
                                                <a href="{{ $trades['ownership_proof_img'] ?? 'NA' }}" target="_blank"
                                                    class="font-bold text-[15px] leading-[28px] text-[#000000]">
                                                    View PDF →
                                                </a>
                                            @else
                                                <a href=""
                                                    class="font-bold text-[15px] leading-[28px] text-[#000000]">
                                                    View PDF →
                                                </a>
                                            @endif
                                            <p class=" font-medium  text-[14px] text-[#CFC7C0] leading-[22px]">
                                                {{ $trades['ownership_proof'] ?? 'NA' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 md:grid flex flex-col gap-5 lg:px-[30px] px-[10px] mt-4">
                            <div>
                                <div class="font-normal text-[15px] leading-[30px] text-[#000000] ">Owners Photo<span
                                        class="text-red-600">*</span></div>
                                <div class="lg:flex md:flex  gap-4 items-center pt-3">
                                    <img src="{{ asset('admin-assets/images/pdf.png') }}" />
                                    <div>
                                        @if (!empty($trades['ownership_photu']))
                                            <a href="{{ $trades['ownership_photu'] ?? 'NA' }}" target="_blank"
                                                class="font-bold text-[15px] leading-[28px] text-[#000000]">
                                                View PDF →
                                            </a>
                                        @else
                                            <a href="" class="font-bold text-[15px] leading-[28px] text-[#000000]">
                                                View PDF →
                                            </a>
                                        @endif
                                        <p class=" font-medium  text-[14px] text-[#CFC7C0] leading-[22px]">
                                            {{ $trades['ownership'] ?? 'NA' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                <div class="xl:px-[4rem] px-[10px] py-[1rem]">
                    <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Trade License Owner Details</h2>
                    <table id="trades-table" class="display">
                        <thead>
                            <tr>
                                <th>S. NO</th>
                                <th>Mobile No.</th>
                                <th>Name</th>
                                <th>Father/Husbands Name</th>
                                <th>Relationship</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Email</th>
                                <th>Pan No</th>
                                <th>Address</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tradeOwners as $key => $tradeOwner)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tradeOwner->mobile_no ?? 'NA' }}</td>
                                    <td>{{ $tradeOwner->name ?? 'NA' }}</td>
                                    <td>{{ $tradeOwner->father_name ?? 'NA' }}</td>
                                    <td>{{ $tradeOwner->relationship ?? 'NA' }}</td>
                                    <td>{{ $tradeOwner->gender ?? 'NA' }}</td>
                                    <td>{{ $tradeOwner->dob ?? 'NA' }}</td>
                                    <td>{{ $tradeOwner->email ?? 'NA' }}</td>
                                    <td>{{ $tradeOwner->pan_no ?? 'NA' }}</td>
                                    <td>{{ $tradeOwner->address ?? 'NA' }}</td>
                                    <td>{{ $tradeOwner->category ?? 'NA' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="border border-[#F26F00] bg-[#FFF5EC] rounded-[15px] py-[40px] mt-7 w-full h-full">
                <div class="xl:px-[4rem] px-[10px] py-[1rem]">
                    <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Trade License Unit Details</h2>
                    <table id="trades-table" class="display">
                        <thead>
                            <tr>
                                <th>SO. NO</th>
                                <th>Trade Type</th>
                                <th>Trade Sub Type</th>
                                <th>UOM</th>
                                <th>UOM Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tradeUnits as $key => $tradeUnit)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tradeUnit->trade_type ?? 'NA' }}</td>
                                    <td>{{ $tradeUnit->trade_subType ?? 'NA' }}</td>
                                    <td>{{ $tradeUnit->uom ?? 'NA' }}</td>
                                    <td>{{ $tradeUnit->uom_value ?? 'NA' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
