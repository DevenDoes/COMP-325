<template>

    <div class="columns">
        <div class="column is-6">
            <h2 class="title is-6">Selected Analyses</h2>
            <hr>
            <div class="columns is-multiline analysis-argument-selector-column">
                <div v-for="(analysis, index) in selected" :key="'analysis-selected-'+index" class="column is-12">
                    <div class="box">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <p v-text="analysis.content"></p>
                            </div>
                            <div class="column">
                                <div class="field is-grouped is-grouped-multiline">
                                    <div class="control">
                                        <div class="tags has-addons">
                                            <span class="tag is-light">Analysis</span>
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
            <h2 class="title is-6">Unselected Analyses</h2>
            <hr>
            <div class="columns is-multiline analysis-argument-selector-column">
                <div v-for="(analysis, index) in deselected" :key="'analysis-deselected-'+index" class="column is-12">
                    <div class="box">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <p v-text="analysis.content"></p>
                            </div>
                            <div class="column">
                                <div class="field is-grouped is-grouped-multiline">
                                    <div class="control">
                                        <div class="tags has-addons">
                                            <span class="tag is-light">Analysis</span>
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
        selectedAnalyses: Array,
        deselectedAnalyses: Array,
    },

    data() {
        return {
            selected: this.selectedAnalyses,
            deselected: this.deselectedAnalyses,
        }
    },

    watch: {
        selectedAnalyses: function() {
            this.selected = this.selectedAnalyses;
        },
        deselectedAnalyses: function() {
            this.deselected = this.deselectedAnalyses;
        }
    },

    methods: {
        select(index) {
            let analysis = this.deselected[index];
            this.$emit('selectAnalysisForArgument', analysis);
        },
        deselect(index) {
            let analysis = this.selected[index];
            this.$emit('deselectAnalysisForArgument', analysis);
        }
    }

}

</script>
