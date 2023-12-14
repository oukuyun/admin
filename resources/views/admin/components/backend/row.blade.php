
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
                            :id="$sub_item['field']"
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
                            :id="$sub_item['field']"
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :multi_language="($fields[$sub_item['field']]['multi_language']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('ckeditor5')
                        <x-backend::ckeditor5 
                            :id="$sub_item['field']"
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :multi_language="($fields[$sub_item['field']]['multi_language']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('input')
                        <x-backend::input 
                            :id="$sub_item['field']"
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :type="$fields[$sub_item['field']]['type']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :multi_language="($fields[$sub_item['field']]['multi_language']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('radio')
                        <x-backend::radio 
                            :id="$sub_item['field']"
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :options="$fields[$sub_item['field']]['options']" 
                            :direction="$fields[$sub_item['field']]['direction']??'vertical'" 
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('checkbox')
                        <x-backend::checkbox 
                            :id="$sub_item['field']"
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :checked="($fields[$sub_item['field']]['checked']??false)"
                            :multi_language="($fields[$sub_item['field']]['multi_language']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('media')
                        <x-backend::media 
                            :id="$sub_item['field']"
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :type="$fields[$sub_item['field']]['type']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :info="$fields[$sub_item['field']]['info']"
                            :multiple="$fields[$sub_item['field']]['multiple']??false"
                            :id="$sub_item['field']"
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :multi_language="($fields[$sub_item['field']]['multi_language']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('multiple')
                        <x-backend::multiple 
                            :text="$fields[$sub_item['field']]['text']" 
                            :key="$fields[$sub_item['field']]['key']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :parameters="$fields[$sub_item['field']]['parameters']"
                            :id="$sub_item['field']"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('multiple_table')
                        <x-backend::multiple_table 
                            :text="$fields[$sub_item['field']]['text']" 
                            :key="$fields[$sub_item['field']]['key']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :parameters="$fields[$sub_item['field']]['parameters']"
                            :id="$sub_item['field']"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                    @endswitch
                @endif
            @endforeach
        </div>
    @endforeach
</div>