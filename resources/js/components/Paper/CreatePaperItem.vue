<template>

<div>
        <div class="box has-text-cenetered">
            <button type="button" class="button is-primary is-outlined is-fullwidth" @click.prevent="createModalToggle">New Paper</button>
        </div>
        <div class="modal" id="create-paper-modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">New Paper</p>
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
                                    <label class="label">Prompt</label>
                                    <div class="control">
                                        <textarea class="textarea" id="prompt" rows="3" placeholder="Prompt" v-model="content.prompt"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Course</label>
                                    <div class="control">
                                        <input type="text" class="input" id="course" placeholder="Course" v-model="content.course">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Style</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select class="" id="style" v-model="content.style">
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

    data() {
        return {
            content: {
                title: '',
                prompt: '',
                course: '',
                style: '',
            },
            paper: false,
        }
    },

    methods: {
        create() {
            axios.post('/api/papers', {
                title: this.content.title,
                prompt: this.content.prompt,
                course: this.content.course,
                style: this.content.style,
            })
                .then(response => {
                    this.paper = response.data;
                    this.$eventBus.$emit('createPaperItem', this.paper);
                    this.content.title = '';
                    this.content.prompt = '';
                    this.content.course = '';
                    this.content.style = '';
                    this.createModalToggle();
                });
        },
        createModalToggle() {
            $('#create-paper-modal').toggleClass('is-active');
        }
    }

}

</script>
