@extends('include.main')

@section('content')
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #ccc;
        }

        .page-header h2 {
            font-size: 24px;
            color: #333;
            margin: 0;
        }

        .add-btn {
            background-color: #007bff;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .table-container {
            margin-top: 1rem;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
        }

        .table-actions {
            text-align: center;
        }

        .table-actions button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 0.3rem 0.6rem;
            border-radius: 3px;
            cursor: pointer;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 25px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 2.5px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #8A2BE2;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
    </style>

    <div class="xl:px-4 px-2 py-4 mx-8">
        <div class="page-header">
            <h2>Advertisement List</h2>
            <a href="{{ route('admin.addAdvertisement') }}">
                <button class="add-btn">
                    <i class="fas fa-plus"></i> Add New
                </button>
            </a>
        </div>

        <div class="table-container">
            <table id="trades-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Image</th>
                        <th>Mobile</th>
                        <th>Height X Width</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Price</th>
                        <th>Publish</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($advertisement as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ $data->image ?? '' }}" alt="IMG"
                                    style="width: 80px; height: 80px; object-fit: cover; border-radius: 9px; display: block;">
                            </td>
                            <td>{{ $data->mobile ?? 'N/A' }}</td>
                            <td>{{ $data->height ?? 'N/A' }} X {{ $data->width ?? 'N/A' }}</td>
                            <td>{{ $data->adderss ?? 'N/A' }}</td>
                            <td>{{ $data->city ?? 'N/A' }}</td>
                            <td>{{ $data->pincode ?? 'N/A' }}</td>
                            <td>{{ $data->price ?? 'N/A' }}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="publishToggle" data-id="{{ $data->id }}"
                                        {{ $data->status == 1 ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
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
    <script>
        $(document).ready(function() {
            $('.publishToggle').on('change', function() {
                var advertisementId = $(this).data('id');
                var status = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route('admin.toggleAdvertisementStatus') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: advertisementId,
                        status: status
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Status updated successfully!');
                        } else {
                            alert('Failed to update status.');
                        }
                    },
                    error: function(xhr) {
                        alert('Error updating status.');
                    }
                });
            });
        });
    </script>
@endsection
