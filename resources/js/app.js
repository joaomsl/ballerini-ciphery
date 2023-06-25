import Alpine from 'alpinejs'

import axios from 'axios';
import ciphery from './components/ciphery';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Alpine = Alpine

Alpine.magic('axios', () => axios)

Alpine.data('ciphery', ciphery)

Alpine.start()
