@extends('front.Projects.master')

@section('title', '404')
@section('position', 'fixed')
@section('opacity', 'bg-opacity-0')
@section('display', 'hidden')
@section('textColor', 'text-white')

@section('content')

<section class="py-3 md:py-5 h-screen flex justify-center items-center bg-white">
  <div class="w-full h-full flex justify-center items-center">
    <div class="w-max">
      <h2 class="flex flex-nowrap justify-center items-center gap-2 mb-4 text-9xl text-[#a11e22] font-bold p-5">
        <span class="">4</span>
        <span class="">0</span>
        <span class="">3</span>
      </h2>
      <h3 class="text-4xl text-[#a11e22] mb-4 text-center">Forbidden!!!</h3>
      <p class="mb-10">Access to this resource on the server is denied!</p>
      <div class="flex justify-center">
        <a class="ires-pri-btn px-8 py-1" href="/" role="button">Go Home</a>
      </div>
    </div>
  </div>
</section>

@endsection

@section('js_content')

<script src="{{ asset('front/Projects/js/header_scroll.js')}}"></script>

@endsection