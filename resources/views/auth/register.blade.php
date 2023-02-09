
@extends('layout.app')

@section('title', 'Register')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border-gray-200 rounded-lg shadow-lg">
    <h1 class="text-3xl text-center font-bold">Registrar</h1>

    <form class="mt-4" method="POST" action="">
        @scrf
        <input type="text" class="border border-gray-200 rounded-md bg-gray-200
        w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-while" placeholder="Nombre"
        id="name" name="name">
        </input>
    
        <input type="email" class="border border-gray-200 rounded-md bg-gray-200
        w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-while" placeholder="Usuario"
        id="email" name="email">
        </input>

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200
        w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-while" placeholder="Contraseña"
        id="password" name="password">
        </input>

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200
        w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-while" placeholder="Confirmar Contraseña"
        id="password confirm" name="password confirm">
        </input>

        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
        text-while font-semibold p-2 my-3 hover:bg-indigo-600">
            Entrar
        </button>

    </form>
</div>

@endSection