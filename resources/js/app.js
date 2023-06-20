import Alpine from 'alpinejs'
import copyableInput from './components/copyable-input'

window.Alpine = Alpine

Alpine.data('copyableInput', copyableInput);

Alpine.start()
