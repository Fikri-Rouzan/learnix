@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <x-nav />
    <x-header />
    <x-goal />
    <x-category :categories="$categories" />
    <x-workshop :newWorkshops="$newWorkshops" />

    <div class="w-full py-[52px] bg-white mt-[100px]">
        <x-testimonial />
        <x-benefit />
    </div>

    <x-join-now />
    <x-footer />
@endsection
