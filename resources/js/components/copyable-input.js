export default function(content) {
    return {
        content: content,

        copyTrigger: {
            ['@click']() {
                navigator.clipboard.writeText(this.content);
            }
        }
    }
}
