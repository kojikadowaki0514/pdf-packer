<x-app-layout>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
        <a href="{{ route('uploads.create') }}" class="button-upload">
           ファイルのアップロード
        </a>
    </x-slot>

    
</x-app-layout>
