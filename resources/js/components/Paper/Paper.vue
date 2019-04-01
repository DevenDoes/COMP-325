<template>
    <div>
        <div class="card mb-3" :id="'paper-'+id">
            <div class="card-body">
                <div class="row justify-content-between px-2">
                    <a :href="url" class="h5 card-title col-11 px-0" v-text="this.title"></a>
                    <div class="dropdown col-1">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="paperSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a href="" class="dropdown-item" @click.prevent="updateToggle">
                                Update
                            </a>
                            <a href="" class="dropdown-item" @click.prevent="destroy">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row px-2">
                    <button type="button" class="btn btn-sm btn-primary mr-2">
                        Course <span class="badge badge-light"v-text="paper.course"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary mr-2">
                        Style <span class="badge badge-light" v-text="paper.style"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" :id="'paper-modal-'+id">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Paper</h5>
                    </div>
                    <form @submit.prevent="update">
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
                                            <option>APA</option>
                                            <option>CSE</option>
                                            <option>MLA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Update</button>
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
        props: ['paper'],

        data() {
            return {
                id: this.paper.id,
                title: this.paper.title,
                course: this.paper.course,
                style: this.paper.style,
                prompt: this.paper.prompt,
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
                this.$emit('deleted', this.id);
            },
            updateToggle() {
                $('#paper-modal-' + this.id).modal('toggle');
            },
            update() {
                axios.patch('/api/papers/' + this.id, {
                    title: this.title,
                    prompt: this.prompt,
                    course: this.course,
                    style: this.style,
                });
                this.updateToggle();
            }
        }
    }

</script>
