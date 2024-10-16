@extends($activeTheme.'layouts.app')
@section('title', ___('integrations'))

@if(!empty($menu_languages))
    @section('header_buttons')
   
    @endsection
@endif
@section('content')
    @if($isUserSubscriber)
    <div class="tw-container tw-mx-auto tw-px-2 tw-py-2">
  <div class="tw-grid tw-grid-cols-1 tw-gap-6">
  
<div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-p-3 tw-mb-2 tw-flex tw-flex-col tw-items-start">
     <div class="tw-flex tw-justify-between tw-w-full">
       <div class="tw-text-lg tw-font-semibold tw-text-zinc-900"></div>
       
     
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-600">
      
       <span>{{___('coming_soon')}}</span>
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-700">
    
       
     </div>
   </div>
    </div>

</div>
   
   </div>
   </div>
@else 
<div class="tw-container tw-mx-auto tw-px-2 tw-py-2">
      <div class="tw-grid tw-grid-cols-1 tw-gap-6">
    
    
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
    
    </div>
   @endif
   @endsection