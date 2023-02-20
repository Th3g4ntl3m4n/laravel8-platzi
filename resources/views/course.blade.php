@extends('web')

@section('content')

<div class="grid grid-cols-3 gap-4">
    <div class="p-8 bg-gray-200 col-span-1">
        <div class="flex flex-col">
            <li class="font-medium text-gray-400 uppercase mb-4">
                contenido
            </li>
            @foreach ( $course->posts as $post )
               <li class="flex items-center text-gray-600 mt-2">
                    {{ $post->name }}

                    <!-- si la leccion es gratuita -->
                    @if($post->free)
                        <span 
                        class="text-xs text-gray-500 font-semibold bg-gray-300 rounded-full ml-auto">Gratis</span>
                    @endif()
               </li> 
            @endforeach
        </div>
    </div>
    <!-- Otra columna -->
    <div class="text-gray-700 col-span-2">
        <img src="{{ $course->image}}" alt="">
        <h2 class="text-4xl"> {{ $course -> name}}</h2>
        <p> {{ $course -> description}}</p>
        <div class="">
            <img src="{{ $course->user->avatar}}"
            class="h-10 w-10 rounded-full mr-2" alt="">
        </div>
        <div class="text-gray-500 text-sm">
            <p> {{ $course->user->name }} </p>
        </div>
        <div class="text-gray-300 text-xs">
            <p> {{ $course->created_at->diffForHumans() }} </p>
        </div>
    </div>

    <!-- cursos similares --> 
    <div class="grid grid-cols-2 gap-4 my-8">
    @foreach ( $course->similar() as $course )
    
    <!--componente blade-->
    <x-course-card :course="$course" />
       
    @endforeach
    </div>
</div>

    <div class="text-center">
        <h1 class="text-3xl text-gray-700 mb-2 uppercase">Ultimos Cursos</h1>
        <h2 class="text-xl text-gray-600">Formate online como profesional en tecnologia</h2>
    </div>

    <livewire:course-list>
@endsection