
<div class="{{$row['class']}}">
    @foreach($row['col'] as $item)
        <div class="{{$item['class']}}">
            @foreach($item['col'] as $sub_item)
                @if($sub_item['class'] == 'row')
                    <x-backend::row :row="$sub_item" />
                @elseif($sub_item['class'] == 'fields')
                    @switch($fields[$sub_item['field']]['tag'])
                        @case('select')
                        <x-backend::select 
                            :children="($fields[$sub_item['field']]['children']??[])" 
                            :options="$fields[$sub_item['field']]['options']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :multiple="($fields[$sub_item['field']]['multiple']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('textarea')
                        <x-backend::textarea 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('input')
                        <x-backend::input 
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :type="$fields[$sub_item['field']]['type']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('selector')
                        <x-location::selector :levels="$fields[$sub_item['field']]['levels']"/>
                        @break
                    @endswitch
                @endif
            @endforeach
        </div>
    @endforeach
</div>