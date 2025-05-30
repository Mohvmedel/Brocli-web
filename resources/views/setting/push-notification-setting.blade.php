<x-master-layout>
<div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3 flex-wrap gap-3">
                            <h5 class="fw-bold">{{ $pageTitle ?? __('messages.list') }}</h5>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{ html()->form('POST', route('sendPushNotification'))->attribute('enctype', 'multipart/form-data')->attribute('data-toggle', 'validator')->id('push_notification')->open() }}
                        {{ html()->hidden('id') }}
                        <div class="row">
                            <div class="form-group col-md-12" id="type">
                                {{ html()->label(trans('messages.type') . ' <span class="text-danger">*</span>', 'type')->class('form-control-label') }}
            {{-- <!-- {{ Form ::radio('is_type','user',['id'=>'user','class' =>'form-control','required'],($settings == 'user' ? true : false)) }} User               
            {{ Form ::radio('is_type','provider',['id'=>'provider','class' =>'form-control','required'],($settings == 'provider' ? true : false)) }} Provider --> --}}
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                    <input type="radio" id="user" class="form-check-input is_type" value="user" name="is_type" data-type="user" checked  {{!empty($settings) &&  $settings->is_type == 1 ? 'checked' :''}}>{{__('messages.user')}}
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                    <input type="radio" id="provider" class="form-check-input is_type" value="provider" name="is_type" data-type="provider" {{!empty($settings) &&  $settings->is_type == 0 ? 'checked' :''}}>{{__('messages.provider')}}
                                    </label>
                                </div>
                                <small class="help-block with-errors text-danger"></small>
                            </div>
                            <div class="form-group col-md-12">
                                {{ html()->label(trans('messages.title') . ' <span class="text-danger">*</span>', 'title')->class('form-control-label') }}
                                {{ html()->text('title', old('title'))->id('title')->placeholder(trans('messages.title'))->class('form-control')->required() }}
                                <small class="help-block with-errors text-danger"></small>
                            </div>
                            <div class="form-group col-md-12" id="select_type">
                                {{ html()->label(trans('messages.type') . ' <span class="text-danger">*</span>', 'type')->class('form-control-label') }}
                                {{ html()->select('type', ['alldata' => __('messages.all'), 'service' => __('messages.service')], old('type'))->id('type')->class('form-select select2js notification_type')->required() }}
                            </div>
                            <div class="form-group col-md-12 d-none" id="select_service">
                                {{ html()->label(__('messages.select_name', ['select' => __('messages.service')]) . ' <span class="text-danger">*</span>', 'name')->class('form-control-label')->attribute('data-placeholder', __('messages.select_name', ['select' => __('messages.tax')]))}}
                                <br />
                                <select class="form-select service" name="service_id" id="serviceSelect">
                                
                                    @foreach($services as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="form-group col-md-12">
                                {{ html()->label(trans('messages.description') . ' <span class="text-danger">*</span>', 'description')->class('form-control-label') }}
                                {{ html()->textarea('description', null)->class('form-control textarea')->id('description')->rows(3)->required()->placeholder(__('messages.description')) }}
                            </div>
                        </div>
                        
                        {{ html()->submit(trans('messages.save'))->class('btn btn-md btn-primary float-end') }}
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-master-layout>
<script>
    $(document).ready(function (){
        var value =  $('.service').find(':selected').attr('data-type');
        $(document).on('change','.is_type',function(){
            var type =  $(this).val();
            
            if(type == 'provider'){
                $('#select_type').addClass('d-none');
                $('#select_service').addClass('d-none');
                $('#description').val('');
            }else{
                $('#select_type').removeClass('d-none');
                var type = $('.notification_type').find(':selected').val();
                if(type == "alldata"){
                    $('#select_service').addClass('d-none');
                    $('#description').val('')
                }
                else{
                    $('#select_service').removeClass('d-none');
                    textareaValue(value)
                }
                
            }
        });

        $(document).on('change','.notification_type',function(){
            var type =  $(this).val();
            if(type == 'service'){
                textareaValue(value)
                $('#select_service').removeClass('d-none');
            }else{
                $('#select_service').addClass('d-none');
                $('#description').val('')
            }
        });
        $(document).on('change','.service',function(){
            var value =  $(this).find(':selected').attr('data-type');
            textareaValue(value)
            
        });
    });
    function textareaValue(value){
        $('#description').val(value)
    }
    $(document).ready(function() {
    $('#serviceSelect').select2();
});
</script>