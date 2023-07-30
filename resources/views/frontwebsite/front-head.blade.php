<!doctype html>
<html class="no-js" lang="en">
@php
    $viewslideonfront = App\Models\Slide::all();
    $viewCms = App\Models\CMS::all();
    $viewHeader = App\Models\Brand::all();
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Themepul">
    @foreach ($viewHeader as $tagline)
        <title> {{ $tagline->sg_brand_tagline }} </title>
    @endforeach
    @foreach ($viewHeader as $faviconIcon)
        <link href="{{ asset('/images/brandimages/' . $faviconIcon->sg_favicon_icon) }}" rel="icon" />
    @endforeach
    <!-- BOOTSTRAP CSS -->
    @include('frontwebsite.front-style')
</head>
