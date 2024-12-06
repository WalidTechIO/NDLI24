import { createApp } from 'vue';
import App from './App.vue';
import { createVuetify } from 'vuetify';
import 'vuetify/styles'; // Import des styles Vuetify
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import '@mdi/font/css/materialdesignicons.css'; // Pour les icônes
import '@/assets/style.css'

const vuetify = createVuetify({
    components,
    directives,
});

createApp(App).use(vuetify).mount('#app');
