<template>

    <div>

        <div class="box has-text-cenetered">
            <button type="button" class="button is-primary is-outlined is-fullwidth" @click.prevent="createModalToggle">New Research</button>
        </div>

        <!-- Update Modal -->
        <div class="modal" id="create-research-modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">New Research</p>
                    <button class="delete" aria-label="close" @click.prevent="createModalToggle"></button>
                </header>
                <form @submit.prevent="create">
                    <section class="modal-card-body">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Evidence</label>
                                    <div class="control">
                                        <textarea class="textarea" id="evidence" rows="3" placeholder="Evidence" v-model="content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Location</label>
                                    <div class="control">
                                        <input type="text" class="input" id="location" placeholder="Location" v-model="location">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Type</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select class="" id="type" v-model="type">
                                                <option>Paraphrase</option>
                                                <option>Quote</option>
                                                <option>Summary</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button is-primary">Create</button>
                        <button class="button is-secondary" @click.prevent="createModalToggle">Cancel</button>
                    </footer>
                </form>
            </div>
        </div>

    </div>

</template>

<script>

export default {

    props: {
        paper: Number,
        source: Number,
    },

    data() {
        return {
            content: '',
            location: '',
            type: '',
            research: false,
        }
    },

    methods: {
        create() {
            axios.post('/api/papers/' + this.paper + '/sources/' + this.source + '/evidence', {
                content: this.content,
                location: this.location,
                type: this.type,
            })
                .then(response => {
                    this.research = response.data;
                    this.$eventBus.$emit('createResearchItem', this.research);
                    this.content = '';
                    this.location = '';
                    this.type = '';
                    this.createModalToggle();
                });
        },
        createModalToggle() {
            $('#create-research-modal').toggleClass('is-active');
        }
    },

}

</script>

