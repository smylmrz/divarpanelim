<template>
    <component :is="is" class="group font-bold text-2xl px-8 py-2 duration-200" :class="btnStyle">
        <slot></slot>
    </component>
</template>

<script setup>

import {computed} from "vue";

const props = defineProps({
    is: {
        type: String,
        default: 'button'
    },
    type: {
        type: String,
        default: 'ghost'
    },
})

const btnStyle = computed(() => {
    return props.type === 'primary' && 'bg-neutral-800 text-white hover:bg-amber-400 hover:text-black'
})

</script>
