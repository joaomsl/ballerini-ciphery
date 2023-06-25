export default function ciphery() {
    return {
        initialized: false,

        generatedPassword: '',
        generatedHash: '',

        state: this.$persist({
            hashAlgos: {},
            charTypes: {},
            size: 8
        }).as('ciphery_state'),

        async init() {
            if(!this.hasCachedState() && !await this.fetchOptionsAndPopulateState()) {
                alert('Erro ao recuperar as opções. Recarregue a página.')
                return;
            }

            this.initialized = true
        },

        hasCachedState() {
            const isEmpty = object => Object.keys(object).length === 0

            return !isEmpty(this.state.hashAlgos) && !isEmpty(this.state.charTypes)
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
        },

        toggleHashingAlgo(id) {
            for(let currentId in this.state.hashAlgos) {
                this.state.hashAlgos[currentId].active = id === currentId
            }
        },

        toggleCharType(id) {
            for(let currentId in this.state.charTypes) {
                let charType = this.state.charTypes[currentId]

                if(currentId !== id && charType.active) {
                    this.state.charTypes[id].active = !this.state.charTypes[id].active
                    break
                }
            }
        }
    }
}
