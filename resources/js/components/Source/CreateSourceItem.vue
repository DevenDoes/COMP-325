<template>

    <div>
        <div class="box has-text-cenetered">
            <button type="button" class="button is-primary is-outlined is-fullwidth" @click.prevent="createModalToggle">New Source</button>
        </div>
        <div class="modal" id="create-source-modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">New Source</p>
                    <button class="delete" aria-label="close" @click.prevent="createModalToggle"></button>
                </header>
                <form @submit.prevent="create">
                    <section class="modal-card-body">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Title</label>
                                    <div class="control">
                                        <input type="text" class="input" id="title" placeholder="Title" v-model="content.title">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Author(s)</label>
                                    <div class="control">
                                        <input type="text" class="input" id="authors" placeholder="Author(s)" v-model="content.authors">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Location</label>
                                    <div class="control">
                                        <input type="text" class="input" id="location" placeholder="Location" v-model="content.location">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Type</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select class="" id="type" v-model="content.type">
                                                <option>Primary</option>
                                                <option>Secondary</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Medium</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select class="" id="medium" v-model="content.medium">
                                                <option>Blog</option>
                                                <option>Book</option>
                                                <option>Film</option>
                                                <option>Interview</option>
                                                <option>News Article</option>
                                                <option>Other</option>
                                                <option>Scholarly Journal</option>
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
    },

    data() {
        return {
            paper_id: this.paper,
            content: {
                title: '',
                authors: '',
                location: '',
                type: '',
                medium: '',
            },
            source: false,
        }
    },

    methods: {
        create() {
            axios.post('/api/papers/' + this.paper_id + '/sources', {
                title: this.content.title,
                authors: this.content.authors,
                location: this.content.location,
                type: this.content.type,
                medium: this.content.medium,
            })
                .then(response => {
                    this.source = response.data;
                    this.$eventBus.$emit('createSourceItem', this.source);
                    this.content.title = '';
                    this.content.authors = '';
                    this.content.location = '';
                    this.content.type = '';
                    this.content.medium = '';
                    this.createModalToggle();
                });
        },
        createModalToggle() {
            $('#create-source-modal').toggleClass('is-active');
        }
    }

}

</script>
