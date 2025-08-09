<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- REQUIRED META TAGS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/css/custom.css') }}">
    <!-- PAGE TITLE -->
    <title>{{ Settings::group('company')->get('company_name') }}</title>
@php
    $themeColor = \Settings::group('site')->get('site_theme_color') ?? '253 139 14';
@endphp

<style>
    :root {
        --primary: {{ $themeColor }};
    }
    .bg-secondary {
    background-color: rgb(var(--primary) / var(--tw-bg-opacity, 1));
    }
    .simple-range-slider-bar {
    background: rgb(var(--primary));
    }
    .bg-admin-orange\/10 {
    background-color: rgb(var(--primary) / .05);
    }
    .text-admin-orange {
        color: rgb(var(--primary));
    }
    .bg-\[\#FFEBD8\] {
    background-color: rgb(var(--primary) / .2);
    }
    .bg-\[\#FFEDF4\] {
        background-color: rgb(var(--primary) / .3);
    }
    .shadow-cart {
    --tw-shadow: 0px 6px 10px rgb(var(--primary));
    }
    .shadow-btn-primary {
        --tw-shadow: 0px 8px 15px rgb(var(--primary));
    }
    .bg-primary-slate {
    background-color: rgb(var(--primary) / .1);
    }
    .bg-\[\#FFF4F1\] {
    background-color: rgb(var(--primary) / .1);
    }
    .\!bg-\[\#FFF4F1\] {
    background-color: rgb(var(--primary) / .1);
    }
    .\!text-primary {
    background-color: rgb(var(--primary) / .1);
    }
    a.active.router-link-exact-active {
    background-color: unset;
    }
</style>
    <!-- FAV ICON -->
    <link rel="icon" type="image" href="{{ $favicon }}">

    @if (!blank($analytics))
        @foreach ($analytics as $analytic)
            @if (!blank($analytic->analyticSections))
                @foreach ($analytic->analyticSections as $section)
                    @if ($section->section == \App\Enums\AnalyticSection::HEAD)
                        {!! $section->data !!}
                    @endif
                @endforeach
            @endif
        @endforeach
    @endif
    @laravelPWA
</head>

<body>
    @if (!blank($analytics))
        @foreach ($analytics as $analytic)
            @if (!blank($analytic->analyticSections))
                @foreach ($analytic->analyticSections as $section)
                    @if ($section->section == \App\Enums\AnalyticSection::BODY)
                        {!! $section->data !!}
                    @endif
                @endforeach
            @endif
        @endforeach
    @endif

    <div id="app"></div>

    @if (!blank($analytics))
        @foreach ($analytics as $analytic)
            @if (!blank($analytic->analyticSections))
                @foreach ($analytic->analyticSections as $section)
                    @if ($section->section == \App\Enums\AnalyticSection::FOOTER)
                        {!! $section->data !!}
                    @endif
                @endforeach
            @endif
        @endforeach
    @endif

    <script>
        const APP_URL = "{{ env('MIX_HOST') }}";
        const APP_DEMO = "{{ env('MIX_DEMO') }}";
        const APP_KEY = "{{ env('MIX_API_KEY') }}";
    </script>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('themes/default/js/modal.js') }}"></script>
    <script src="{{ asset('themes/default/js/customScript.js') }}"></script>
    <script src="{{ asset('pwa/index.js') }}"></script>
    <script src="{{ asset('themes/default/js/tabs.js') }}"></script>

</body>

</html>
