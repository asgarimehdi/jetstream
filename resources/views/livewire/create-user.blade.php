<div class="p-3">
    <form wire:submit="createUser">
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="name" wire:model="name"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "/>
            <label for="name"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">نام</label>
            @error('name')
            <span class="mt-2  text-sm text-red-500">
                 {{$message}}
                </span>
            @enderror
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="username" wire:model="username"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "/>
            <label for="username"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">نام
                کاربری</label>
            @error('username')
            <span class="mt-2  text-sm text-red-500">
                 {{$message}}
                </span>
            @enderror
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <input type="password" name="password" wire:model="password"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "/>
            <label for="password"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">پسورد</label>
            @error('password')
            <span class="mt-2  text-sm text-red-500">
                 {{$message}}
                </span>
            @enderror
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <input type="password" name="password_confirmation" wire:model="password_confirmation"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "/>
            <label for="password_confirmation"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">تکرار
                پسورد</label>

        </div>
        <div class="relative z-0 w-full mb-6 group">
            @include('livewire.includes.select-box',[
                                 'values'=>$roles,
                                 'default'=>'انتخاب کنید',
                                 'form'=>'role_id',
                                 'title'=>'نقش'
                             ])
            <label for="name"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">نقش</label>
            @error('role_id')
            <span class="mt-2  text-sm text-red-500">
                 {{$message}}
                </span>
            @enderror
        </div>
        <div class="relative z-0 w-full mb-6 group">
            @include('livewire.includes.select-box',[
                                 'values'=>$groups,
                                 'default'=>'انتخاب کنید',
                                 'form'=>'group_id',
                                 'title'=>'گروه کاربری'
                             ])
            <label for="name"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">گروه</label>
            @error('group_id')
            <span class="mt-2  text-sm text-red-500">
                 {{$message}}
                </span>
            @enderror
        </div>

        <div class="relative z-0 w-full mb-6 group">
            @include('livewire.includes.select-box',[
                                 'default'=>'انتخاب کنید',
                                 'values'=>$counties,
                                 'form'=>'county_id',
                                 'title'=>'شهرستان'
                             ])
            <label for="county_id"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">شهرستان</label>
            @error('county_id')
            <span class="mt-2  text-sm text-red-500">
                 {{$message}}
                </span>
            @enderror
        </div>
        @if($types)
            <div class="relative z-0 w-full mb-6 group">
                @include('livewire.includes.select-box',[
                                     'values'=>$types,
                                     'default'=>'انتخاب کنید',
                                     'form'=>'type_id',
                                     'title'=>'نوع مرکز'
                                 ])
                <label for="type_id"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">نوع</label>
                @error('type_id')
                <span class="mt-2  text-sm text-red-500">
                 {{$message}}
                </span>
                @enderror
            </div>
        @endif
        @if($centers)
            <div class="relative z-0 w-full mb-6 group">
                @include('livewire.includes.select-box',[
                                     'values'=>$centers,
                                     'default'=>'انتخاب کنید',
                                     'form'=>'center_id',
                                     'title'=>'مرکز'
                                 ])
                <label for="center_id"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">مرکز</label>
                @error('center_id')
                <span class="mt-2  text-sm text-red-500">
                 {{$message}}
                </span>
                @enderror
            </div>
        @endif
        @if($points)
            <div class="relative z-0 w-full mb-6 group">
                @include('livewire.includes.select-box',[
                                     'values'=>$points,
                                     'default'=>'انتخاب کنید',
                                     'form'=>'point_id',
                                     'title'=>'محل نهایی'
                                 ])
                <label for="center_id"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">نقطه</label>
                @error('point_id')
                <span class="mt-2  text-sm text-red-500">
                 {{$message}}
                </span>
                @enderror
            </div>
        @endif


        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            ثبت
        </button>
    </form>
    @if(session('success'))
        <h1>
            {{session('success')}}
        </h1>
    @endif
</div>
