
<button {{ $attributes->merge(['class'=>'rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500',
    'type'=>'submit']) }}>
        {{$slot}}</button> 