
<!DOCTYPE html>
<html lang="{{ get_lang() }}" dir="{{ current_language()->direction }}">
<head>
    


    @include($activeTheme.'layouts.includes.head')
    @include($activeTheme.'layouts.includes.styles')
    
    {!! head_code() !!}
    <script src="https://cdn.tailwindcss.com" >
  tailwind.config = {
        prefix: "tw-",
        corePlugins: {
            preflight: false,
        }
    };
</script>

  
</head>
<body class="{{ current_language()->direction }}">
  


@yield('content')
@include($activeTheme.'layouts.includes.addons')
@include($activeTheme.'layouts.includes.scripts')






</body>

</html>
