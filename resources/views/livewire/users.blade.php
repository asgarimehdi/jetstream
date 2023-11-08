<div dir="rtl">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
            مدیریت کاربران
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div
                    class="p-6 lg:p-8  border-b border-gray-200 bg-gradient-to-r from-rose-200 via-fuchsia-200 to-white">


                    <h1 class="mt-2 text-2xl font-medium text-gray-900">
                        Welcome to User manager
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        this is user manager table
                    </p>

                    @foreach($users as $user)

                        {{$user->id}} -
                        {{$user->name}} <br/>
                    @endforeach
                    <div x-data="{ open: false }">
                        <button x-on:click="open = ! open">Toggle Dropdown</button>
                        <div x-show="open">
                            <x-modal>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                            </svg>
                                        </div>

                                        <div class="mt-3 text-center sm:mt-0 sm:ms-4 sm:text-start">
                                            <h3 class="text-lg font-medium text-gray-900">
                                                {{--                                        {{ $title }}--}}
                                                Hello
                                            </h3>

                                            <div class="mt-4 text-sm text-gray-600">
                                                {{--                                        {{ $content }}--}}
                                                Contentaam
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-end">
                                    {{--                            {{ $footer }}--}}

                                    Footer hastam
                                </div>
                            </x-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
