import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Slider from './components/Slider/Slider.vue';
import ProductSlider from './components/ProductSlider/ProductSlider.vue';
import MobileMenu from "./components/MobileMenu.vue";

export default createApp({
    components: {
        Slider,
        ProductSlider,
        MobileMenu
    }
})
.mount("#app");



