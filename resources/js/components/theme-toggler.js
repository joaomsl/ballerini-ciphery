function makeTheme(id, iconClass, whenEnable = null, whenDisable = null) {
    return {id, iconClass, whenEnable, whenDisable}
}

const htmlElClasses = document.documentElement.classList

const themes = [
    makeTheme(0, 'ph-sun'),
    makeTheme(1, 'ph-moon-stars', () => htmlElClasses.add('dark'), () => htmlElClasses.remove('dark'))
]

const storage = window.localStorage
const storageKey = 'theme_id'

function getThemeOrPickFirst(id) {
    return themes[id] ?? Object.values(themes)[0]
}

function getCurrentTheme() {
    const prefersDarkTheme = window.matchMedia('(prefers-color-scheme: dark)').matches;
    let themeId = storage.getItem(storageKey) 
    
    if(prefersDarkTheme && !themeId) {
        themeId = 1
    }
    if(!themeId) {
        themeId = 0
    }

    return getThemeOrPickFirst(themeId);
}

function setTheme(theme) {
    if(getCurrentTheme().whenDisable) {
        getCurrentTheme().whenDisable()
    }
    if(theme.whenEnable) {
        theme.whenEnable()
    }
    
    storage.setItem(storageKey, theme.id)
}

export default () => ({
    currentTheme: null,
    toggleButton: {
        ['@click']() {
            this.toggle()
        }
    },

    init() {
        this.$watch(
            'currentTheme', 
            (newTheme, oldTheme) => this.watchChangesOnTheme(this.$el, newTheme, oldTheme)
        )
        this.currentTheme = getCurrentTheme()
    },

    watchChangesOnTheme(buttonElement, newTheme, oldTheme) {
        setTheme(newTheme)

        const icons = [newTheme.iconClass]
        if(oldTheme) {
            icons.push(oldTheme.iconClass)
        }

        const iconClassList = buttonElement.querySelector('i').classList

        icons.forEach(iconClass => iconClassList.toggle(iconClass))
    },

    toggle() {
        this.currentTheme = getThemeOrPickFirst(this.currentTheme.id + 1)
    },
})