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
        <div class="top flex justify-between items-center">
            <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Property Bill Generation</h2>
            <a href="{{ route('export-exportPropertyBill') }}">
                <button
                    class="bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300">
                    Import Excel
                </button>
            </a>
        </div>

        <div class="border border-[#A0A0A0] rounded-[15px] py-[20px] mt-6">
            <table id="trades-table" class="display">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Applicant's Name</th>
                        <th>Property Type</th>
                        <th>Applicant's Number</th>
                        <th>Aplication Status</th>
                        <th>Payment Status</th>
                        <th>View Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ isset($data->created_at) ? $data->created_at->format('d-m-Y') : 'NA' }}</td>
                            <td>{{ $data->name_chairman_owner ?? 'NA' }}</td>
                            <td>{{ $data->property ?? 'NA' }}</td>
                            <td>{{ $data->id ?? 'NA' }}</td>
                            @if ($data->status == 0)
                                <td style="color: orange;">{{ 'Pending' }}</td>
                            @elseif($data->status == 1)
                                <td style="color: green;">{{ 'Approved' }}</td>
                            @else
                                <td style="color: red;">{{ 'Rejected' }}</td>
                            @endif
                            @if ($data->payment_status == 0)
                                <td style="color: orange;">{{ 'Due' }}</td>
                            @elseif($data->payment_status == 1)
                                <td style="color: green;">{{ 'Paid' }}</td>
                            @endif
                            <td><a href="{{ route('admin.propertyTaxBillView', ['id' => $data->id]) }}">
                                    <i class="fas fa-eye"></i>
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
