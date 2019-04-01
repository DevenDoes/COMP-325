<template>

    <div>
        <div class="card">
            <div class="card-body text-center">
                <button type="button" class="btn btn-outline-success" @click.prevent="updateToggle">New Paper</button>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="paper-modal-new">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Paper</h5>
                    </div>
                    <form @submit.prevent="post">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" placeholder="enter title" v-model="title">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="prompt">Prompt</label>
                                        <textarea class="form-control" id="prompt" rows="3" placeholder="enter prompt" v-model="prompt"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="course">Course</label>
                                        <input type="text" class="form-control" id="course" placeholder="enter course" v-model="course">
                                    </div>
                                    <div class="col-6">
                                        <label for="style">Style</label>
                                        <select class="form-control" id="style" v-model="style">
                                            <option></option>
                                            <option>APA</option>
                                            <option>CSE</option>
                                            <option>MLA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Create</button>
                            <button class="btn btn-secondary" @click.prevent="updateToggle">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    data() {
        return {
            title: '',
            prompt: '',
            course: '',
            style: '',
        }
    },

    methods: {
        updateToggle() {
            $('#paper-modal-new').modal('toggle');
        },
        post() {
            axios.post('/api/papers', {
                title: this.title,
                prompt: this.prompt,
                course: this.course,
                style: this.style,
            })
            .then(({data}) => {
                this.$eventBus.$emit('createdPaper', {
                    title: this.title,
                    prompt: this.prompt,
                    course: this.course,
                    style: this.style,
                });
                this.title = '';
                this.prompt = '';
                this.course = '';
                this.style = '';
                this.updateToggle();
            });
        }
    }
}

</script>
