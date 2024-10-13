@if(!$isUserSubscriber)
@extends($activeTheme.'layouts.app')
@section('title', ___('All Restaurants'))
@section('content')

 <div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-p-3 tw-mb-2 tw-flex tw-flex-col tw-items-start">
     <div class="tw-flex tw-justify-between tw-w-full">
       <div class="tw-text-lg tw-font-semibold tw-text-zinc-900"></div>
       
     
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-600">
      
       <span>{{___('purchase_plan')}}</span>
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-700">
    
       
     </div>
   </div>
    </div>
    @endsection
@push('scripts_at_bottom')

@endpush
@else 
@extends($activeTheme.'layouts.app')
@section('title', ___('Orders').' - '.$post->title)
@if(!empty($menu_languages))
    @section('header_buttons')
        <div class="btn-group bootstrap-select user-lang-switcher">
            <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown"
                    title="{{$default_menu_language->name}}">
                <span class="filter-option pull-left"
                      id="user-lang">{{ strtoupper($default_menu_language->code)}}</span>&nbsp;
                <span class="caret"></span>
            </button>
            <div class="dropdown-menu scrollable-menu open">
                <ul class="dropdown-menu inner">
                    @foreach($menu_languages as $lang)
                        <li data-code="{{$lang->code}}">
                            <a role="menuitem" tabindex="-1" rel="alternate"
                               href="#">{{$lang->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endsection
@endif
@section('content')
    @if(count(request()->user()->posts) > 1)
        <div class="btn-group bootstrap-select with-border">
            <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown">
                <span class="filter-option pull-left"
                      id="user-lang">{{___('Restaurant')}} : {{ $post->title }}</span>&nbsp;
                <span class="caret"></span>
            </button>
            <div class="dropdown-menu scrollable-menu open">
                <ul class="dropdown-menu inner">
                    @foreach(request()->user()->posts as $restaurant)
                        <li>
                            <a href="{{route('restaurants.orders', $restaurant->id)}}">{{$restaurant->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="dashboard-box main-box-in-row">
        <div class="headline">
            <h3><i class="icon-feather-activity"></i> {{___('Orders')}}</h3>
            <a href="javascript:void(0)" class="margin-left-auto order-notification-sound" data-tippy-placement="top"
               title="{{___('Notification Sound')}}"><i class="icon-feather-volume-2"></i></a>
        </div>
        <div class="content with-padding">
        
            <div class="dataTables_wrapper">
                <table class="basic-table dashboard-box-list" id="qr-orders-table">
                    <thead>
                    <tr>
                        <th class="w-100">{{___('Table No. / Type')}}</th>
                        <th>{{___('Menu')}}</th>
                        <th>{{___('Customer')}}</th>
                        <th>{{___('Price')}}</th>
                        <th>{{___('Status')}}</th>
                        <th>{{___('Time')}}</th>
                        <th></th>
                    </tr>
                    </thead>
                    @if(count($orders))
                        <tbody id="order-rows">
                        @foreach($orders as $order)
                            @include($activeTheme.'user.posts.orders.order-row')
                        @endforeach
                        </tbody>
                    @else
                        <tbody>
                        <tr class="no-order-found">
                            <td colspan="8" class="text-center">{{ ___('No Data Found') }}</td>
                        </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
    {{ $orders->links($activeTheme.'pagination/default') }}


    <div id="view-order" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
        <!--Tabs -->
        <div class="sign-in-form">
            <ul class="popup-tabs-nav">
                <li><a>{{ ___('Order') }}</a></li>
            </ul>

            <div class="popup-tabs-container">
                <!-- Tab -->
                <div class="popup-tab-content">
                    <div class="order-print">
                        <div class="order-print-header text-center">
                            <h3>{{ $post->title }}</h3>
                            <p>{{$post->address}}</p>
                        </div>
                        <div class="order-print-divider"></div>
                        <div id="order-print-content">
                        </div>
                        <div class="order-print-divider"></div>
                        <p class="text-center">{{ ___('Thank you for visiting.') }}</p>
                    </div>
                    <button class="button order-print-button"><i class="fa fa-print"></i> {{___('Print Receipt')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_vendor')
    <script>
        const LANG_ARE_YOU_SURE = @json(___('Are you sure?'));
        const LANG_COMPLETED = @json(___('Completed'));
        $('.user-lang-switcher').on('click', '.dropdown-menu li', function (e) {
            e.preventDefault();
            var code = $(this).data('code');
            if (code != null) {
                $('#user-lang').html(code.toUpperCase());
                $.cookie('Quick_user_lang_code', code, {path: '/'});
                location.reload();
            }
        });
    </script>
    
<script src="{{ asset($activeThemeAssets.'js/orders.js?var='.config('appinfo.version')) }}"></script>

    @endpush
@endif