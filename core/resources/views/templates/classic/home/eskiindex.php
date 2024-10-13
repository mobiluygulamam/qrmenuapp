@extends($activeTheme.'layouts.mainindex')

@section('content')
<style> .gradient-custom{
     /* Chrome 10-25, Safari 5.1-6 */
     /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(
        to top,
        rgba(66, 136, 244, 0.7),
        rgba(106, 148, 245, 0.7),
        rgba(134, 161, 245, 0.7),
        rgba(158, 174, 246, 0.7),
        rgba(66, 136, 244, 0.7)

        
    );

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(
        to top,
        rgba(66, 136, 244, 0.7),
        rgba(106, 148, 245, 0.7),
        rgba(134, 161, 245, 0.7),
        rgba(158, 174, 246, 0.7),
        rgba(66, 136, 244, 0.7)

       
    );
 }
 </style>
 <div class="relative ">
     <div class="signbutton absolute right-10 top-10">
          <a href="#sign-in-dialog" class="popup-with-zoom-anim button ripple-effect">Şimdi Katılın</a>
         </div>
<div class="hero-section  " style="height:20%;">
    
     <div class="container-fluid gradient-custom" style="height:20%;">
         
         <div class="row justify-content-center d-flex justify-content-center align-items-center h-50" style="min-height: 100vh;">
        
          <div class="col-md-12">
                 <div class="text-center hero-content position-relative ">
                    <div class="d-flex justify-content-center text-center position-fixed " style="background-color: rgba(0, 0, 0, 0.5); top: 0; left: 0; right: 0; bottom: 0;"></div>
                                         <h1 class="fw-bold text-white" style="font-size: 56px;">
                       

                         {{___('header_message')}}
                                         </h1>
<div class="m-24"></div>
                     <p class="text-white" style="font-size: 24px;">{{___('header_sub_message')}}</p>

                 </div>
             </div>
         </div>
     </div>
 </div></div>



 <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
     <div class="flex w-full">
         <div class="w-2/5 text-middle">
             <h2><i class="icon-feather-mail"></i> {{ ___('limited_time_offer') }}</h2>
             <p class="tw-text-middle">{{ ___('month_free_formail') }}</p>
         </div>

         <div class="w-3/5">
             <form action="{{ route('newsletter') }}" method="post" class="newsletter" id="newsletter-form">
                 @csrf
                 <input type="email" name="email" class="form-control" id="newsletter-email"
                        placeholder="{{ ___('Enter your email address') }}">
                 <div class="invalid-tooltip"></div>
                 <div class="valid-tooltip d-none">{{ ___('Subscribed Successfully.') }}</div>
                 <button type="submit"><i class="icon-feather-arrow-right"></i></button>
             </form>
         </div>
     </div>
 </div>
 <div class="bg-[#F7F7F7] font-[sans-serif]">
     <div class="max-w-6xl mx-auto py-16 px-4">
       <h2 class="text-gray-800 text-4xl font-extrabold text-center mb-16">{{ ___('empowering_features') }}
     </h2>

       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-md:max-w-md mx-auto">
         <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all">
           <div class="p-8 text-medium">
               <i class="fa-brands fa-jedi-order "></i>
             <h3 class="text-gray-800 text-xl font-semibold mb-3">{{ ___('fast_order_delivery') }}
          </h3>
          <p class="text-gray-500 text-sm leading-relaxed">{{ ___('customers_order_without_waiting') }}</p>
     </div>
         </div>

         <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all">
           <div class="p-8">
            
               <i class="fa-solid fa-shield"></i>
               <h3 class="text-gray-800 text-xl font-semibold mb-3">{{ ___('full_control') }}</h3>
               <p class="text-gray-500 text-sm leading-relaxed">{{ ___('orders_instantly_reach_kitchen') }}</p>
          </div>
         </div>

         <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all">
           <div class="p-8">
               <i class="fa-regular fa-user"></i>
<h3 class="text-gray-800 text-xl font-semibold mb-3">{{ ___('flawless_customer_experience') }}</h3>
<p class="text-gray-500 text-sm leading-relaxed">{{ ___('customers_easy_access_menu') }}</p>

           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="bg-gray-100 justify-center items-center flex-1 p-5  text-center">
     <a href="{{ route('register') }}"  id="login-button" class="rounded rounded-lg animate-bounce delay-150 duration-300 button w-1/2 min-h-16  button-sliding-icon ripple-effect " type="submit"
     ><span class="text-xl">{{ ___('create_an_menu_in_1min') }}
          </span> <i class="icon-feather-arrow-right"></i></a>
       
</div>

   <section class="bg-gray-100 py-16">
     <div class="container mx-auto">
       <h2 class="text-center text-3xl font-bold text-gray-800 mb-12">
          {{ ___('three_steps_simple_use') }}

       </h2>
       
       <div class="grid grid-cols-1 md:grid-cols-3 gap-10 ">
         
         <!-- Adım 1 -->
         <div class="bg-white rounded-lg shadow-lg text-center h-100 ">
          <div class="rounded-lg">
            <img class="rounded-lg" src="{{ asset($activeThemeAssets.'images/qrmenu.png') }}" alt="">
          </div>
        
   
        
     <div class="m-8"><h3 class="text-xl font-bold text-gray-800">QR ile Menünüzü Paylaşın</h3>
          <p class="text-gray-600">Menünüzü QR ile paylaşın, müşterilerinizle bağ kurun.</p></div>
        </div>
        
   
         <!-- Adım 2 -->
         <div class="bg-white rounded-lg shadow-lg text-center h-100 ">
          <div class="rounded-lg">
            <img class="rounded-lg" src="{{ asset($activeThemeAssets.'images/selectmenu.png') }}" alt="">
          </div>
        
   
        
     <div class="m-8"><h3 class="text-xl font-bold text-gray-800">Müşteriler Menüleri Seçsin</h3>
          <p class="text-gray-600">Müşterileriniz, istedikleri menüleri kolayca seçsin.</p></div>
        </div>
   
         <!-- Adım 3 -->

   
         <div class="bg-white rounded-lg shadow-lg text-center h-100 ">
          <div class="rounded-lg">
            <img class="rounded-lg" src="{{ asset($activeThemeAssets.'images/kitchen.png') }}" alt="">
          </div>
        
   
        
     <div class="m-8"><h3 class="text-xl font-bold text-gray-800">Siparişler Mutfağa Ulaşsın</h3>
          <p class="text-gray-600">Siparişler hızlıca mutfağa ulaşsın, her şey kusursuz işlesin.</p></div>
        </div>
       </div>
     </div>
   </section>

     <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
          <div class="flex w-full">
              <div class="w-2/5 text-middle">
                  <h2><i class="icon-feather-mail"></i> {{ ___('limited_time_offer') }}</h2>
                  <p class="tw-text-middle">{{ ___('month_free_formail') }}</p>
              </div>
             
              <div class="w-3/5">
                  <form action="{{ route('newsletter') }}" method="post" class="newsletter" id="newsletter-form">
                      @csrf
                      <input type="email" name="email" class="form-control" id="newsletter-email"
                             placeholder="{{ ___('Enter your email address') }}">
                      <div class="invalid-tooltip"></div>
                      <div class="valid-tooltip d-none">{{ ___('Subscribed Successfully.') }}</div>
                      <button type="submit"><i class="icon-feather-arrow-right"></i></button>
                  </form>
              </div>
          </div>
      </div>
<div class="bg-gray-50 pt-24 pb-24">

     <div class="max-w-6xl mx-auto font-[sans-serif] ">
          <div class="text-center max-w-2xl mx-auto bg-gray-50">
            <h2 class="text-gray-800 text-3xl font-extrabold text-center mb-6">Ayrıcalıklı Özellikler</h2>
            <p class="text-gray-600 text-md">Eşsiz özelliklerimizle işletmenizi yeni bir seviyeye taşıyın. CraftOrder'ın sunduğu çözümlerle süreçlerinizi hızlandırın, müşteri memnuniyetini artırın ve daha fazlasını başarma gücünü kazanın.

            </p>
          </div>
     
          <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
            <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
              <div>
                <h3 class="text-gray-800 text-2xl font-bold mb-4">QR Menü Paylaşımı</h3>
                <p class="text-gray-600 text-sm"></p>
     
                <ul class="space-y-4 mt-8">
                  <li class="flex items-center gap-3 text-md text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    QR kod ile temassız menü sunun
                  </li>
                  <li class="flex items-center gap-3 text-md text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    Menünüzü hızla paylaşın
                  </li>
                  <li class="flex items-center gap-3 text-md text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    QR kod ile dijitalleşin
                  </li>
               
                </ul>
              </div>

              <img src="{{ asset($activeThemeAssets.'images/qrmenu-21.png') }}" class="w-full object-contain rounded-md" />
            </div>

          </div>

          <div class="h-36"></div>
          <!--- Data ---->

          <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
               <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
                    <img src="{{ asset($activeThemeAssets.'images/siparis-yonetimi-1.png') }}" class="w-full object-contain rounded-md" />

                 <div>
                   <h3 class="text-gray-800 text-2xl font-bold mb-4">Anlık Sipariş Yönetimi
               </h3>
        
                   <ul class="space-y-4 mt-8">
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Müşteriler QR ile menüye ulaşsın
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Siparişler anında verilsin
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Siparişler hızlıca mutfağa ulaşsın
                     </li>
                  
                   </ul>
                 </div>
               </div>
   
             </div>
             <div class="h-36"></div>


          
          <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
               <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
                 <div>
                   <h3 class="text-gray-800 text-2xl font-bold mb-4">Personel Yönetimi</h3>
        
                   <ul class="space-y-4 mt-8">
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Personel performansını anında takip edin
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Verimliliği artırmak için değerlendirin
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       İş akışını kolayca yönetin
                     </li>
                 
                   </ul>
                 </div>
                 <img src="{{ asset($activeThemeAssets.'images/personel-yonetimi.png') }}" class="w-full object-contain rounded-md" />
               </div>
   
             </div>

             <div class="h-36"></div>

              <!--- Data ---->
              <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
               <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
                    <img src="{{ asset($activeThemeAssets.'images/feedback.png') }}" class="w-full object-contain rounded-md" />

                 <div>
                   <h3 class="text-gray-800 text-2xl font-bold mb-4">Geri Bildirim Sistemi</h3>
                   <p class="text-gray-600 text-md">Müşterilerinizin geri bildirimleriyle hizmet kalitenizi sürekli geliştirin; sipariş sonrası yorumları toplayarak memnuniyet seviyesini ölçebilir ve işinizi daha ileriye taşıyabilirsiniz.</p>
        
                   <ul class="space-y-4 mt-8">
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Müşteri yorumlarını toplayın
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Hizmet kalitesini artırın
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Memnuniyet düzeyini ölçün
                     </li>
                 
                   </ul>
                 </div>
               </div>
   
             </div>
               <!--- Data ---->

               <div class="h-36"></div>

           
              <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
               <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
                 <div>
                   <h3 class="text-gray-800 text-2xl font-bold mb-4">Hazır Menü Görselleri ve Kategoriler</h3>
                   <p class="text-gray-600 text-md">Ürün görselleriyle menünüzü zenginleştirin.</p>
        
                   <ul class="space-y-4 mt-8">
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Kategorilerle müşterilerinizi yönlendirin.
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Kategorilerle müşterilerinizi yönlendirin.
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Görsellerle tercihleri kolaylaştırın.
                     </li>
                 
                   </ul>
                 </div>
                 <img src="{{ asset($activeThemeAssets.'images/product-image.png') }}" class="w-full object-contain rounded-md" />
               </div>
   
             </div>
               <!--- Data ---->
        </div>

        
</div>

<div class="bg-gray-50 justify-center items-center flex-1 p-5  text-center">
     <a  href="{{ route('register') }}" id="login-button" class="rounded rounded-lg animate-bounce delay-150 duration-300 button w-1/2 min-h-16  button-sliding-icon ripple-effect " type="submit"
     name="submit"><span class="text-xl">{{ ___('create_an_menu_in_1min') }}
          </span> <i class="icon-feather-arrow-right"></i></a>
        
</div>
<div class="my-5 font-[sans-serif] divide-y rounded-lg max-w-7xl mx-auto px-4">
     <div class="mb-8">
       <h2 class="text-2xl font-bold text-gray-800">Sık sorulan sorular</h2>
     </div>
   
     <!-- Accordion Item 1 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">CraftOrder’ı denemek için ücret ödemem gerekiyor mu?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Hayır, CraftOrder’ı 7 gün boyunca ücretsiz olarak deneyebilirsiniz. Ücretsiz deneme süresi boyunca tüm özellikleri keşfedebilirsiniz.</p>
       </div>
     </div>
   
     <!-- Accordion Item 2 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">7 günlük ücretsiz deneme süresi dolduğunda ne olacak?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Ücretsiz deneme süreniz sona erdiğinde, size uygun bir abonelik planı seçerek kullanıma devam edebilirsiniz. Planlar arasında aylık, 6 aylık ve yıllık seçenekler mevcuttur.</p>
       </div>
     </div>
   
     <!-- Accordion Item 3 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">CraftOrder hangi işletmeler için uygundur?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">CraftOrder, restoranlar, cafeler, oteller ve benzeri işletmeler için tasarlanmıştır. Müşterilerin QR kodu ile kolayca menüye ulaşmasını ve sipariş vermesini sağlar.</p>
       </div>
     </div>
   
     <!-- Accordion Item 4 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Siparişler nasıl iletiliyor?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Müşteriler QR kodu tarayarak menüye ulaşır ve siparişlerini verir. Siparişler anında mutfağa iletilir ve gerçek zamanlı olarak takip edilebilir.</p>
       </div>
     </div>
   
     <!-- Accordion Item 5 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Farklı paket seçenekleriniz neler?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">CraftOrder üç farklı paket sunar: Aylık (Pro), 6 Aylık (Infinity Plan), ve Yıllık (Prime). Her paket, tüm özelliklere erişim sağlar ve işletmenizin ihtiyaçlarına uygun çözümler sunar.</p>
       </div>
     </div>
   
     <!-- Accordion Item 6 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Müşteri geri bildirimlerini nasıl alabilirim?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">CraftOrder, müşterilerinizin sipariş sonrası geri bildirim bırakmasına olanak tanır. Bu geri bildirimlerle hizmet kalitenizi geliştirebilirsiniz.</p>
       </div>
     </div>
   
     <!-- Accordion Item 7 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Hangi teknolojilerle entegre çalışıyor?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">CraftOrder, herhangi bir cihazla uyumlu şekilde çalışır. Müşteriler, akıllı telefonlarından QR kodu tarayarak hızlıca sipariş verebilir.</p>
       </div>
     </div>
   
     <!-- Accordion Item 8 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Birden fazla şubem varsa kullanabilir miyim?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Evet, CraftOrder çoklu şube desteği sunar. Birden fazla lokasyon için kolayca yönetim sağlayabilirsiniz.</p>
       </div>
     </div>
   
     <!-- Accordion Item 9 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Sipariş ve masa yönetimi gerçek zamanlı mı?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Evet, tüm siparişler ve masa yönetimi gerçek zamanlı olarak takip edilir. Mutfak, servis ekibi ve yönetici anlık olarak siparişleri görebilir.</p>
       </div>
     </div>
   
     <!-- Accordion Item 10 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Abonelik planımı değiştirebilir miyim?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Evet, mevcut planınızı yükseltmek veya düşürmek istediğinizde, planınızı kolayca değiştirebilirsiniz.</p>
       </div>

  
      

      
       
     </div>
     
 
   </div>



   <script>
     // Tüm accordion butonlarını seç
     const accordionButtons = document.querySelectorAll('.accordion-button');
   
     // Her bir butona tıklandığında içerik açma/kapama işlemini yap
     accordionButtons.forEach(button => {
       button.addEventListener('click', () => {
         // Butona tıklandığında yanındaki içerik bölümünü seç
         const content = button.nextElementSibling;
   
         // İçerik zaten açıksa kapat
         if (content.classList.contains('hidden')) {
           // Diğer açık olanları kapat
           document.querySelectorAll('.accordion-content').forEach(otherContent => {
             otherContent.classList.add('hidden');
           });
   
           // Tıklanan accordion'u aç
           content.classList.remove('hidden');
         } else {
           // Eğer zaten açık ise kapat
           content.classList.add('hidden');
         }
       });
     });
   </script>
   
   

   

 @include($activeTheme.'layouts.includes.customfooter', ['pages' => []]) <!-- customfooter'ı burada çağırın -->

 
@endsection
