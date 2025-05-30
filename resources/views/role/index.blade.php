  <div class="d-flex justify-content-between align-items-center p-3 mb-5 flex-wrap gap-3 shadow">
      <h5 class="fw-bold">{{ $pageTitle ?? trans('messages.list') }}</h5>
      @if ($auth_user->can('role add'))
          <a href="{{ route('permission.add', ['type' => 'role']) }}" class="me-1 btn btn-sm btn-primary loadRemoteModel"><i
                  class="fa fa-plus-circle"></i>
              {{ trans('messages.add_form_title', ['form' => trans('messages.role')]) }}</a>
      @endif
  </div>
  <div class="card">
      <div class="card-body p-0">
          <div class="d-flex justify-content-between gap-3 flex-wrap">
              <div class="d-flex align-items-center gap-3">
                  <form action="{{ route('role.bulk-action') }}" id="quick-action-form"
                      class="form-disabled d-flex gap-3 align-items-center">
                      @csrf
                      <select name="action_type" class="form-select select2" id="quick-action-type" style="width:100%"
                          disabled>
                          <option value="">{{ __('messages.no_action') }}</option>
                          <option value="change-status">{{ __('messages.status') }}</option>
                          <option value="delete">{{ __('messages.delete') }}</option>
                      </select>

                      <div class="select-status d-none quick-action-field" id="change-status-action" style="width:100%">
                          <select name="status" class="form-select select2" id="status" style="width:100%">
                              <option value="1">{{ __('messages.active') }}</option>
                              <option value="0">{{ __('messages.inactive') }}</option>
                          </select>
                      </div>
                      <button id="quick-action-apply" class="btn btn-primary" data-ajax="true"
                          data--submit="{{ route('role.bulk-action') }}" data-datatable="reload"
                          data-confirmation='true' data-title="{{ __('role', ['form' => __('role')]) }}"
                          title="{{ __('role', ['form' => __('role')]) }}"
                          data-message='{{ __('Do you want to perform this action?') }}'
                          disabled>{{ __('messages.apply') }}</button>
                  </form>
              </div>

              <div class="d-flex justify-content-end gap-3">
                  <div class="datatable-filter ml-auto">
                      <select name="column_status" id="column_status" class="select2 form-select" data-filter="select"
                          style="width: 100%">
                          <option value="">{{ __('messages.all') }}</option>
                          <option value="0" {{ $filter['status'] == '0' ? 'selected' : '' }}>
                              {{ __('messages.inactive') }}</option>
                          <option value="1" {{ $filter['status'] == '1' ? 'selected' : '' }}>
                              {{ __('messages.active') }}</option>
                      </select>
                  </div>
                  <div class="input-group input-group-search ms-2">
                      <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span>
                      <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search"
                          aria-describedby="addon-wrapping" aria-controls="dataTableBuilder">
                  </div>
              </div>
          </div>
          <div class="table-responsive">
              <table id="datatable" class="table table-striped border">

              </table>
          </div>
      </div>
  </div>
  <script>
      $(document).ready(function(event) {

          window.renderedDataTable = $('#datatable').DataTable({
              processing: true,
              serverSide: true,
              autoWidth: false,
              responsive: true,
              dom: '<"row align-items-center"><"table-responsive my-3 mt-3 mb-2 pb-1" rt><"row align-items-center data_table_widgets" <"col-md-6" <"d-flex align-items-center flex-wrap gap-3" l i>><"col-md-6" p>><"clear">',
              ajax: {
                  "type": "GET",
                  "url": '{{ route('role.index_data') }}',
                  "data": function(d) {
                      d.search = {
                          value: $('.dt-search').val()
                      };
                      d.filter = {
                          column_status: $('#column_status').val()
                      }
                  },
              },
              columns: [{
                      name: 'check',
                      data: 'check',
                      title: '<input type="checkbox" class="form-check-input" name="select_all_table" id="select-all-table" onclick="selectAllTable(this)">',
                      exportable: false,
                      orderable: false,
                      searchable: false,
                  },
                  {
                      data: 'name',
                      name: 'name',
                      title: "{{ __('messages.name') }}"
                  },
                  {
                      data: 'action',
                      name: 'action',
                      orderable: false,
                      searchable: false,
                      title: "{{ __('messages.status') }}"
                  }

              ],
              language: {
                  processing: "{{ __('messages.processing') }}" // Set your custom processing text
              }

          });
      });

      function resetQuickAction() {
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

      $('#quick-action-type').change(function() {
          resetQuickAction()
      });

      $(document).on('update_quick_action', function() {

      })

      $('#quick-action-form').on('submit', function(e) {
          e.preventDefault()
          const form = $(this)
          const url = form.attr('action')
          const message = form.find('button[data-ajax="true"]').data('message');
          const rowdIds = $("#datatable_wrapper .select-table-row:checked").map(function() {
              return $(this).val();
          }).get();


          confirmSwal(message).then((result) => {
              if (!result.isConfirmed) return
              callActionAjax({
                  url: `${url}?rowIds=${rowdIds}`,
                  body: form.serialize()
              })
          })

      })

      $(document).on('change', '#datatable_wrapper .switch-status-change', function() {
          let url = $(this).attr('data-url')
          let body = {
              status: $(this).prop('checked') ? 1 : 0,
              _token: $(this).attr('data-token')
          }
          callActionAjax({
              url: url,
              body: body
          })
      })

      $(document).on('change', '#datatable_wrapper .change-select', function() {
          let url = $(this).attr('data-url')
          let body = {
              value: $(this).val(),
              _token: $(this).attr('data-token')
          }
          callActionAjax({
              url: url,
              body: body
          })
      })

      function callActionAjax({
          url,
          body
      }) {
          $.ajax({
              type: 'POST',
              url: url,
              data: body,
              success: function(res) {
                  if (res.status) {
                      const successMessage = res.message;
                      showMessage(successMessage);
                      window.renderedDataTable.ajax.reload(resetActionButtons, false)
                      const event = new CustomEvent('update_quick_action', {
                          detail: {
                              value: true
                          }
                      })
                      document.dispatchEvent(event)
                  } else {
                      Swal.fire({
                          title: 'Error',
                          text: res.message,
                          icon: "error"
                      })
                  }
              }
          })
      }

      function showMessage(message) {
          Snackbar.show({
              text: message,
              pos: 'bottom-center'
          });
      }
  </script>
  
