<x-master-layout>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  </head>
    <div class="container-fluid">
    @include('partials._handyman')
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="fw-bold">{{ $pageTitle ?? trans('messages.list') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
        <div class="row justify-content-between gy-3">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="col-md-12">
                  <form action="{{ route('handymanpayout.bulk-action') }}" id="quick-action-form" class="form-disabled d-flex gap-3 align-items-center">
                    @csrf
                  <select name="action_type" class="form-select select2" id="quick-action-type" style="width:100%" disabled>
                      <option value="">{{__('messages.no_action')}}</option>
                      <option value="delete">{{__('messages.delete')}}</option>
                  </select>
                
                
                <button id="quick-action-apply" class="btn btn-primary" data-ajax="true"
                data--submit="{{ route('handymanpayout.bulk-action') }}"
                data-datatable="reload" data-confirmation='true'
                data-title="{{ __('handymanpayout',['form'=>  __('handymanpayout') ]) }}"
                title="{{ __('handymanpayout',['form'=>  __('handymanpayout') ]) }}"
                data-message='{{ __("Do you want to perform this action?") }}' disabled>{{__('messages.apply')}}</button>
            </div>
          
            </form>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
          <div class="d-flex align-items-center gap-3 justify-content-end">
              <div class="d-flex justify-content-end">
                
                <div class="input-group input-group-search ms-2">
                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search" aria-describedby="addon-wrapping" aria-controls="dataTableBuilder">
                  </div>
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
                  "url"    : '{{ route("handymanpayout.index_data",["handymanpayout"=>$handymandata->id]) }}',
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
                        name: 'check',
                        data: 'check',
                        title: '<input type="checkbox" class="form-check-input" name="select_all_table" id="select-all-table" onclick="selectAllTable(this)">',
                        exportable: false,
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'id',
                        name: 'id',
                        title: "{{__('messages.id')}}",
                        orderable: false,
                    },
                    {
                        data: 'handyman_id',
                        name: 'handyman_id',
                        title: "{{__('messages.handyman')}}",
                        orderable: false,
                    },
                    {
                        data: 'payment_method',
                        name: 'payment_method',
                        title: "{{__('messages.method')}}"
                    },
                    {
                        data: 'description',
                        name: 'description',
                        title: "{{__('messages.description')}}"
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        title: "{{__('messages.paid_date')}}"
                    },
                    {
                        data: 'amount',
                        name: 'amount',
                        title: "{{__('messages.amount')}}"
                    },
                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     orderable: false,
                    //     searchable: false,
                    //     title: "{{__('messages.action')}}"
                    // }
                    
                ],
                language: {
          processing: "{{ __('messages.processing') }}" // Set your custom processing text
        }
                
            });
      });

    function resetQuickAction () {
    const actionValue = $('#quick-action-type').val();
    console.log(actionValue)
    if (actionValue != '') {
        $('#quick-action-apply').removeAttr('disabled');

        if (actionValue == 'change-status') {
            $('.quick-action-field').addClass('d-none');
            $('#change-status-action').removeClass('d-none');
        } else {
            $('.quick-action-field').addClass('d-none');
        }
    } else {
        $('#quick-action-apply').attr('disabled', true);
        $('.quick-action-field').addClass('d-none');
    }
  }

  $('#quick-action-type').change(function () {
    resetQuickAction()
  });

  $(document).on('update_quick_action', function() {

  })

    $(document).on('click', '[data-ajax="true"]', function (e) {
      e.preventDefault();
      const button = $(this);
      const confirmation = button.data('confirmation');

      if (confirmation === 'true') {
          const message = button.data('message');
          if (confirm(message)) {
              const submitUrl = button.data('submit');
              const form = button.closest('form');
              form.attr('action', submitUrl);
              form.submit();
          }
      } else {
          const submitUrl = button.data('submit');
          const form = button.closest('form');
          form.attr('action', submitUrl);
          form.submit();
      }
  });

    </script>

</x-master-layout>