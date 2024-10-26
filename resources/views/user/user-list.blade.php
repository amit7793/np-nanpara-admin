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
        <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">User Form List</h2>
        <div class="border border-[#A0A0A0] rounded-[15px] py-[20px] mt-6">
            <table id="trades-table" class="display">

                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone NO.</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $key => $users)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $users->name ?? 'NA' }}</td>
                            <td>{{ $users->email ?? 'NA' }}</td>
                            <td>{{ $users->mobile ?? 'NA' }}</td>
                            <td>
                                <a href="{{ route('user.view', $users->id) }}">
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
