
@extends('layout.app')

@section('content')

<div>
       <button class="button">Iniciar Periodo Escolar</button>
   </div>

<style>
.button {
  display: inline-block;
  padding: 42px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}
.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>

@endSection
