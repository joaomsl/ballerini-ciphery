import Alpine from 'alpinejs'
import copyableInput from './components/copyable-input'
import themeToggler from './components/theme-toggler'

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Alpine = Alpine

Alpine.magic('axios', () => axios)

Alpine.data('copyableInput', copyableInput);
Alpine.data('themeToggler', themeToggler);

Alpine.start()
