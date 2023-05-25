<template>
    <section class="relative py-20">

        <div class="grid grid-cols-12 gap-10 container mx-auto">
            <div v-if="details" class="col-span-6">
                <div class="space-y-10 pt-20 mb-10">
                    <h1 class="font-pfd text-8xl font-bold">
                        {{ details.title[locale] }}
                    </h1>
                    <p class="text-xl text-neutral-500">
                        {{ details.content[locale] }}
                    </p>
                </div>
                <div class="mt-10 flex items-center gap-10">
                    <Btn is="a" type="primary" :href="details.primary_action_url">
                        {{ details.primary_action_text[locale] }}
                    </Btn>
                    <Btn is="a" class="hover:opacity-50 flex gap-3 items-center" :href="details.secondary_action_url">
                        <svg class="w-6" width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M31.5 0C39.8543 0 47.8665 3.31874 53.7739 9.22614C59.6813 15.1335 63 23.1457 63 31.5C63 39.8543 59.6813 47.8665 53.7739 53.7739C47.8665 59.6813 39.8543 63 31.5 63C23.1457 63 15.1335 59.6813 9.22614 53.7739C3.31874 47.8665 0 39.8543 0 31.5C0 23.1457 3.31874 15.1335 9.22614 9.22614C15.1335 3.31874 23.1457 0 31.5 0ZM5.90625 31.5C5.90625 38.2879 8.60273 44.7978 13.4025 49.5975C18.2022 54.3973 24.7121 57.0938 31.5 57.0938C38.2879 57.0938 44.7978 54.3973 49.5975 49.5975C54.3973 44.7978 57.0938 38.2879 57.0938 31.5C57.0938 24.7121 54.3973 18.2022 49.5975 13.4025C44.7978 8.60273 38.2879 5.90625 31.5 5.90625C24.7121 5.90625 18.2022 8.60273 13.4025 13.4025C8.60273 18.2022 5.90625 24.7121 5.90625 31.5ZM25.1173 20.5813L41.9068 30.6574C42.0519 30.745 42.1719 30.8686 42.2552 31.0162C42.3385 31.1639 42.3823 31.3305 42.3823 31.5C42.3823 31.6695 42.3385 31.8361 42.2552 31.9838C42.1719 32.1314 42.0519 32.255 41.9068 32.3426L25.1173 42.4187C24.968 42.5086 24.7975 42.5573 24.6232 42.5598C24.449 42.5622 24.2772 42.5184 24.1254 42.4327C23.9736 42.347 23.8473 42.2225 23.7594 42.072C23.6715 41.9215 23.6251 41.7504 23.625 41.5761V21.4279C23.6244 21.2532 23.6703 21.0816 23.7579 20.9306C23.8455 20.7795 23.9718 20.6545 24.1237 20.5683C24.2756 20.4821 24.4476 20.4379 24.6222 20.4402C24.7969 20.4425 24.9677 20.4912 25.1173 20.5813Z" fill="#1D1D1D"/>
                        </svg>
                        {{ details.secondary_action_text[locale] }}
                    </Btn>
                </div>
            </div>
            <div class="col-span-6">
                <div class="relative overflow-hidden border">
                    <TransitionGroup>
                        <div key="placeholder" v-if="!isLoaded" class="skeleton bg-amber-400"></div>
                        <img :title="currentImage.alt" v-if="currentImage" class="w-full" @load="isLoaded = true" :key="currentIndex" :src="currentImage.image" :alt="currentImage.alt" />
                    </TransitionGroup>
                    <div v-if="showButtons" class="absolute bottom-0 left-0">
                        <SliderButton @click="prev">
                            <svg class="group-hover:stroke-white stroke-black rotate-180" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7L17 7M17 7L11 13M17 7L11 1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </SliderButton>
                        <SliderButton @click="next">
                            <svg class="group-hover:stroke-white stroke-black" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7L17 7M17 7L11 13M17 7L11 1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </SliderButton>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script setup>
import axios from "axios";
import {ref, computed, onMounted} from "vue";
import SliderButton from "./SliderButton.vue";
import Btn from "../Btn.vue";

const details = ref(null)

const currentIndex = ref(0);
const isLoaded = ref(false);

const dir = ref(1); // 1 | -1. Used to set the direction of the transition
const { locale } = window // az | en | ru

const images = ref([])

const showButtons = computed(() => images.value.length > 1)

const next = () => {
    isLoaded.value = false

    if (!images.value.length) {
        return
    }

    dir.value = 1
    currentIndex.value++
    if (currentIndex.value > images.value.length - 1) {
        currentIndex.value = 0
    }
}

const prev = () => {
    isLoaded.value = false

    if (!images.value.length) {
        return
    }

    dir.value = -1
    currentIndex.value--
    if (currentIndex.value < 0) {
        currentIndex.value = images.value.length - 1
    }
}

const currentImage = computed(() => images.value[currentIndex.value])

const enterFrom = computed(() => `${dir.value * 120}px`)
const leaveTo = computed(() => `${dir.value * -120}px`)

const getDetails = async () => {
    const { data } = await axios('/api/sliders')

    details.value = data.details
    images.value = data.slides.map(slide => {
        return {
            alt: slide.alt[locale],
            image: slide.image
        }
    })
}

onMounted(() => {
    getDetails()
})
</script>

<style scoped>
.skeleton {
    min-height: 746px;
}
.v-enter-active,
.v-leave-active {
    transition: all 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}

.v-enter-from {
    transform: translateX(v-bind(enterFrom));
}

.v-leave-to {
    transform: translateX(v-bind(leaveTo));
}

.v-leave-active {
    position: absolute;
}
</style>
