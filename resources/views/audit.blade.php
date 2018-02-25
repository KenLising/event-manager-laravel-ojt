
@extends('layouts.app')
@push('title') 
  AUDIT TRAIL
@endpush

@push('sidebar')
  @include('layouts.sidebar')
@endpush

@section('content')
<ul class="breadcrumb">
  <div class="container-fluid">
    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
    <li class="breadcrumb-item active">Audit</li>
    <form action="" method="get">
      <button id="print" class="btn btn-primary btn-sm float-right" style="width: 150px; margin-left: 1%; margin-right: 1%;">Print</button>
    </form>
  </div>
</ul>

	<div class="container" style="padding-top: 3%;">
		
		<div class="col-md-12" style="width: 100%;">
          <div class="card">
          	
            <div class="card-close">
          	  
          	</div>
      			
            <div class="card-header d-flex align-items-center">
      			  
      			</div>

            <div class="card-body">
              <div class="table-responsive">
                <table id="mytable" class="table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Action</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
	</div>

@endsection

@push('scripts')
<script type="text/javascript">
  $(function() {
          var table = $('#mytable').DataTable({
             dom: 'Btpi',
             processing: true,
             serverSide: true,
             colReorder: true,
             responsive: true,
             // lengthChange: false,
             buttons: [
                { extend: 'print', className: 'd-none', title:'Audit Trail', exportOptions:{ columns:[0, 1, 2, 3]} },
                { extend: 'excel', className: 'd-none', title:'Audit Trail', exportOptions:{ columns:[0, 1, 2, 3] } },
                'pageLength',
             ],
             columnDefs: [
                 { "width": "20%", "targets": 0 },
                 { "width": "15%", "targets": 1 },
                 { "width": "45%", "targets": 2 },
                 { "width": "20%", "targets": 3 }
             ],
             ajax: "{{ route('admin.audit.api') }}",

             columns: [
               {data: 'user', name: 'user'},
               {data: 'role', name: 'role'},
               {data: 'description', name: 'description'},
               {data: 'time', name: 'time'},
             ]
         });
         $(document).on('click', '#print', function(){
            $(".buttons-print")[0].click();
         });
         $('#searchInput').on( 'keyup', function () {
             table.search( this.value ).draw();
         } );

     });

</script>
@endpush