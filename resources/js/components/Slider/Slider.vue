<template>
    <div class="relative mt-16 py-20">

        <div class="grid grid-cols-12 gap-10 container mx-auto">
            <div class="col-span-6">
                <div class="space-y-10 pt-20 mb-10">
                    <h1 class="font-pfd text-8xl font-bold">
                        The best choice for your convenience
                    </h1>
                    <p class="text-xl text-neutral-500">
                        Comfort is our priority to satisfy our customers, and we
                        provide all the furniture that you can use to make your home more comfortable.
                    </p>
                </div>
                <SliderButtons class="mb-10" />
            </div>
            <div class="col-span-6">
                <div class="relative overflow-hidden border">
                    <TransitionGroup>
                        <img class="w-full" :key="currentImage" :src="currentImage" alt="slider" />
                    </TransitionGroup>
                    <div class="absolute bottom-0 left-0">
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
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import SliderButtons from "./SliderButtons.vue";
import SliderButton from "./SliderButton.vue";

const currentIndex = ref(0);
const dir = ref(1);

const images = [
    'https://www.oracdecor.com/media/assets/7/f/e/3/7fe32288f9ecdfb2c7fa06b156ad84e523d75e61_3dplayground23_track_7_63d153a17ca32.jpg',
    'https://www.oracdecor.com/media/assets/a/e/3/b/ae3bf229ab685bb889289ade8c796cbf8e66a434_3dplayground23_track_5_63d2b026ad5a8.jpg',
    'https://www.oracdecor.com/media/assets/1/f/2/1/1f21ab6f6f9979d62206b302455883110137d4df_3dplayground23_track_1_63c189986ddb0.jpeg'
]

const next = () => {
    dir.value = 1
    currentIndex.value++
    if (currentIndex.value > images.length - 1) {
        currentIndex.value = 0
    }
}

const prev = () => {
    dir.value = -1
    currentIndex.value--
    if (currentIndex.value < 0) {
        currentIndex.value = images.length - 1
    }
}

const currentImage = computed(() => images[currentIndex.value])

const enterFrom = computed(() => `${dir.value * 120}px`)
const leaveTo = computed(() => `${dir.value * -120}px`)

</script>

<style scoped>

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
