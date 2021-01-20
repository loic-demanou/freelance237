<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="antialiased">

        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add a new freelance mission') }}
                </h2>
            </x-slot>
            <p class="jumbotron">le test des sections avec blade</p>





            <div class="slider">
                <div class="slides">
                    <div class="slide">
                        <div class="slide-data">
                            <h1>This is Slide # 1</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit veniam fuga voluptatem voluptas illum deserunt soluta quasi ipsam quam qui eligendi autem laudantium inventore, voluptatibus blanditiis nobis, tempora architecto atque.</p>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-data">
                            <h1>This is Slide # 2</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit veniam fuga voluptatem voluptas illum deserunt soluta quasi ipsam quam qui eligendi autem laudantium inventore, voluptatibus blanditiis nobis, tempora architecto atque.</p>
                            <button>COMMENT</button>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-data">
                            <h1>This is Slide # 3</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit veniam fuga voluptatem voluptas illum deserunt soluta quasi ipsam quam qui eligendi autem laudantium inventore, voluptatibus blanditiis nobis, tempora architecto atque.</p>
                            <button>SHARE</button>
                        </div>
                    </div>
                </div>
        
                <button class="arrows prev" onclick="plusslide(-1)">
                    <span><i class="fas fa-angle-left"></i></span>
                </button>
                <button class="arrows next" onclick="plusslide(1)">
                    <span><i class="fas fa-angle-right"></i></span>
                </button>
        
                <div class="dots">
                    <span onclick="currentslide(1)"></span>
                    <span onclick="currentslide(2)"></span>
                    <span onclick="currentslide(3)"></span>
                </div>
            </div>
                      <div class="container">
                  <p class="btn btn-primary">le test du slide</p>
                  <p class="btn btn-primary">le test du slide</p>
                  <p class="btn btn-primary">le test du slide</p>
                  <p class="btn btn-primary">le test du slide</p>
                  <p class="btn btn-primary">le test du slide</p>
                  <p class="btn btn-primary">le test du slide</p>
                  <p class="btn btn-primary">le test du slide</p>
                  <p class="btn btn-primary">le test du slide</p>

              </div>



        </x-app-layout>
        

    </body>
</html>
