
<!DOCTYPE html>
<html>

<head>
    <title>{{env('APP_NAME')}}</title>
</head>
<style type="text/css">
    :root {
        --bs-blue: #0d6efd;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #dc3545;
        --bs-orange: #fd7e14;
        --bs-yellow: #ffc107;
        --bs-green: #198754;
        --bs-teal: #20c997;
        --bs-cyan: #0dcaf0;
        --bs-black: #000;
        --bs-white: #fff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-gray-100: #f8f9fa;
        --bs-gray-200: #e9ecef;
        --bs-gray-300: #dee2e6;
        --bs-gray-400: #ced4da;
        --bs-gray-500: #adb5bd;
        --bs-gray-600: #6c757d;
        --bs-gray-700: #495057;
        --bs-gray-800: #343a40;
        --bs-gray-900: #212529;
        --bs-primary: #0d6efd;
        --bs-secondary: #6c757d;
        --bs-success: #198754;
        --bs-info: #0dcaf0;
        --bs-warning: #ffc107;
        --bs-danger: #dc3545;
        --bs-light: #f8f9fa;
        --bs-dark: #212529;
        --bs-primary-rgb: 13, 110, 253;
        --bs-secondary-rgb: 108, 117, 125;
        --bs-success-rgb: 25, 135, 84;
        --bs-info-rgb: 13, 202, 240;
        --bs-warning-rgb: 255, 193, 7;
        --bs-danger-rgb: 220, 53, 69;
        --bs-light-rgb: 248, 249, 250;
        --bs-dark-rgb: 33, 37, 41;
        --bs-white-rgb: 255, 255, 255;
        --bs-black-rgb: 0, 0, 0;
        --bs-body-color-rgb: 33, 37, 41;
        --bs-body-bg-rgb: 255, 255, 255;
        --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji","DejaVu Sans";
        --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
        --bs-body-font-family: var(--bs-font-sans-serif);
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 1.5;
        --bs-body-color: #212529;
        --bs-body-bg: #fff;
        --bs-border-width: 1px;
        --bs-border-style: solid;
        --bs-border-color: #dee2e6;
        --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
        --bs-border-radius: 0.375rem;
        --bs-border-radius-sm: 0.25rem;
        --bs-border-radius-lg: 0.5rem;
        --bs-border-radius-xl: 1rem;
        --bs-border-radius-2xl: 2rem;
        --bs-border-radius-pill: 50rem;
        --bs-link-color: #0d6efd;
        --bs-link-hover-color: #0a58ca;
        --bs-code-color: #d63384;
        --bs-highlight-bg: #fff3cd;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: var(--bs-body-font-family);
        font-size: var(--bs-body-font-size);
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        color: var(--bs-body-color);
        text-align: var(--bs-body-text-align);
        background-color: var(--bs-body-bg);
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: transparent;
    }

    .container {
        max-width: 1320px;
    }

    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-.5 * var(--bs-gutter-x));
        margin-left: calc(-.5 * var(--bs-gutter-x));
    }

    .card {
        --bs-card-spacer-y: 1rem;
        --bs-card-spacer-x: 1rem;
        --bs-card-title-spacer-y: 0.5rem;
        --bs-card-border-width: 1px;
        --bs-card-border-color: var(--bs-border-color-translucent);
        --bs-card-border-radius: 0.375rem;
        --bs-card-box-shadow: ;
        --bs-card-inner-border-radius: calc(0.375rem - 1px);
        --bs-card-cap-padding-y: 0.5rem;
        --bs-card-cap-padding-x: 1rem;
        --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
        --bs-card-cap-color: ;
        --bs-card-height: ;
        --bs-card-color: ;
        --bs-card-bg: #fff;
        --bs-card-img-overlay-padding: 1rem;
        --bs-card-group-margin: 0.75rem;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        word-wrap: break-word;
        background-color: var(--bs-card-bg);
        background-clip: border-box;
        border: var(--bs-card-border-width) solid var(--bs-card-border-color);
        border-radius: var(--bs-card-border-radius);
    }

    .col-lg-12 {
        flex: 0 0 auto;
        width: 100%;
    }

    .card-body {
        flex: 1 1 auto;
        padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
        color: var(--bs-card-color);
    }

    .container {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        width: 100%;
        padding-right: calc(var(--bs-gutter-x) * .5);
        padding-left: calc(var(--bs-gutter-x) * .5);
        margin-right: auto;
        margin-left: auto;
    }

    .float-end {
        float: right !important;
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .bg-success {
        --bs-bg-opacity: 1;
        background-color: #0a5231!important;
    }

    .ms-2 {
        margin-left: 0.5rem !important;
    }

    .badge {
        --bs-badge-padding-x: 0.65em;
        --bs-badge-padding-y: 0.35em;
        --bs-badge-font-size: 0.75em;
        --bs-badge-font-weight: 700;
        --bs-badge-color: #fff;
        --bs-badge-border-radius: 0.375rem;
        display: inline-block;
        padding: var(--bs-badge-padding-y) var(--bs-badge-padding-x);
        font-size: var(--bs-badge-font-size);
        font-weight: var(--bs-badge-font-weight);
        line-height: 1;
        color: var(--bs-badge-color);
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: var(--bs-badge-border-radius);
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .text-muted {
        --bs-text-opacity: 1;
        color: #6c757d !important;
    }
    .h2, h2 {
    font-size: 2rem;
}
.h4, h4 {
    font-size: 1.5rem;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
}
.h5, h5 {
    font-size: 1.25rem;
}

    .mb-1 {
        margin-bottom: 0.25rem !important;
    }

    .text-muted {
        --bs-text-opacity: 1;
        color: #6c757d !important;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .my-4 {
        margin-top: 1.5rem !important;
        margin-bottom: 1.5rem !important;
    }

    hr {
        margin: 1rem 0;
        color: inherit;
        border: 0;
        border-top: 1px solid;
        opacity: .25;
    }

    .col-sm-6 {
        flex: 0 0 auto;
        width: 50%;
    }


    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .mb-2 {
        margin-bottom: 0.5rem !important;
    }

    .text-sm-end {
        text-align: right !important;
    }

    .mt-4 {
        margin-top: 1.5rem !important;
    }


    .mb-1 {
        margin-bottom: 0.25rem !important;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100% !important;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #0d6efd
    }

    footer {
        margin-top: 50px !important;
        border-top: 1px solid #0d6efd
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 80px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    .mt-20 {
        margin-top: 20px;
    }

    .box-text p {
        line-height: 10px;
    }

    . float-start {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }

    .text {
        margin-left: 60px !important;
        margin-top: -40px !important;
    }

    .invoice-to {
        text-align: left !important;
    }

    .invoice-details {
        text-align: right !important;
        margin-top: -120px !important;
    }

    footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    .signature {
        text-align: right !important;
        margin-top: -120px !important;
    }

    .details {
        border-top: 1px solid #5D5D5D
    }

    .right {
        float: right !important;
    }
    .invoice{
        margin-top: -150px !important;
        float: right !important;
    }
    .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: rgb(65, 83, 179)
        }

    .text-right {
        text-align: right;
    }

</style>
<?php
    use App\Models\Setting;
    $settings = Setting::whereIn('type', ['site-setup', 'general-setting'])
        ->whereIn('key', ['site-setup', 'general-setting'])
        ->get()
        ->keyBy('key');

    $app = isset($settings['site-setup']) ? json_decode($settings['site-setup']->value) : null;
    $generaldata = isset($settings['general-setting']) ? json_decode($settings['general-setting']->value) : null;

    $extraValue = 0;
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">

                            <div class="mb-4">
                                <h2 class="mb-1 text-muted">{{ $generaldata->site_name}}</h2>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>{{ $generaldata->inquriy_email}}</p>
                                <p><i class="uil uil-phone me-1"></i>{{ $generaldata->helpline_number}}</p>
                            </div>
                        </div>

                        <hr class="my-4">
                        <div class="pdf-border-box bg-grey  mb-3">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <p class="font-size-16 mb-3">{{__('messages.Billed_To')}}:</p>
                                    <p class="text-primary mb-3">{{optional($bookingdata->customer)->display_name ?? '-'}}</p>
                                    <p class="mb-0">{{ optional($bookingdata->customer)->contact_number ?? '-' }}</p>
                                    <p class="mb-1">{{optional($bookingdata->customer)->email ?? '-' }}</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6 invoice">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <p class="font-size-15 mb-3">{{__('messages.Invoice_No')}}:</p>
                                        <p>{{ '#' . $bookingdata->id ?? '-'}}</p>

                                    </div>


                                </div>
                            </div>
                        </div><br>
                    </div>
                    <div class="table-1 mt-20">
                    <div class="table-responsive mt-20">
                        <table class="table mt-20">
                            <tbody>
                                <tr>
                                    <th>{{__('messages.SKU')}}</th>
                                    <th>{{__('messages.servicename')}}</th>
                                    <th>{{__('messages.Price')}}</th>
                                    @if($bookingdata->service->type  == 'hourly')
                                    <th>{{__('messages.hour')}}</th>
                                    @else
                                    <th>{{__('messages.Qty')}}</th>
                                    @endif
                                    <th>{{__('messages.Subtotal')}}</th>
                                </tr>
                                <tr>
                                    <td >1</td>
                                    <td>
                                        {{optional($bookingdata->service)->name ?? '-'}}
                                    </td>
                                    <td>{{ isset($bookingdata->amount) ? getPriceFormat($bookingdata->amount) : 0 }}</td>
                                    @if(optional($bookingdata->service)->type  == 'hourly')
                                        @php
                                            $duration_minutes = $bookingdata->duration_diff / 60; // Calculate duration in minutes
                                            $duration_hours = $duration_minutes > 60 ? $duration_minutes / 60 : 1; // Convert to hours if duration exceeds 60 minutes
                                            // Format duration into hours:minutes format
                                            $formatted_duration = gmdate('H:i', round($duration_hours * 3600));
                                        @endphp
                                        <td>{{!empty($formatted_duration) ? $formatted_duration     : 0}} hr</td>
                                    @else
                                        <td>{{!empty($bookingdata->quantity) ? $bookingdata->quantity : 0}}</td>
                                    @endif
                                    @php
                                        if($bookingdata->type == 'service'){
                                            if($bookingdata->service->type === 'fixed'){
                                                $sub_total = ($bookingdata->amount) * ($bookingdata->quantity);
                                            }else{
                                                $sub_total = $bookingdata->final_total_service_price;
                                            }
                                        }else{
                                            $sub_total = $bookingdata->amount;
                                        }

                                     @endphp
                                   <td class="text-right">{{!empty($sub_total) ? getPriceFormat($sub_total) : 0}}</td>
                                </tr>
                                @php 
                                    $addonTotalPrice = $bookingdata->bookingAddonService->count() > 0 ? $bookingdata->bookingAddonService->sum('price') : 0;
                                @endphp
                                @if($addonTotalPrice > 0)
                                    <tr>
                                        <td colspan="3"></td>
                                        <td >{{__('messages.add_ons')}}</span></td>
                                        <td class="text-right" style="width: 20%;">{{ getPriceFormat($addonTotalPrice) }}</td>
                                    </tr>
                                @endif
                                @if ($bookingdata->bookingPackage == null)
                                <tr>
                                    <td colspan="3"></td>
                                    <td >{{__('messages.discount') }}   ({{ !empty($bookingdata->discount) ? $bookingdata->discount : 0}}%)</span> </td>
                                    <td class="text-right" style="width: 20%;">{{getPriceFormat(!empty($bookingdata->discount) ? $sub_total * $bookingdata->discount / 100 : 0)}}</td>
                                </tr>
                                @endif
                                @php
                                    $extraValue = 0;                   
                                @endphp
                                @foreach($bookingdata->bookingExtraCharge as $chrage)
                                    @php
                                        $extraValue += $chrage->price * $chrage->qty;
                                    @endphp
                                @endforeach
                                @if ($bookingdata->couponAdded != null)
                                <tr>
                                    <td colspan="3"></td>
                                    
                                    <td >{{__('messages.Coupon_Discount')}} ( {{ optional($bookingdata->couponAdded)->code ?? ' -' }} 
                                        @if(optional($bookingdata->couponAdded)->discount_type == 'fixed')
                                            ({{ getPriceFormat(optional($bookingdata->couponAdded)->discount) }})
                                        @else
                                            ({{ optional($bookingdata->couponAdded)->discount }}%)
                                        @endif
                                    )</span> </td>
                                    <td class="text-right" style="width: 20%;">{{ getPriceFormat($bookingdata->final_coupon_discount_amount) ?? 0}}</td>
                                </tr>
                                @endif
                               

                                <tr>
                                    <td colspan="3"></td>
                                    <td >{{__('messages.extra_charge')}}</span></td>
                                    <td class="text-right" style="width: 20%;">{{!empty($extraValue) ? getPriceFormat($extraValue) : 0}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td >{{__('messages.Sub_Total')}}</span> </td>
                                    <td class="text-right" class="text-right" style="width: 20%;">{{!empty($bookingdata->final_sub_total) ? getPriceFormat($bookingdata->final_sub_total) : 0}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>{{__('messages.Tax')}}
                                        @if($bookingdata->tax != "")
                                            @foreach(json_decode($bookingdata->tax) as $key => $value)
                                                @if($value->type === 'percent')
                                                    <span>({{ $value->title }} {{ $value->value }}%)</span>
                                                @else
                                                    <span>({{ $value->title }} {{ getPriceFormat($value->value) }})</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    
                                    <td class="text-right" style="width: 20%;">{{!empty($bookingdata->final_total_tax) ? getPriceFormat($bookingdata->final_total_tax) : 0}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="width: 20%; font-weight: bold;">{{__('messages.Total_Payable')}}</span></td>
                                    <td class="text-right" style="width: 20%;font-weight: bold;">{{!empty($bookingdata->total_amount) ? getPriceFormat($bookingdata->total_amount) : 0}}</td>
                                </tr>

                                @if($bookingdata->service->is_enable_advance_payment == 1)
                            <tr>
                                <td colspan="3"></td>
                                <td style="width: 20%; font-weight: bold;">{{ __('messages.advance_payment_amount') }} ({{ $bookingdata->service->advance_payment_amount }}%)</td>
                                <td class="text-right" style="width: 20%;font-weight: bold;">{{ getPriceFormat($bookingdata->advance_paid_amount) }}</td>
                            </tr>
                            @if($bookingdata->status !== "cancelled")
                            <tr>
                               
                                <td colspan="3"></td>
                                <td style="width: 20%; font-weight: bold;">
                                    {{ __('messages.remaining_amount') }}
                                    @if($payment == null || $payment->payment_status != 'paid')
                                        <span class="badge bg-warning">{{ __('messages.pending') }}</span>
                                    @endif
                                </td>

                                <td class="text-right" style="width: 20%; font-weight: bold;">
                                    @if($payment != null && $payment->payment_status == 'paid') 
                                        {{ __('messages.paid') }}
                                    @else
                                        {{ getPriceFormat($bookingdata->total_amount - $bookingdata->advance_paid_amount) }}
                                    @endif
                                </td>
                            
                            </tr>
                            @else
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="width: 20%; font-weight: bold;">{{ __('messages.cancellation_charge') }} ({{ $bookingdata->cancellation_charge }}%)</td>
                                    <td class="text-right" style="width: 20%;font-weight: bold;">{{getPriceFormat($bookingdata->cancellation_charge_amount )?? 0}}</td>
                                </tr>
                                @if($bookingdata->advance_paid_amount > 0)
                                    @php 
                                        $refundamount = $bookingdata->advance_paid_amount - $bookingdata->cancellation_charge_amount
                                    @endphp
                                    @if($refundamount > 0)
                                    <tr>
                                        <td colspan="3"></td>
                                        <td style="width: 20%; font-weight: bold;">{{ __('messages.refund_amount') }}</td>
                                    
                                        <td class="text-right" style="width: 20%;font-weight: bold;">{{getPriceFormat($refundamount) ?? 0}} </td>
                                    
                                    </tr>
                                    @endif
                                @endif
                            @endif
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

                        <footer>{{$app->site_copyright}}</footer>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
