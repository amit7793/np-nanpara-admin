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
        <h2 class="font-bold text-[32px] leading-[40px] text-[#000000]">Trade License Listing</h2>
        <div class="border border-[#A0A0A0] rounded-[15px] py-[20px] mt-6">
            <table id="trades-table" class="display">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Price</th>
                        {{-- <th>Date</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trades as $key => $trade)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $trade->categoryDetails->name ?? 'NA' }}</td>
                            <td>{{ $trade->sub_category ?? 'NA' }}</td>
                            <td>{{ $trade->price ?? 'NA' }}</td>
                            {{-- <td>{{ $trade->created_at ? \Carbon\Carbon::parse($trade->created_at)->format('d F Y') : 'NA' }}
                            </td> --}}
                            <td>
                                <a href="{{ route('trade.tradeListingEdit', ['id' => $trade->id]) }}" class="mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#"
                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this subcategory?')) { document.getElementById('delete-form-{{ $trade->id }}').submit(); }">
                                    <i class="fas fa-trash"></i>
                                </a>

                                <form id="delete-form-{{ $trade->id }}"
                                    action="{{ route('trade.subcategory.delete', ['id' => $trade->id]) }}" method="POST"
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
