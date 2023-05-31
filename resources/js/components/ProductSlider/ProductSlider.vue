<template>
    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-3">
            <div class="flex gap-5 flex-col">
                <button v-for="(image, index) in images"
                     class="border-2 duration-100"
                     :key="index"
                     :class="isActive(index) && 'border-black'"
                >
                    <img @click="setCurrentIndex(index)" class="w-full" :src="image.image">
                </button>
            </div>
        </div>

        <div class="border-2 col-span-9">
            <img class="w-full" :src="currentImage.image">
        </div>
    </div>
</template>

<script setup>
import {computed, ref} from "vue";

const currentIndex = ref(0)

const props = defineProps({
    images: Array
})

const currentImage = computed(() => props.images[currentIndex.value])

const setCurrentIndex = (index) => currentIndex.value = index

const isActive = (index) => index === currentIndex.value
</script>
