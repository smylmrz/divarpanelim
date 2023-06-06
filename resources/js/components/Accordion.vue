<template>
    <div class="space-y-3">
        <h3 class="font-bold text-lg">
            <button
                type="button" @click="isCollapsed = !isCollapsed"
                class="flex w-full items-center justify-between">
                <span>
                    {{ title }}
                </span>

                <svg
                    class="w-4 h-4"
                    :class="!isCollapsed && 'rotate-180'"
                    width="385" height="225" viewBox="0 0 385 225" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M169.475 214.675C181.975 227.175 202.275 227.175 214.775 214.675L374.775 54.675C387.275 42.175 387.275 21.875 374.775 9.375C362.275 -3.125 341.975 -3.125 329.475 9.375L192.075 146.775L54.675 9.47499C42.175 -3.02501 21.875 -3.02501 9.375 9.47499C-3.125 21.975 -3.125 42.275 9.375 54.775L169.375 214.775L169.475 214.675Z" fill="black"/>
                </svg>

            </button>
        </h3>
        <slot v-if="!isCollapsed" />
    </div>
</template>

<script setup>
import { ref } from "vue";

defineProps({
    title: String
})

const isCollapsed = ref(false)

</script>
