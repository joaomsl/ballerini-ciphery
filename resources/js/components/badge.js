export default function badge(enabled = false) {
    const variantsClasses = {
        primary: 'border-rose-400 bg-rose-400/10 text-rose-400',
        secondary: 'border-zinc-600 text-zinc-600 hover:border-zinc-500 hover:text-zinc-500'
    }

    return {
        enabled,

        getClassesByVariant() {
            return variantsClasses[this.enabled ? 'primary' : 'secondary']
        }
    }
}
