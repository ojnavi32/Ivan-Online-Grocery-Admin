<template>
<model-select :options="options"
    name="parent_id"
    placeholder="Parent Category"
    v-model="item"
>
</model-select>
</template>


<script>
import { ModelSelect } from 'vue-search-select'

export default {
    components: { ModelSelect },
    props: ['options'],
    data () {
        return {
            item: {
                value: '',
                text: ''
            }
        }
    },
    mounted () {
        console.log(this.options)
    }
}
</script>
