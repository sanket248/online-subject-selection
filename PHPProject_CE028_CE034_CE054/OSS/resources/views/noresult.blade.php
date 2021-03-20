@livewire('navigation-menu')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vote') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                <div style="text-align: center;" class="p-6 sm:px-20 bg-white border-b border-gray-200">
    
            <div class="mt-8 text-2xl flex justify-between">
                <div>Give a vote to see result</div>
                <div class="mr-2" style="text-align: right;">
                    <a href="{{ route('vote') }}" class="bg-yellow-300 hover:bg-yellow-500">Vote</a>
                </div>
            </div>

                </div>
                </h1>
            </div>
        </div>
    </div>
</x-app-layout>