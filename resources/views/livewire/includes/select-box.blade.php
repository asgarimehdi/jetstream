<div class="flex space-x-3 items-center">
    <label class="w-40 text-sm font-medium text-gray-900">{{$title}} :</label>
    <select
        style="background-position: left 0.5rem center;"
        wire:model.live="{{$form}}"
        class="bg-transparent border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        @if(isset($default))
            <option value="">{{$default}}</option>
        @endif
        @foreach($values as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>
