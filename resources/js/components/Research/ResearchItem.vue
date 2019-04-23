<template>

    <div>

        <!-- Card Element -->
        <div class="column is-12">
            <div class="box">
                <div class="columns is-multiline">
                    <div class="column is-12">
                        <p v-text="current.content"></p>
                    </div>
                    <div class="column">
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-light">Evidence</span>
                                    <span class="tag is-primary" v-text="current.type"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-narrow">
                        <div class="dropdown is-right" :id="'research-dropdown-'+ id">
                            <div class="dropdown-trigger is-pulled-right">
                                <a href="" @click.prevent="dropdownToggle" aria-haspopup="true" :aria-controls="'dropdown-menu-'+id">
                                    <span class="icon is-small">
                                        <i class="fas fa-ellipsis-h has-text-grey-light"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-menu is-active" :id="'research-dropdown-menu-'+id" role="menu">
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

        <!-- Update Modal -->
        <div class="modal" :id="'research-update-modal-' + id">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Research</p>
                    <button class="delete" aria-label="close" @click.prevent="updateModalToggle"></button>
                </header>
                <form @submit.prevent="update">
                    <section class="modal-card-body">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Evidence</label>
                                    <div class="control">
                                        <textarea class="textarea" id="evidence" rows="3" placeholder="Evidence" v-model="temp.content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
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
        research: Object,
    },

    data() {
        return {
            id: this.research.id,
            source_id: this.research.source_id,
            paper_id: this.research.paper_id,
            current: {
                content: this.research.content,
                location: this.research.location,
                type: this.research.type,
            },
            temp: {
                content: this.research.content,
                location: this.research.location,
                type: this.research.type,
            },
        }
    },

    methods: {
        dropdownToggle() {
            $('#research-dropdown-'+this.id).toggleClass('is-active');
        },
        updateModalToggle() {
            $('#research-update-modal-' + this.id).toggleClass('is-active');
        },
        copyObject(toSet, toGet) {
            Object.keys(toGet).forEach((key) => {
                this.$set(toSet, key, toGet[key]);
            });
        },
        update() {
            axios.patch('/api/papers/' + this.paper_id + '/sources/' + this.source_id + '/evidence/' + this.id, {
                content: this.temp.content,
                location: this.temp.location,
                type: this.temp.type,
            })
                .then(response => {
                    this.copyObject(this.current, this.temp);
                });
            this.updateModalToggle();
        },
        destroy() {
            let data = {
                index: this.index,
                side: this.side,
            };
            axios.delete('/api/papers/' + this.paper_id + '/sources/' + this.source_id + '/evidence/' + this.id, {})
                .then(response => {
                    this.$emit('deleteResearchItem', data);
                });
        },
    },

}

</script>
