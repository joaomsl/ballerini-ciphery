import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

import axios from 'axios';
import ciphery from './components/ciphery';
import badge from './components/badge';
import copyableInput from './components/copyable-input';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Alpine = Alpine

Alpine.plugin(persist)
Alpine.magic('axios', () => axios)

Alpine.data('ciphery', ciphery)
Alpine.data('badge', badge)
Alpine.data('copyableInput', copyableInput)

Alpine.start()
