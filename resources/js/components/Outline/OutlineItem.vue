<template>

    <div>

        <!-- Card Element -->
        <div class="column is-12">
            <div class="box">
                <div class="columns is-multiline">
                    <div class="column is-12">
                        <p v-text="current.thesis"></p>
                    </div>
                    <div class="column">
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-light">Outline</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-narrow">
                        <div class="dropdown is-right" :id="'outline-dropdown-'+ id">
                            <div class="dropdown-trigger is-pulled-right">
                                <a href="" @click.prevent="dropdownToggle" aria-haspopup="true" :aria-controls="'dropdown-menu-'+id">
                                    <span class="icon is-small">
                                        <i class="fas fa-ellipsis-h has-text-grey-light"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-menu is-active" :id="'outline-dropdown-menu-'+id" role="menu">
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

</template>

<script>

export default {

    props: {
        index: Number,
        side: String,
        outline: Object,
    },

    data() {
        return {
            id: this.outline.id,
            paper_id: this.outline.paper_id,
            current: {
                thesis: this.outline.thesis,
            },
        }
    },

    methods: {
        dropdownToggle() {
            $('#outline-dropdown-'+this.id).toggleClass('is-active');
        },
        destroy() {
            let data = {
                index: this.index,
                side: this.side,
            };
            axios.delete('/api/papers/' + this.paper_id + '/outlines/' + this.id, {})
                .then(response => {
                    this.$emit('deleteOutlineItem', data);
                });
        },
    },

}

</script>
