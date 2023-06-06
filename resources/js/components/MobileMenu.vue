<template>
    <div>
        <button @click="isOpen = true">
            <svg class="w-8" width="81" height="54" viewBox="0 0 81 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 53.5V44.5833H80.25V53.5H0ZM0 31.2083V22.2917H80.25V31.2083H0ZM0 8.91667V0H80.25V8.91667H0Z" fill="black"/>
            </svg>
        </button>

        <div
            class="flex flex-col justify-between p-5 fixed z-50 w-full duration-100 min-h-screen top-0 bg-white"
            :class="isOpen ? 'left-0' : '-left-full'"
        >
            <div class="space-y-8">

                <div class="flex gap-5">
                    <form action="/products" class="w-full group relative flex items-center" method="get">
                        <input
                            type="text"
                            class="rounded-full border-2 border-neutral-500 p-4 w-full focus:outline-none focus:border-amber-400"
                            name="search"
                        >
                        <button class="absolute right-4">
                            <svg class="group-focus-within:fill-amber-400 fill-black" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2C9.14459 2.00012 7.80886 2.32436 6.60426 2.94569C5.39965 3.56702 4.36109 4.46742 3.57524 5.57175C2.78938 6.67609 2.27901 7.95235 2.08671 9.29404C1.89441 10.6357 2.02575 12.004 2.46978 13.2846C2.91381 14.5652 3.65765 15.7211 4.63924 16.6557C5.62083 17.5904 6.8117 18.2768 8.11251 18.6576C9.41332 19.0384 10.7863 19.1026 12.117 18.8449C13.4477 18.5872 14.6974 18.015 15.762 17.176L19.414 20.828C19.6026 21.0102 19.8552 21.111 20.1174 21.1087C20.3796 21.1064 20.6304 21.0012 20.8158 20.8158C21.0012 20.6304 21.1064 20.3796 21.1087 20.1174C21.111 19.8552 21.0102 19.6026 20.828 19.414L17.176 15.762C18.164 14.5086 18.7792 13.0024 18.9511 11.4157C19.123 9.82905 18.8448 8.22602 18.1482 6.79009C17.4517 5.35417 16.3649 4.14336 15.0123 3.29623C13.6597 2.44911 12.096 1.99989 10.5 2ZM4 10.5C4 8.77609 4.68482 7.12279 5.90381 5.90381C7.12279 4.68482 8.77609 4 10.5 4C12.2239 4 13.8772 4.68482 15.0962 5.90381C16.3152 7.12279 17 8.77609 17 10.5C17 12.2239 16.3152 13.8772 15.0962 15.0962C13.8772 16.3152 12.2239 17 10.5 17C8.77609 17 7.12279 16.3152 5.90381 15.0962C4.68482 13.8772 4 12.2239 4 10.5Z"/>
                            </svg>
                        </button>
                    </form>

                    <button @click="isOpen = false">
                        <svg class="w-5" width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.7 47L0 42.3L18.8 23.5L0 4.7L4.7 0L23.5 18.8L42.3 0L47 4.7L28.2 23.5L47 42.3L42.3 47L23.5 28.2L4.7 47Z" fill="black"/>
                        </svg>
                    </button>

                </div>

                <div>
                    <ul class="space-y-3 text-2xl">
                        <li v-for="link in links" :key="link.name">
                            <a class="font-bold text-neutral-900 hover:text-neutral-600" :href="link.path">
                                {{ link['name'] }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <ul class="flex flex-wrap gap-3">
                        <li v-for="category in categories">
                            <a
                                :href="`/${category.slug}`"
                                class="font-medium"
                                :class="path === category.slug && '!font-bold px-2 py-1 bg-amber-400'"
                            >
                                {{ category.name[locale] }}
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <div>
                <div class="font-bold text-sm pb-5 space-y-5">
                    <div class="flex gap-1">

                        <svg class="w-4" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0C4.486 0 0 4.486 0 10V14.143C0 15.167 0.897 16 2 16H3C3.26522 16 3.51957 15.8946 3.70711 15.7071C3.89464 15.5196 4 15.2652 4 15V9.857C4 9.59178 3.89464 9.33743 3.70711 9.14989C3.51957 8.96236 3.26522 8.857 3 8.857H2.092C2.648 4.987 5.978 2 10 2C14.022 2 17.352 4.987 17.908 8.857H17C16.7348 8.857 16.4804 8.96236 16.2929 9.14989C16.1054 9.33743 16 9.59178 16 9.857V16C16 17.103 15.103 18 14 18H12V17H8V20H14C16.206 20 18 18.206 18 16C19.103 16 20 15.167 20 14.143V10C20 4.486 15.514 0 10 0Z" fill="#FBBF24"/>
                        </svg>
                        <a
                            class="text-neutral-900 hover:text-neutral-700"
                            :href="`tel:+994 ${phone}`"
                        >
                            +994 {{ phone }}
                        </a>
                    </div>
                    <div class="flex gap-1">
                        <svg class="h-4" width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0C3.58002 0 1.05266e-05 3.50892 1.05266e-05 7.83677C-0.0027941 9.52709 0.554902 11.1726 1.58917 12.5256L6.72062 21.2325C6.7504 21.2886 6.78019 21.3444 6.81678 21.3959L6.82813 21.415L6.83125 21.4134C6.96483 21.5957 7.14101 21.7441 7.34507 21.8461C7.54913 21.9482 7.77515 22.0009 8.00426 22C8.44566 22 8.83033 21.8032 9.095 21.5001L9.10833 21.5076L9.15911 21.4214C9.234 21.3225 9.30038 21.2169 9.34832 21.1005L14.3757 12.5698C15.4318 11.2091 16.0025 9.54617 16 7.83677C16 3.50892 12.42 0 8 0ZM7.92086 11.8098C5.74306 11.8098 3.97916 10.081 3.97916 7.94849C3.97916 5.81624 5.74306 4.0872 7.92086 4.0872C10.0986 4.0872 11.8626 5.81624 11.8626 7.94849C11.8626 10.0807 10.0986 11.8098 7.92086 11.8098Z" fill="#FBBF24"/>
                        </svg>
                        <a
                            class="text-neutral-900 hover:text-neutral-700"
                            target="_blank"
                            href="https://www.google.com/maps/place/Bal+Studio/@40.3851581,49.8503296,17z/data=!3m1!4b1!4m6!3m5!1s0x40307de243dbd387:0xa8b949ff4af9c607!8m2!3d40.3851581!4d49.8503296!16s%2Fg%2F11nnmhldmk?entry=ttu"
                        >
                            {{ address }}
                        </a>
                    </div>
                </div>
                <div class="flex items-center justify-between pt-5 border-t border-neutral-100">
                    <ul class="flex font-bold gap-1 text-xl">
                        <li v-for="language in languages" :key="language.id">
                            <a
                                class="uppercase flex p-2"
                                :class="language.slug === locale && 'bg-amber-400'"
                                :href="`/locale/${language.slug}`"
                            >
                                {{ language.slug }}
                            </a>
                        </li>
                    </ul>

                    <div>
                        <a v-if="isLoggedIn" href="/logout">
                            <svg class="w-8 h-8" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5" d="M8.00195 6C8.01395 3.825 8.11095 2.647 8.87895 1.879C9.75795 1 11.172 1 14 1H15C17.829 1 19.243 1 20.122 1.879C21 2.757 21 4.172 21 7V15C21 17.828 21 19.243 20.122 20.121C19.242 21 17.829 21 15 21H14C11.172 21 9.75795 21 8.87895 20.121C8.11095 19.353 8.01395 18.175 8.00195 16" stroke="#FBBF24" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M14 11H1M1 11L4.5 8M1 11L4.5 14" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>

                        <a v-else href="/login">
                            <svg class="w-8 h-8" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5" d="M9 17C11.1217 17 13.1566 16.1571 14.6569 14.6569C16.1571 13.1566 17 11.1217 17 9C17 6.87827 16.1571 4.84344 14.6569 3.34315C13.1566 1.84285 11.1217 1 9 1" stroke="#FBBF24" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M1 9H11M11 9L8 6M11 9L8 12" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

const isOpen = ref(false)

const props = defineProps({
    links: Array,
    phone: String,
    address: String,
    languages: Array,
    categories: Array,
    tagline: String,
    isLoggedIn: Boolean
})

const locale = window.locale

console.log(props.isLoggedIn)
const path = window.location.pathname.replace('/', '')
</script>
