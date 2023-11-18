<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
            مدیریت کاربران
        </h2>
    </x-slot>

    <div>
        <section class="mt-10">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class=" mx-auto bg-gradient-to-r from-green-200 via-green-100 to-green-200 relative shadow-lg sm:rounded-lg w-1/2" dir="rtl">
                    <livewire:create-user/>
                </div>
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex items-center justify-between d p-4">
                        <div class="flex">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                         fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input wire:model.live.debounce.300ms="search" type="text"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                       placeholder="جستجو" required="">
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            @include('livewire.includes.select-box',[
                                'values'=>$roles,
                                'default'=>'همه',
                                'form'=>'role_id',
                                'title'=>'نقش'
                            ])
                        </div>
                        <div class="flex space-x-3">

                            @include('livewire.includes.select-box',[
                                'values'=>$groups,
                                'default'=>'همه',
                                'form'=>'group_id',
                                'title'=>'گروه'
                            ])
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                @include('livewire.includes.table-sortable-th',[
                                    'name'=>'name',
                                    'displayName'=>'نام'
                                ])
                                @include('livewire.includes.table-sortable-th',[
                                    'name'=>'username',
                                    'displayName'=>'نام کاربری'
                                ])
                                @include('livewire.includes.table-sortable-th',[
                                    'name'=>'role_id',
                                    'displayName'=>'نقش'
                                ])
                                @include('livewire.includes.table-sortable-th',[
                                    'name'=>'group_id',
                                    'displayName'=>'گروه'
                                ])
                                @include('livewire.includes.table-sortable-th',[
                                    'name'=>'point_id',
                                    'displayName'=>'شهرستان'
                                ])
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr wire:key="{{$user->id}}" class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$user->name}}</th>
                                    <td class="px-4 py-3">{{$user->username}}</td>
                                    <td class="px-4 py-3 {{($user->role_id=='1') ? 'text-green-500' : 'text-blue-500'}} ">
                                        {{$user->role->name}}</td>
                                    <td class="px-4 py-3">{{$user->group->name}}</td>
                                    <td class="px-4 py-3">{{$user->region_point->region_center->region_county->name}}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button onClick="confirm('Are you sure?')" wire:click="delete({{$user->id}})"
                                                class="px-3 py-1 bg-red-500 text-white rounded">X
                                        </button> -
                                        <button  wire:click="viewUser({{$user->id}})"
                                                 class="px-3 py-1 bg-green-500 text-white rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>

                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                    @if($selectedUser)--}}
                    <x-my-modal name="user-details" :title="@$selectedUser->name">
                        <x-slot:body>
                           {{@$selectedUser->username}}

                            <br>
                            {{@$selectedUser->region_point->name}}
                            <br>
                            {{@$selectedUser->region_point->region_center->name}}
                            <br>
                            {{@$selectedUser->region_point->region_center->region_county->name}}
                        </x-slot:body>
                    </x-my-modal>
{{--                    @endif--}}
                    <div class="py-4 px-3">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                <select
                                    wire:model.live="perPage"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
