@extends('layouts.app')

{{-- @push('loader')
 @include('layouts.loader')
@endpush --}}

@push('sidebar')
  @include('layouts.sidebar')
@endpush

@section('content')
<ul class="breadcrumb">
  <div class="container-fluid">
    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
    <li class="breadcrumb-item active">Subevent</li>
  </div>
</ul>

	<div class="container-fluid" style="padding-top: 3%;">
		
		<div class="col-md-12" style="width: 100%;">
          <div class="card">
          	
            <div class="card-close">
          	  
          	</div>
      			
            <div class="card-header d-flex align-items-center">
      			  <h2>SUBEVENT LIST</h2>
      			</div>

            <div class="card-body">
              <div class="table-responsive">
                <table id="mytable" class="table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Exhibitor</th>
                      <th>Action</th>
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
             dom: 
                  "<'row'<'col-sm-12'B>>" +
                  "<'row'<'col-sm-12'tr>>" +
                  "<'row'<'col-sm-3'i><'col-sm-9'p>>",
             processing: true,
             serverSide: true,
             colReorder: true,
             responsive: true,
             // lengthChange: false,
             buttons: [
                { extend: 'print', className: 'd-none', title:'Events', exportOptions:{ columns:[0, 1, 2]},
                customize: function(win){
                  $(win.document.body).css( 'font-size', '8px' );
                  $(win.document.body).find( 'table' ).addClass( 'compact' ).css( 'font-size', 'inherit' );
                  $(win.document.body).find( 'th' ).css( 'font-size', '8px' );
                }},
                { extend: 'excel', className: 'd-none', title:'Events', exportOptions:{ columns:[0, 1, 2] } },
                'pageLength',
             ],
             columnDefs: [
                 { "width": "30%", "targets": 0 },
                 { "width": "30%", "targets": 1 },
                 { "width": "30%", "targets": 2 },
                 { "width": "10%", "targets": 3 }
             ],
             ajax: "{{ route('admin.report.subevent.api') }}",

             columns: [
               {data: 'title', name: 'title'},
               {data: 'description', name: 'description'},
               {data: 'exhibitor', name: 'exhibitor'},
               {data: 'action', name: 'action', orderable:false, searchable:false, printable:false},
             ],
             initComplete: function(settings, json) {$('.loader').fadeOut();}
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