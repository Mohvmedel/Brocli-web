{{ html()->form('POST', route('paymentsettingsUpdates'))->attribute('enctype', 'multipart/form-data')->attribute('data-toggle', 'validator')->open() }}
{{ html()->hidden('id', $payment_data->id ?? null )->attribute('placeholder', 'id')->class('form-control') }}
{{ html()->hidden('type', $tabpage)->attribute('placeholder', 'id')->class('form-control') }}
 <div class="row">
    <div class="form-group col-md-12" >
        <div class="form-control d-flex align-items-center justify-content-between">
            <label for="enable_stripe" class="mb-0">{{__('messages.payment_on',['gateway'=>__('messages.stripe')])}}</label>
            <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                <input type="checkbox" class="custom-control-input" name="status" id="enable_stripe" {{!empty($payment_data) && $payment_data->status == 1 ? 'checked' : ''}}>
                <label class="custom-control-label" for="enable_stripe"></label>
            </div>
        </div>
    </div>
 </div>
 <div class="row" id='enable_stripe_payment'>
    <div class="form-group col-md-12">
        <label class="form-control-label">{{__('messages.payment_option',['gateway'=>__('messages.stripe')])}}</label><br/>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input is_test" value="on" name="is_test" data-type="is_test_mode" {{!empty($payment_data) && $payment_data->is_test == 1 ? 'checked' :''}}>{{__('messages.is_test_mode')}}
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input is_test" value="off" name="is_test" data-type="is_live_mode" {{!empty($payment_data) && $payment_data->is_test == 0 ? 'checked' :''}}>{{__('messages.is_live_mode')}}
            </label>
        </div>
        <small class="help-block with-errors text-danger"></small>
    </div>
    <div class="form-group col-md-12">
        {{ html()->label(trans('messages.gateway_name').' <span class="text-danger">*</span>', 'title', ['class' => 'form-control-label']) }}
        {{ html()->text('title', $payment_data->title)
            ->id('title')
            ->placeholder(trans('messages.title'))
            ->class('form-control')
        }}
        <small class="help-block with-errors text-danger"></small>
    </div>
    
    <div class="form-group col-md-12">
        {{ html()->label(trans('messages.stripe_url').' <span class="text-danger">*</span>', 'stripe_url', ['class' => 'form-control-label']) }}
        {{ html()->text('stripe_url',$payment_data->stripe_url)
            ->id('stripe_url')
            ->placeholder(trans('messages.stripe_url'))
            ->class('form-control')
        }}
        <small class="help-block with-errors text-danger"></small>
    </div>
    
    <div class="form-group col-md-12">
        {{ html()->label(trans('messages.stripe_key').' <span class="text-danger">*</span>', 'stripe_key', ['class' => 'form-control-label']) }}
        {{ html()->text('stripe_key', $payment_data->stripe_key)
            ->id('stripe_key')
            ->placeholder(trans('messages.stripe_key'))
            ->class('form-control')
        }}
        <small class="help-block with-errors text-danger"></small>
    </div>
    
    <div class="form-group col-md-12">
        {{ html()->label(trans('messages.stripe_publickey').' <span class="text-danger">*</span>', 'stripe_publickey', ['class' => 'form-control-label']) }}
        {{ html()->text('stripe_publickey', $payment_data->stripe_publickey)
            ->id('stripe_publickey')
            ->placeholder(trans('messages.stripe_publickey'))
            ->class('form-control')
        }}
        <small class="help-block with-errors text-danger"></small>
    </div>
    
 </div>
 {{ html()->submit(__('messages.save'))->class('btn btn-md btn-primary float-md-end') }}
 {{ html()->form()->close() }}
<script>
var enable_stripe = $("input[name='status']").prop('checked');
checkPaymentTabOption(enable_stripe);

$('#enable_stripe').change(function(){
    value = $(this).prop('checked') == true ? true : false;
    checkPaymentTabOption(value);
});
function checkPaymentTabOption(value){
    if(value == true){
        $('#enable_stripe_payment').removeClass('d-none');
        $('#title').prop('required', true);
        $('#stripe_url').prop('required', true);
        $('#stripe_key').prop('required', true);
        $('#stripe_publickey').prop('required', true);
    }else{
        $('#enable_stripe_payment').addClass('d-none');
        $('#title').prop('required', false);
        $('#stripe_url').prop('required', false);
        $('#stripe_key').prop('required', false);
        $('#stripe_publickey').prop('required', false);
    }
}

var get_value = $('input[name="is_test"]:checked').data("type");
getConfig(get_value)
$('.is_test').change(function(){
    value = $(this).prop('checked') == true ? true : false;
    type = $(this).data("type");
    getConfig(type)

});

function getConfig(type){
    var _token   = $('meta[name="csrf-token"]').attr('content');
    var baseUrl = $('meta[name="baseUrl"]').attr('content');
    var page =  "{{$tabpage}}";
    $.ajax({
        url: baseUrl+"/get_payment_config",
        type:"POST",
        data:{
          type:type,
          page:page,
          _token: _token
        },
        success:function(response){
            var obj = '';
            var stripe_url=stripe_key=stripe_publickey=title = '';

            if(response){
            
                if(response.data.type == 'is_test_mode'){
                    obj = JSON.parse(response.data.value);
                }else{
                    obj = JSON.parse(response.data.live_value);
                }

                if(response.data.title != ''){
                    title = response.data.title
                }
                
                if(obj !== null){
                    var stripe_url = obj.stripe_url;
                    var stripe_key = obj.stripe_key;
                    var stripe_publickey = obj.stripe_publickey;
                }

                $('#stripe_url').val(stripe_url)
                $('#stripe_key').val(stripe_key)
                $('#stripe_publickey').val(stripe_publickey)
                $('#title').val(title)
            
            }
        },
        error: function(error) {
         console.log(error);
        }
    });
}

</script>