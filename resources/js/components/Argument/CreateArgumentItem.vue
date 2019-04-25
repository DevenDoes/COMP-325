<template>

    <div>

        <div class="box has-text-cenetered">
            <button type="button" class="button is-primary is-outlined is-fullwidth" @click.prevent="createModalToggle">New Argument</button>
        </div>

        <!-- Update Modal -->
        <div class="modal" id="create-argument-modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">New Argument</p>
                    <button class="delete" aria-label="close" @click.prevent="createModalToggle"></button>
                </header>
                <form @submit.prevent="create">
                    <section class="modal-card-body">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Argument</label>
                                    <div class="control">
                                        <textarea class="textarea" id="argument" rows="3" placeholder="Argument" v-model="content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <analysis-argument-selector
                                    :selectedAnalyses="selected"
                                    :deselectedAnalyses="deselected"
                                    @selectAnalysisForArgument="selectAnalysis"
                                    @deselectAnalysisForArgument="deselectAnalysis"></analysis-argument-selector>
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

import AnalysisArgumentSelector from './AnalysisArgumentSelector';

export default {

    components: {
        AnalysisArgumentSelector,
    },

    props: {
        paper: Number,
        analysesList: Array,
    },

    data() {
        return {
            paper_id: this.paper,
            content: '',
            selected: [],
            deselected: [],
            argument: false,
        }
    },

    created() {
        this.copyObject(this.deselected, this.analysesList);
    },

    watch: {
        researchList: function() {
            this.copyObject(this.deselected, this.analysesList);
        },
    },

    methods: {
        create() {
            axios.post('/api/papers/' + this.paper_id + '/arguments', {
                content: this.content,
                selected: this.selected,
                deselected: this.deselected,
            })
                .then(response => {
                    this.argument = response.data;
                    this.$eventBus.$emit('createArgumentItem', this.argument);
                    this.content = '';
                    this.selected = [];
                    this.deselected = this.analysesList;
                    this.createModalToggle();
                });
        },
        createModalToggle() {
            $('#create-argument-modal').toggleClass('is-active');
        },
        selectAnalysis(research) {
            this.deselected.splice(this.deselected.indexOf(research), 1);
            this.selected.unshift(research);
        },
        deselectAnalysis(research) {
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

