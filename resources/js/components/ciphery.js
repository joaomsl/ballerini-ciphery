export default function ciphery() {
    return {
        initialized: false,

        generatedPassword: '',
        generatedHash: '',

        state: {
            hashAlgos: {},
            charTypes: {},
            size: 8
        },

        async init() {
            if(!await this.fetchOptionsAndPopulateState()) {
                alert('Erro ao recuperar as opções. Recarregue a página.')
                return;
            }

            this.initialized = true
        },

        makeStateOption(id, name, active = false) {
            return {id, name, active}
        },

        async fetchOptionsAndPopulateState() {
            try {
                const response = await this.$axios.options('/api/generator')

                const data = response.data
                this.populateHashingAlgos(data.hashing_algos)
                this.populateCharTypes(data.characteristics)

                return true
            } catch(error) {
                console.log(error)
                return false
            }
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
