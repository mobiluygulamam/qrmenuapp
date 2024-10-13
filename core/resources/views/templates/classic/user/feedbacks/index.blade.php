@extends($activeTheme.'layouts.app')
@section('title', ___('feedbacks'))

@if(!empty($menu_languages))
    @section('header_buttons')
   
    @endsection
@endif
@section('content')
    @if($isUserSubscriber)
    <div class="tw-container tw-mx-auto tw-px-2 tw-py-2">
  <div class="tw-grid tw-grid-cols-1 tw-gap-6">
     @if (count($feedbacks))
@foreach($feedbacks as $feedback)
    <div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-p-3 tw-mb-2 tw-flex tw-flex-col tw-items-start">
     <div class="tw-flex tw-justify-between tw-w-full">
       <div class="tw-text-lg tw-font-semibold tw-text-zinc-900">{{___('restaurant_name')}}: <span class="tw-text-blue-600">{{$feedback["restoranname"]}}</span></div>
       
     
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-600">
       <span class="tw-font-semibold">{{___('rating')}}: </span>
       <span class="tw-bg-green-100 tw-text-green-600 tw-px-2 tw-py-1 tw-rounded-lg">{{$feedback["rating"]}}/5</span>
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-700">
       <span class="tw-font-semibold">{{___('comment')}}: </span>
       {{$feedback["comment"]}}
     </div>
   </div>
   @endforeach
@else 
<div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-p-3 tw-mb-2 tw-flex tw-flex-col tw-items-start">
     <div class="tw-flex tw-justify-between tw-w-full">
       <div class="tw-text-lg tw-font-semibold tw-text-zinc-900"></div>
       
     
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-600">
      
       <span>{{___('no_feedback')}}</span>
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-700">
    
       
     </div>
   </div>
    </div>
    @endif
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