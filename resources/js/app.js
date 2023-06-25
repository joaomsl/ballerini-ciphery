import Alpine from 'alpinejs'

import axios from 'axios';
import ciphery from './components/ciphery';
import badge from './components/badge';
import persist from '@alpinejs/persist'

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Alpine = Alpine

Alpine.plugin(persist)
Alpine.magic('axios', () => axios)

Alpine.data('ciphery', ciphery)
Alpine.data('badge', badge)

Alpine.start()
