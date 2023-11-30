@props(['name','title'])
<div
    x-data="{show : false,name:'{{$name}}'}"
    x-show="show"
    x-on:open-modal.window="show=($event.detail.name===name)"
    x-on:close-modal.window="show=false"
    x-on:keydown.escape.window="show=false"
    style="display: none"
    x-transition
    class="fixed z-50 inset-0">
    {{--    Gray Background--}}
    <div x-on:click="show=false" class="fixed inset-0 bg-gray-800 opacity-60"></div>
    {{--    Modal Body--}}
    <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl overflow-auto my-5">

        <span class="bg-red-300 rounded mt-1 mb-1 mx-1 p-1 fixed cursor-pointer" x-on:click="$dispatch('close-modal') ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
        </span>
        @if(isset($title))
            <div class="py-3 flex items-center justify-center">
                {{$title}}
            </div>
        @endif
        <div class="p-5" dir="rtl">{{$body}}</div>

    </div>
</div>
