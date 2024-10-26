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
        <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Trade License Category List</h2>
        <a href="{{ route('trade.category.add') }}" class="flex justify-end">
            <button class="bg-blue-500 text-white py-2 px-4 rounded">
                <i class="fas fa-plus"></i> Add
            </button>
        </a>
        <div class="border border-[#A0A0A0] rounded-[15px] py-[20px] mt-6">
            <table id="trades-table" class="display">

                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trades as $key => $trade)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $trade->name ?? 'NA' }}</td>
                            <td>{{ $trade->created_at ? \Carbon\Carbon::parse($trade->created_at)->format('d F Y') : 'NA' }}
                            </td>
                            <td>
                                <a href="{{ route('trade.tradeCategoryEdit', $trade->id) }}" class="mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#"
                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{ $trade->id }}').submit(); }">
                                    <i class="fas fa-trash"></i>
                                </a>

                                <form id="delete-form-{{ $trade->id }}"
                                    action="{{ route('trade.category.delete', ['id' => $trade->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
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
