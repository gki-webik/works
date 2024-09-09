<script>
import Loader from "./components/parts/Loader.vue";
import WKHeader from "./components/parts/WKHeader.vue";
import WKFooter from "./components/parts/WKFooter.vue";

export default {
  components: { Loader, WKHeader, WKFooter },
  data() {
    return {
      isStatusLoader: true
    };
  },
  mounted() {
    this.loadSite();
  },
  methods: {
    loadSite() {
      const resources = [
        { tag: 'link', attributes: { href: '/files/lib/mwk/mwk.min.css', rel: 'stylesheet' } },
        { tag: 'script', attributes: { src: '/files/lib/mwk/mwk.min.js' } }
      ];

      let loadedResourcesCount = 0;
      const totalResources = resources.length;

      // Устанавливаем таймер на 3 секунды
      const timeoutId = setTimeout(() => {
        this.isStatusLoader = false;
      }, 3000);

      const checkAllResourcesLoaded = () => {
        if (loadedResourcesCount === totalResources) {
          clearTimeout(timeoutId);
          setTimeout(() => {
            this.isStatusLoader = false;
          }, 1000);
        }
      };

      resources.forEach(resource => {
        const element = document.createElement(resource.tag);
        Object.entries(resource.attributes).forEach(([key, value]) => {
          element.setAttribute(key, value);
        });

        element.onload = () => {
          loadedResourcesCount++;
          checkAllResourcesLoaded();
        };

        element.onerror = () => {
          console.error(`Failed to load ${resource.attributes.href || resource.attributes.src}.`);
        };

        if (resource.tag === 'link') {
          document.head.appendChild(element);
        } else {
          document.body.appendChild(element);
        }
      });
    }
  }
}
</script>

<template>
  <Loader v-if="isStatusLoader" />
  <WKHeader />
  <router-view></router-view>
  <WKFooter />
</template>