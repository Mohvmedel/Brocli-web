<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="fw-bold">{{ $pageTitle ?? trans('messages.list') }}</h5>
                        </div>
                        
                    </div>
                </div>
                    <div class="card">
                        <div class="card-body">
                            <div class=" row justify-content-end ">
                                <div class="col-md-6 col-lg-3">                                       
                                        <div class="input-group input-group-search ml-auto">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span>
                                            <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search" aria-describedby="addon-wrapping" aria-controls="dataTableBuilder">
                                        </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                    <table id="datatable" class="table table-striped border">

                                    </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {

window.renderedDataTable = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        dom: '<"row align-items-center"><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" l><"col-md-6" p><"col-md-6" i>><"clear">',
        ajax: {
          "type"   : "GET",
          "url"    : '{{ route("wallethistory.index_data",['id' => $id]) }}',
          "data"   : function( d ) {
            d.search = {
              value: $('.dt-search').val()
            };
            d.filter = {
              column_status: $('#column_status').val()
            }
          },
        },
        columns: [
            {
                name: 'DT_RowIndex',
                data: 'DT_RowIndex',
                title: "{{__('messages.no')}}",
                exportable: false,
                orderable: false,
                searchable: false,
            },
           
            {
                data: 'datetime',
                name: 'datetime',
                title: "{{ __('messages.date') }}"
            },
            {
                data: 'activity_type',
                name: 'activity_type',
                title: "{{ __('messages.type') }}"
            },
            {
                data: 'activity_message',
                name: 'activity_message',
                title: "{{ __('messages.messages') }}"
            },
            {
                data: 'amount',
                name: 'amount',
                title: "{{ __('messages.amount') }}"
            }
            
        ],
        language: {
          processing: "{{ __('messages.processing') }}" // Set your custom processing text
        }
        
    });
});
</script>
</x-master-layout>