<uikit-modal :show="showModal" @close="closeModal">
    <div class="uk-modal-header">
        <h3>加入新頻率</h3>
    </div>
    <div class="uk-modal-body">
        <fieldset class="uk-fieldset">
            <div class="uk-margin">
                <select id="frequency" class="uk-select" v-model="selected">
                    <option :value="placeholder" disabled>選擇頻率的類型</option>
                    @foreach (collect($frequencies) as $key => $frequency)
                        <option :value="{{ json_encode($frequency) }}">{{$frequency['label']}}</option>
                    @endforeach
                </select>
            </div>
            <div v-if="selected.parameters">
                <div class="uk-margin" v-for="parameter in selected.parameters" >
                    <input type="text" v-model="parameter.value" :name="parameter.name" :placeholder="parameter.label" class="uk-input">
                </div>
            </div>
        </fieldset>
    </div>
    <div class="uk-modal-footer">
        <div class="uk-flex uk-flex-right">
            <button class="uk-button uk-button-small uk-button-primary" @click.self.prevent="addFrequency">新增</button>
        </div>
    </div>
</uikit-modal>