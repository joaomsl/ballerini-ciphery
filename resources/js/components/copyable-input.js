export default function copyableInput() {
    return {
        content: '',

        copyTrigger: {
            ['@click']() {
                navigator.clipboard.writeText(this.content)
            }
        }
    }
}
