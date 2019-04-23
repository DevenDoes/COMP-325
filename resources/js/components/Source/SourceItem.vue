<template>

    <div>

        <div class="column is-12">
            <div class="card" :id="'source-'+id">
                <div class="card-content">
                    <div class="content columns is-multiline">
                        <div class="column is-12">
                            <a :href="url"><p class="title is-6" v-text="current.title"></p></a>
                        </div>
                        <div class="column is-12">
                            <p class="" v-text="current.authors + ' | ' + current.type + ' | ' + current.medium"></p>
                        </div>
                        <div class="column is-11">
                            <a :href="url" class="button is-primary is-outlined is-small">Select Source</a>
                        </div>
                        <div class="column is-narrow">
                            <div class="dropdown is-right" :id="'source-dropdown-'+id">
                                <div class="dropdown-trigger is-pulled-right">
                                    <a href="" @click.prevent="dropdownToggle(id)" aria-haspopup="true" :aria-controls="'source-dropdown-menu-'+id">
                                        <span class="icon is-small">
                                            <i class="fas fa-ellipsis-h has-text-grey-light"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="dropdown-menu is-active" :id="'source-dropdown-menu'+id" role="menu">
                                    <div class="dropdown-content">
                                        <a href="" class="dropdown-item" @click.prevent="updateModalToggle">Update</a>
                                        <a href="" class="dropdown-item" @click.prevent="destroy">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" :id="'update-source-modal-'+id">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Source</p>
                    <button class="delete" aria-label="close" @click.prevent="updateModalToggle"></button>
                </header>
                <form @submit.prevent="update">
                    <section class="modal-card-body">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Title</label>
                                    <div class="control">
                                        <input type="text" class="input" id="title" placeholder="Title" v-model="temp.title">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Author(s)</label>
                                    <div class="control">
                                        <input type="text" class="input" id="authors" placeholder="Author(s)" v-model="temp.authors">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Location</label>
                                    <div class="control">
                                        <input type="text" class="input" id="location" placeholder="Location" v-model="temp.location">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Type</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select class="" id="type" v-model="temp.type">
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
                                            <select class="" id="medium" v-model="temp.medium">
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
                        <button class="button is-primary">Update</button>
                        <button class="button is-secondary" @click.prevent="updateModalToggle">Cancel</button>
                    </footer>
                </form>
            </div>
        </div>
    </div>

</template>

<script>

export default {

    props: {
        index: Number,
        side: String,
        paper: Number,
        source: Object,
    },

    data() {
        return {
            id: this.source.id,
            paper_id: this.paper,
            current : {
                title: this.source.title,
                authors: this.source.authors,
                location: this.source.location,
                type: this.source.type,
                medium: this.source.medium,
            },
            temp: {
                title: this.source.title,
                authors: this.source.authors,
                location: this.source.location,
                type: this.source.type,
                medium: this.source.medium,
            },
        }
    },

    computed: {
        url() {
            return '/papers/' + this.paper_id + '/sources/' + this.id + '/evidence';
        },
    },

    methods: {
        destroy() {
            let data = {
                index: this.index,
                side: this.side,
            };
            axios.delete('/api/papers/' + this.paper_id + '/sources/' + this.id, {})
                .then(response => {
                    this.$emit('deleteSourceItem', data);
                });
        },
        update() {
            axios.patch('/api/papers/' + this.paper_id + '/sources/' + this.id, {
                title: this.temp.title,
                authors: this.temp.authors,
                location: this.temp.location,
                type: this.temp.type,
                medium: this.temp.medium,
            })
                .then(response => {
                    this.copyObject(this.current, this.temp);
                });
            this.updateModalToggle();
        },
        dropdownToggle() {
             $('#source-dropdown-'+this.id).toggleClass('is-active');
        },
        updateModalToggle() {
            $('#update-source-modal-' + this.id).toggleClass('is-active');
        },
        copyObject(toSet, toGet) {
            Object.keys(toGet).forEach((key) => {
                this.$set(toSet, key, toGet[key]);
            });
        },
    },

}

</script>

