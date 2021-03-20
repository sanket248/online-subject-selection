@include('admin-navigation-menu')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: center;"><br/>
                {{ __('Subject Selection App Using Voting') }}
            </h1>
            <br/>
            <p>This app is used for online selection of subject in colleges/schooles.
            In this app, User can only vote to one subject for once and result can be shown after voting.
            If you try to see result before voting then it displays a message for voting.</p>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            </div>
        </div>
    </div>
</x-app-layout>