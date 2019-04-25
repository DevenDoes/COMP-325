<template>

    <div class="column" style="width:100%;">
        <div class="card" :id="'paper-'+id">
            <div class="card-content">
                <div class="content columns is-multiline">
                    <div class="column is-12">
                        <a :href="url"><p class="title is-6" v-text="current.title"></p></a>
                    </div>
                    <div class="column is-11">
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-light">Course</span>
                                    <span class="tag is-primary" v-text="current.course"></span>
                                </div>
                            </div>
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-light">Style</span>
                                    <span class="tag is-primary" v-text="current.style"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-narrow">
                        <div class="dropdown is-right" :id="'paper-dropdown-'+id">
                            <div class="dropdown-trigger is-pulled-right">
                                <a href="" @click.prevent="dropdownToggle(id)" aria-haspopup="true" :aria-controls="'paper-dropdown-menu-'+id">
                                    <span class="icon is-small">
                                        <i class="fas fa-ellipsis-h has-text-grey-light"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-menu is-active" :id="'paper-dropdown-menu'+id" role="menu">
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

        <div class="modal" :id="'paper-update-modal-'+id">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Paper</p>
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
                                    <label class="label">Prompt</label>
                                    <div class="control">
                                        <textarea class="textarea" id="prompt" rows="3" placeholder="Prompt" v-model="temp.prompt"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Course</label>
                                    <div class="control">
                                        <input type="text" class="input" id="course" placeholder="Course" v-model="temp.course">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Style</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select class="" id="style" v-model="temp.style">
                                                <option>APA</option>
                                                <option>CSE</option>
                                                <option>MLA</option>
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
        paper: Object,
    },

    data() {
        return {
            id: this.paper.id,
            current : {
                title: this.paper.title,
                course: this.paper.course,
                style: this.paper.style,
                prompt: this.paper.prompt,
            },
            temp: {
                title: this.paper.title,
                course: this.paper.course,
                style: this.paper.style,
                prompt: this.paper.prompt,
            },
        }
    },

    computed: {
        url() {
            return "/papers/" + this.id;
        },
    },

    methods: {
        destroy() {
            axios.delete('/api/papers/' + this.id);
            this.$emit('deletePaperItem', this.index);
        },
        update() {
            axios.patch('/api/papers/' + this.id, {
                title: this.temp.title,
                prompt: this.temp.prompt,
                course: this.temp.course,
                style: this.temp.style,
            })
                .then(response => {
                    this.copyObject(this.current, this.temp);
                });
            this.updateModalToggle();
        },
        dropdownToggle() {
             $('#paper-dropdown-'+this.id).toggleClass('is-active');
        },
        updateModalToggle() {
            $('#paper-update-modal-' + this.id).toggleClass('is-active');
        },
        copyObject(toSet, toGet) {
            Object.keys(toGet).forEach((key) => {
                this.$set(toSet, key, toGet[key]);
            });
        },
    },

}

</script>

