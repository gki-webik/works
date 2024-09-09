<script>
export default {
    data() {
        return {
            isDarkLoader: false
        }
    },
    mounted() {
        const storedTheme = localStorage.getItem("WK_THM");
        const defaultTheme = new Date().getHours() >= 6 && new Date().getHours() < 22 ? "light" : "dark";
        const currentTheme = storedTheme || defaultTheme;
        if (currentTheme == "dark") {
            this.isDarkLoader = true;
        }
    }
}
</script>

<template>
    <div class="loader_container" :class="{ 'isDark': this.isDarkLoader }">
        <svg class="loader" viewBox="0 0 24 24">
            <circle class="loader__value" cx="12" cy="12" r="10" />
            <circle class="loader__value" cx="12" cy="12" r="10" />
            <circle class="loader__value" cx="12" cy="12" r="10" />
            <circle class="loader__value" cx="12" cy="12" r="10" />
            <circle class="loader__value" cx="12" cy="12" r="10" />
            <circle class="loader__value" cx="12" cy="12" r="10" />
        </svg>
    </div>
</template>

<style scoped>
html,
body {
    overflow: hidden !important;
}

.loader_container {
    height: 100vh;
    width: 100%;
    position: fixed;
    align-items: center;
    display: flex;
    justify-content: center;
    z-index: 9999999999;
    top: 0;
    background-color: #fff;
}

.loader_container.isDark {
    background-color: #15202b !important;
}

.loader {
    -webkit-animation: loader-turn 1s linear infinite;
    animation: loader-turn 1s linear infinite;
    padding: 1rem;
    max-width: 80px;
    width: 100%;
}

@-webkit-keyframes loader-turn {
    50% {
        transform: rotate(180deg);
    }

    100% {
        transform: rotate(720deg);
    }
}

@keyframes loader-turn {
    50% {
        transform: rotate(180deg);
    }

    100% {
        transform: rotate(720deg);
    }
}

.loader__value {
    -webkit-animation: loader-stroke 6s linear infinite;
    animation: loader-stroke 6s linear infinite;
    fill: none;
    stroke-dasharray: 63;
    stroke-dashoffset: 63;
    stroke-linecap: round;
    stroke-width: 4;
}

.loader__value:nth-child(1) {
    stroke: dodgerblue;
}

.loader__value:nth-child(2) {
    stroke: #00affa;
    -webkit-animation-delay: 1s;
    animation-delay: 1s;
}

.loader__value:nth-child(3) {
    stroke: #0070fa;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
}

.loader__value:nth-child(4) {
    stroke: #00d9ff;
    -webkit-animation-delay: 3s;
    animation-delay: 3s;
}

.loader__value:nth-child(5) {
    stroke: dodgerblue;
    -webkit-animation-delay: 4s;
    animation-delay: 4s;
}

.loader__value:nth-child(6) {
    stroke: #00affa;
    -webkit-animation-delay: 5s;
    animation-delay: 5s;
}

@-webkit-keyframes loader-stroke {
    8.3333333333% {
        stroke-dashoffset: 0;
    }

    16.6666666667%,
    100% {
        stroke-dashoffset: 63;
    }
}

@keyframes loader-stroke {
    8.3333333333% {
        stroke-dashoffset: 0;
    }

    16.6666666667%,
    100% {
        stroke-dashoffset: 63;
    }
}
</style>