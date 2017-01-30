@extends('layouts/kelurahan')
@section('content')
    <section class="content">
        <div clas="row">
            <div class="col-md-12">
                <table class="table table-bordered compact" cellspacing="0" id="kelurahan-table">
                    <thead>
                    <tr>
                        <th>Kelurahan</th>
                        <th>Lurah</th>
                        <th>Telephone</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
       $('#kelurahan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/kelurahan/view-data') }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'lurah', name: 'lurah' },
                    { data: 'phone', name: 'phone' },
                    { data: 'address', name: 'address' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
    });
</script>
@endpush