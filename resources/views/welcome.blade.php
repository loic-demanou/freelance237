<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">

        <title>Home</title>
    </head>
    <body class="antialiased">

        <x-app-layout>
            <x-slot name="header" >
            </x-slot>
            
            <div class="container">
                <div class="total">
                    <div class="part1">
                        <div class="slogan">
                            <p>Easy and accessible <br> recruitment</p>
                            <article class="mb-5">Engage the largest network of trusted professionals <br> to unlock 
                                the full potential of your business.
                            </article>
                            <div class="link">
                                <a href="{{ route('candidates.list') }}" class="btn text-xl pt-3 font-weight-bold mr-1" 
                                style="background-color: #48406D; color:white; height:50px; width:140px">Find talent</a>
                                <a href="{{ route('jobs.index') }}" class="btn text-xl pt-3 font-weight-bold"
                                style="background: #E4E4E4; height:50px; width:140px; border:1px solid #48406D">Find work</a>
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('img/mainHome.png') }}" alt="image">
                        </div>
                    </div>
                    <div class="part2 mt-30">
                        <span style="border-bottom: 1px solid rgb(201, 113, 236);" class="w-100" >How it works ?</span>
                    </div>
                    <div class="row text-center pb-10">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <img src="{{ asset('img/home1.PNG') }}"  style="margin-left: 100px">
                            <p class="text-2xl my-2" style="" >Find</p>
                            <article>
                                Post a job and find quality job seeker
                            </article>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <img src="{{ asset('img/home2.PNG') }}"  style="margin-left: 120px">
                            <p class="text-2xl my-2" style="" >Hire</p>
                            <article>
                                Browse job seekers profiles and 
                                invite your favorite canditates
                                to sumit bids
                            </article>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <img src="{{ asset('img/home3.PNG') }}"  style="margin-left: 120px">
                            <p class="text-2xl my-2" style="" >Work</p>
                            <article>
                                Browse job seekers profiles and 
                                invite your favorite canditates
                                to sumit bids
                            </article>
                        </div>
                    </div>
                </div>
            </div>

        </x-app-layout>
        

    </body>
</html>
