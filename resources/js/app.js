import Alpine from 'alpinejs'
import copyableInput from './components/copyable-input'
import themeToggler from './components/theme-toggler'

window.Alpine = Alpine

Alpine.data('copyableInput', copyableInput);
Alpine.data('themeToggler', themeToggler);

Alpine.start()
