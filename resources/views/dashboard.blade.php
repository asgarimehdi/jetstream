<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" dir="rtl">

                <x-my-modal name="test" title="Modal 2">
                    <x-slot:body>
                        متن اصلی تستی اول
                    </x-slot:body>
                </x-my-modal>
                <x-my-modal name="new-user" title="کاربر جدید">
                    <x-slot:body>
                        <livewire:create-user/>
                    </x-slot:body>
                </x-my-modal>
                <button x-data x-on:click="$dispatch('open-modal',{name:'test'})" class="px-3 py-1 bg-teal-500 text-white rounded">
                    Open Modal
                </button>
                <button x-data x-on:click="$dispatch('open-modal',{name:'new-user'})" class="px-3 py-1 bg-teal-500 text-white rounded">
                    new-user
                </button>


                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
