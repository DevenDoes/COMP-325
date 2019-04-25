<template>

    <div>

        <div class="box has-text-cenetered">
            <button type="button" class="button is-primary is-outlined is-fullwidth" @click.prevent="createModalToggle">New Analysis</button>
        </div>

        <!-- Update Modal -->
        <div class="modal" id="create-analysis-modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">New Analysis</p>
                    <button class="delete" aria-label="close" @click.prevent="createModalToggle"></button>
                </header>
                <form @submit.prevent="create">
                    <section class="modal-card-body">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Analysis</label>
                                    <div class="control">
                                        <textarea class="textarea" id="analysis" rows="3" placeholder="Analysis" v-model="content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <analysis-research-selector
                                    :selectedResearch="selected"
                                    :deselectedResearch="deselected"
                                    @selectResearchForAnalysis="selectResearch"
                                    @deselectResearchForAnalysis="deselectResearch"></analysis-research-selector>
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

import AnalysisResearchSelector from './AnalysisResearchSelector';

export default {

    components: {
        AnalysisResearchSelector,
    },

    props: {
        paper: Number,
        researchList: Array,
    },

    data() {
        return {
            paper_id: this.paper,
            content: '',
            selected: [],
            deselected: [],
            analysis: false,
        }
    },

    created() {
        this.copyObject(this.deselected, this.researchList);
    },

    watch: {
        researchList: function() {
            this.copyObject(this.deselected, this.researchList);
        },
    },

    methods: {
        create() {
            axios.post('/api/papers/' + this.paper_id + '/analysis', {
                content: this.content,
                selected: this.selected,
                deselected: this.deselected,
            })
                .then(response => {
                    this.analysis = response.data;
                    console.log(this.analysis);
                    this.$eventBus.$emit('createAnalysisItem', this.analysis);
                    this.content = '';
                    this.selected = [];
                    this.deselected = this.researchList;
                    this.createModalToggle();
                });
        },
        createModalToggle() {
            $('#create-analysis-modal').toggleClass('is-active');
        },
        selectResearch(research) {
            this.deselected.splice(this.deselected.indexOf(research), 1);
            this.selected.unshift(research);
        },
        deselectResearch(research) {
            this.selected.splice(this.selected.indexOf(research), 1);
            this.deselected.unshift(research);
        },
        copyObject(toSet, toGet) {
            Object.keys(toGet).forEach((key) => {
                this.$set(toSet, key, toGet[key]);
            });
        },
    },

}

</script>

