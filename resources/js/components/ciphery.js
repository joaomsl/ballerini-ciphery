export default function ciphery() {
    return {
        generatedPassword: '',
        generatedHash: '',

        state: {
            hashAlgos: {},
            charTypes: {},
            size: 8
        },

        async init() {
            await this.fetchOptionsAndPopulateState()
        },

        makeStateOption(id, name, active = false) {
            return {id, name, active}
        },

        async fetchOptionsAndPopulateState() {
            const response = await this.$axios.options('/api/generator')

            if(response.status !== 200) {
                alert('Não foi possível realizar o fetch de estado')
                return;
            }

            const data = response.data
            this.populateHashingAlgos(data.hashing_algos)
            this.populateCharTypes(data.characteristics)
        },

        populateHashingAlgos(hashAlgos) {
            for(let [id, name] of Object.entries(hashAlgos)) {
                this.state.hashAlgos[id] = this.makeStateOption(id, name)
            }

            const firstAlgoId = Object.keys(this.state.hashAlgos).shift()
            this.state.hashAlgos[firstAlgoId].active = true;
        },

        populateCharTypes(charTypes) {
            for(let [id, name] of Object.entries(charTypes)) {
                this.state.charTypes[id] = this.makeStateOption(id, name, true)
            }
        }
    }
}
