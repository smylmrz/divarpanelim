import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Slider from './components/Slider/Slider.vue';
import ProductSlider from './components/ProductSlider/ProductSlider.vue';

export default createApp({
    components: {
        Slider,
        ProductSlider
    }
})
.mount("#app");



