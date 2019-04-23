<template>

    <div class="columns">
        <div class="column is-6">
            <h2 class="title is-6">Selected Research</h2>
            <hr>
            <div class="columns is-multiline analysis-research-selector-column">
                <div v-for="(research, index) in selected" :key="'research-selected-'+index" class="column is-12">
                    <div class="box">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <p v-text="research.content"></p>
                            </div>
                            <div class="column">
                                <div class="field is-grouped is-grouped-multiline">
                                    <div class="control">
                                        <div class="tags has-addons">
                                            <span class="tag is-light">Evidence</span>
                                            <span class="tag is-primary" v-text="research.type"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-narrow">
                                <a class="button is-small is-danger is-outlined" @click.prevent="deselect(index)">
                                    <span class="icon is-small">
                                        <i class="fas fa-minus"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-6">
            <h2 class="title is-6">Unselected Research</h2>
            <hr>
            <div class="columns is-multiline analysis-research-selector-column">
                <div v-for="(research, index) in deselected" :key="'research-deselected-'+index" class="column is-12">
                    <div class="box">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <p v-text="research.content"></p>
                            </div>
                            <div class="column">
                                <div class="field is-grouped is-grouped-multiline">
                                    <div class="control">
                                        <div class="tags has-addons">
                                            <span class="tag is-light">Evidence</span>
                                            <span class="tag is-primary" v-text="research.type"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-narrow">
                                <a class="button is-small is-success is-outlined" @click.prevent="select(index)">
                                    <span class="icon is-small">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </a>
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
        selectedResearch: Array,
        deselectedResearch: Array,
    },

    data() {
        return {
            selected: this.selectedResearch,
            deselected: this.deselectedResearch,
        }
    },

    watch: {
        selectedResearch: function() {
            this.selected = this.selectedResearch;
        },
        deselectedResearch: function() {
            this.deselected = this.deselectedResearch;
        }
    },

    methods: {
        select(index) {
            let research = this.deselected[index];
            this.$emit('selectResearchForAnalysis', research);
        },
        deselect(index) {
            let research = this.selected[index];
            this.$emit('deselectResearchForAnalysis', research);
        }
    }

}

</script>
