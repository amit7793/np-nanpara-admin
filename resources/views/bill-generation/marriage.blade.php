@extends('include.main')

@section('content')
    <style>
        .dataTables_length {
            padding-left: 20px;
        }

        .dataTables_filter {
            padding-right: 20px;
        }
    </style>
    <div class="xl:px-[4rem] px-[10px] py-[1rem]">
        <div class="top flex justify-between items-center w-full">
            <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Marriage Certificate Bill Generation</h2>
            <div class="ml-auto">
                <a href="{{ route('export-exportMarriageBill') }}">
                    <button
                        class="bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300">
                        Import Excel
                    </button>
                </a>
            </div>
        </div>
        <div class="border border-[#A0A0A0] rounded-[15px] py-[20px] mt-6 ">
            <table id="trades-table" class="display">

                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Applicant's Number</th>
                        <th>Applicant's Name</th>
                        <th>Application Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marriage as $key => $marriagedata)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $marriagedata->created_at ? \Carbon\Carbon::parse($marriagedata->created_at)->format('d F Y') : 'NA' }}
                            </td>
                            <td>{{ $marriagedata->id ?? 'NA' }}</td>
                            <td>{{ $marriagedata->bride_name ?? 'NA' }}</td>
                            <td>
                                @if ($marriagedata->status == 0)
                                    <span style="color: orange;">{{ 'Waiting' }}</span>
                                @elseif($marriagedata->status == 1)
                                    <span style="color: green;">{{ 'Approve' }}</span>
                                @else
                                    <span style="color: red;">{{ 'Reject' }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($marriagedata->payment_status == 0)
                                    <span style="color: orange;">{{ 'Due' }}</span>
                                @elseif($marriagedata->payment_status == 1)
                                    <span style="color: green;">{{ 'Paid' }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.marriageBillView', ['id' => $marriagedata['id']]) }}">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#trades-table').DataTable();
        });
    </script>
@endsection
