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
        <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Death Certificate</h2>
        <div class="border border-[#A0A0A0] rounded-[15px] py-[20px] mt-6">
            <table id="trades-table" class="display">

                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Applicant's Name</th>
                        <th>Applicant's Number</th>
                        <th>Application Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deathcertificate as $key => $deathcertificate_list)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $deathcertificate_list->created_at ? \Carbon\Carbon::parse($deathcertificate_list->created_at)->format('d F Y') : 'NA' }}
                            </td>
                            <td>{{ $deathcertificate_list->deceased_name ?? 'NA' }}</td>
                            <td>{{ $deathcertificate_list->id ?? 'NA' }}</td>
                            <td>
                                @if ($deathcertificate_list->status == 0)
                                    <span style="color: orange;">{{ 'Waiting' }}</span>
                                @elseif($deathcertificate_list->status == 1)
                                    <span style="color: green;">{{ 'Approve' }}</span>
                                @else
                                    <span style="color: red;">{{ 'Reject' }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($deathcertificate_list->payment_status == 0)
                                    <span style="color: orange;">{{ 'Due' }}</span>
                                @elseif($deathcertificate_list->payment_status == 1)
                                    <span style="color: green;">{{ 'Paid' }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('death.certificate.view', $deathcertificate_list->id) }}">
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
