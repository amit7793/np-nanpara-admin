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
    </style>

    <div class="xl:px-4 px-2 py-4 mx-8">
        <div class="page-header">
            <h2>Applications List</h2>
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
                        <th>Original Price</th>
                        <th>User Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($advertisements as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ $data->advertisement->image ?? '' }}" alt="IMG"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; display: block;">
                            </td>
                            <td>{{ $data->advertisement->mobile ?? 'N/A' }}</td>
                            <td>{{ $data->advertisement->height ?? 'N/A' }} X {{ $data->advertisement->width ?? 'N/A' }}
                            </td>
                            <td>{{ $data->advertisement->adderss ?? 'N/A' }}</td>
                            <td>{{ $data->advertisement->city ?? 'N/A' }}</td>
                            <td>{{ $data->advertisement->pincode ?? 'N/A' }}</td>
                            <td>{{ '₹ ' . ($data->advertisement->price ?? 'N/A') }}</td>
                            <td>{{ '₹ ' . ($data->user_price ?? 'N/A') }}</td>
                            <td>
                                <a href="{{ route('admin.applicationView', ['id' => $data->id]) }}">
                                    👁️
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
