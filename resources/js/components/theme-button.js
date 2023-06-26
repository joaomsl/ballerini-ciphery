function createTheme(id, iconClass, htmlClass = null) {
    return {id, iconClass, htmlClass}
}

const themes = [
    createTheme(0, 'ph-moon-stars'),
    createTheme(1, 'ph-sun', 'dark')
]

export default function themeButton() {
    return {
        themeId: this.$persist(0).as('ciphery_theme'),
        theme: {},

        init() {
            this.theme = themes[this.themeId]

            this.$watch(
                'themeId',
                (newThemeId, oldThemeId) => this.whenThemeChange(themes[newThemeId], themes[oldThemeId])
            )
        },

        whenThemeChange(newTheme, oldTheme = null) {
            const htmlClassList = document.documentElement.classList

            if(newTheme.htmlClass && newTheme.htmlClass) {
                htmlClassList.add(newTheme.htmlClass)
            }
            if(oldTheme && oldTheme.htmlClass) {
                htmlClassList.remove(oldTheme.htmlClass)
            }

            this.theme = newTheme

            try {
                this.$axios.put('/change-theme', {theme_class: newTheme.htmlClass})
            } catch(error) {
                alert('Não foi possível persistir o tema selecionado. Tente novamente mais tarde.')
                console.error(error)
            }
        },

        toggleTheme() {
            this.themeId = (themes[this.themeId + 1] ?? themes[0]).id
        }
    }
}
