<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="theme-color" content="{{ $settings->theme_color }}">
@php
    $title = $__env->yieldContent('title') ? $__env->yieldContent('title') . ' - ' . $settings->site_title : $settings->site_title;
    $description = $__env->yieldContent('description') ? $__env->yieldContent('description') : $settings->meta_description;

    $ogImage = $__env->yieldContent('og_image') ? $__env->yieldContent('og_image') : asset('storage/logo/'.@$settings->social_share_image);
@endphp
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $settings->meta_keywords }}">
<link rel="alternate" hreflang="x-default" href="{{ url('/') }}" />
@if(@$settings->include_language_code)
    @foreach ($languages as $language)
        <link rel="alternate" hreflang="{{ $language->code }}" href="{{ url($language->code) }}" />
    @endforeach
@endif
<meta name="language" content="{{ get_lang() }}">
<meta name="author" content="{{ $settings->site_title }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:site_name" content="{{ $settings->site_title }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image:width" content="600">
<meta property="og:image:height" content="315">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:image:src" content="{{ $ogImage }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="theme" content="{{ active_theme_name() }}">
<title>{!! page_title($__env) !!}</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/logo/'.$settings->site_favicon) }}">
<style>
     .joinusertoast {
         background-color: #28a745; /* Yeşil arka plan */
         color: #28a745; /* Yeşil metin */
         padding: 15px;
         border-radius: 5px;
         position: fixed;
         top: 20px;
         right: 20px;
         z-index: 1000;
         box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Hafif gölge */
     }
 </style>
 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JG877XFZ27"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JG877XFZ27');
</script
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '524727470186556');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=524727470186556&ev=PageView&noscript=1"
/></noscript>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5CPK86GW');</script>
<!-- End Google Tag Manager -->
<!-- End Meta Pixel Code -->