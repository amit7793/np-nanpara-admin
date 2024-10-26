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
        <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Complaints</h2>
        <div class="border border-[#A0A0A0] rounded-[15px] py-[20px] mt-6">
            <table id="trades-table" class="display">

                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>User Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>complain</th>
                        <th>Date</th>
                        <th>User Query</th>
                        <th>View Details</th>
                    </tr>
                </thead>
                {{-- @dd($birthcertificate[0]) --}}
                <tbody>
                    @foreach ($complains as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->name ?? 'NA' }}</td>
                            <td>{{ $data->mobile_number ?? 'NA' }}</td>
                            <td>{{ $data->email_id ?? 'NA' }}</td>
                            <td>{{ $data->complain ?? 'NA' }}</td>
                            <td>{{ isset($data->created_at) ? $data->created_at->format('d-m-Y') : 'NA' }}</td>
                            <td>{{ $data->select_query ?? 'NA' }}</td>
                            <td><a href="{{ route('complains.chat', ['id' => $data->id]) }}">
                                    <i class="fas fa-eye"></i>
                                </a></td>
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
