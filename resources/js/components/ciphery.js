export default function ciphery() {
    return {
        initialized: false,
        generatingPassword: false,
        generatingHash: false,

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
                const response = (await this.$axios.options('/api/generator')).data

                this.populateHashingAlgos(response.hashing_algos)
                this.populateCharTypes(response.characteristics)

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
            const hashAlgos = this.state.hashAlgos

            if(hashAlgos[id].active) {
                return;
            }

            for(let currentId in this.state.hashAlgos) {
                hashAlgos[currentId].active = id === currentId
            }

            if(this.generatedPassword) {
                this.regenerateHash()
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
        },

        getSelectedHashAlgo() {
            return Object.values(this.state.hashAlgos)
                .filter(hashAlgo => hashAlgo.active)
                .shift()
        },

        async regeneratePassword() {
            const data = {
                characteristics: Object.values(this.state.charTypes)
                    .filter(charType => charType.active)
                    .map(charType => charType.id),
                hashing_algo: this.getSelectedHashAlgo().id,
                size: this.state.size
            }

            try {
                this.generatingPassword = true

                const response = (await this.$axios.post('/api/generator', data)).data

                this.generatedPassword = response.password
                this.generatedHash = response.hash
            } catch(error) {
                alert('Um erro ocorreu ao gerar a sua senha. Tente novamente mais tarde.')
                console.error(error)
            }

            this.generatingPassword = false
        },

        async regenerateHash() {
            const data = {
                hashing_algo: this.getSelectedHashAlgo().id,
                password: this.generatedPassword
            }

            try {
                this.generatingHash = true

                const response = (await this.$axios.post('/api/generator/hash', data)).data

                this.generatedHash = response.hash
            } catch(error) {
                alert('Ocorreu um erro ao regerar o hash. Tente novamente mais tarde.')
                console.log(error)
            }

            this.generatingHash = false
        }
    }
}
