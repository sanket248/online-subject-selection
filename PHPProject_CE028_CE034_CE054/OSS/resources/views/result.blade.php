@livewire('navigation-menu')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                <div style="text-align: center;" class="p-6 sm:px-20 bg-white border-b border-gray-200">
    
            <div class="mt-8 text-2xl flex justify-between">
                <div>Result</div>
            </div>
    <div class="mt-6">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        Subject ID
                    </th>
                    <th class="px-4 py-2">
                        Subject Name
                    </th>
                    <th class="px-4 py-2">
                        Votes
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td class="border px-4 py-2">{{ $subject->id}}</td>
                        <td class="border px-4 py-2">{{ $subject->name}}</td>
                        <td class="border px-4 py-2">{{ $votes[$subject->id]}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
                </div><br/>
                <div style="text-align:center;">Total votes = {{$total_votes}}</div>
                </h1>
                
            </div>
        </div>
    </div>
</x-app-layout>