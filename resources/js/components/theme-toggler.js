function makeTheme(id, iconClass, activeClass) {
    return {id, iconClass, activeClass}
}

const themes = [
    makeTheme(0, 'ph-moon-stars', 'light'),
    makeTheme(1, 'ph-sun', 'dark')
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
    const htmlElClassList = document.documentElement.classList

    htmlElClassList.remove(getCurrentTheme().activeClass)
    htmlElClassList.add(theme.activeClass)

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
        this.currentTheme = getCurrentTheme()
        this.refreshIcons(this.$el, this.currentTheme)

        this.$watch(
            'currentTheme',
            (newTheme, oldTheme) => this.watchChangesOnTheme(this.$el, newTheme, oldTheme)
        )
    },

    watchChangesOnTheme(buttonElement, newTheme, oldTheme) {
        setTheme(newTheme)
        this.refreshIcons(buttonElement, newTheme, oldTheme)
        this.$axios.put('/theme', {theme: newTheme.activeClass})
    },

    refreshIcons(buttonElement, newTheme, oldTheme) {
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
