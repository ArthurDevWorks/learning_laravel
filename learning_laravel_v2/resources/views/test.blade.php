<x-app-layout>
    <x-slot name="header">
    <header>Bem Vindo {{$name}} !</header>
    </x-slot>
    <ol>
        {{-- First version, quando as atividades da controller estava definida na propria view 
        <li>Nome: {{ auth()->user()->name }}</li>
        <li>Documento: {{ auth()->user()->client->document }}</li>
        <li>Status da Assinatura: {{ auth()->user()->client->signatures->first()->status->name }}</li> 
        --}}
        Dados do Usuario:
        <li>Nome: {{$name}}</li>
        <li>Documento: {{$document}}</li>
        <li>Status da Assinatura: {{$status}}</li> 
        <li>Bebida: {{$params}}</li>
    </ol>
</x-app-layout> 