<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>
@extends('layouts.admin')
@section('content')
    <div class="ml-80 mt-10 r-0 w-3/4">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <th>Treatment</th>
                    <th>Jumlah Sepatu</th>
                    <th>Metode Pembayaran</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'tanggalBooking',
                        name: 'tanggalBooking'
                    },
                    {
                        data: 'treatmentType',
                        name: 'treatmentType',
                        render: function(data, type, full, meta) {

                            var treatmentLabels = {
                                1: 'Repair',
                                2: 'Repaint',
                                3: 'Unyellowing'
                            };

                            return treatmentLabels[data] || data;
                        }
                    },
                    {
                        data: 'jumlah_sepatu',
                        name: 'jumlah_sepatu'
                    },
                    {
                        data: 'metodePembayaran',
                        name: 'metodePembayaran',
                        render: function(data, type, full, meta) {

                            var metodePembayaranLabel = {
                                1: 'COD',
                                2: 'Virtual Account',
                                3: 'Transfer Bank',
                                4: 'Dana',
                                5: 'Gopay'
                            };

                            return metodePembayaranLabel[data] || data;
                        }
                    },
                    {
                        data: 'jumlahPembayaran',
                        name: 'jumlahPembayaran'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, full, meta) {

                            var statusLabel = {
                                1: 'Menunggu Pembayaran',
                                2: 'Menunggu Konfirmasi',
                                3: 'Sedang Diproses',
                                4: 'Selesai',
                                5: 'Sudah diambil'
                            };

                            return statusLabel[data] || data;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    }
                ]
            });
        });
    </script>
@endsection
