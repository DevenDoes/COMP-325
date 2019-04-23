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
                                    <span class="tag is-light">Analysis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-narrow">
                        <div class="dropdown is-right" :id="'analysis-dropdown-'+ id">
                            <div class="dropdown-trigger is-pulled-right">
                                <a href="" @click.prevent="dropdownToggle" aria-haspopup="true" :aria-controls="'dropdown-menu-'+id">
                                    <span class="icon is-small">
                                        <i class="fas fa-ellipsis-h has-text-grey-light"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-menu is-active" :id="'analysis-dropdown-menu-'+id" role="menu">
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
        <div class="modal" :id="'analysis-update-modal-' + id">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Analysis</p>
                    <button class="delete" aria-label="close" @click.prevent="updateModalToggle"></button>
                </header>
                <form @submit.prevent="update">
                    <section class="modal-card-body">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Analysis</label>
                                    <div class="control">
                                        <textarea class="textarea" id="analysis" rows="3" placeholder="Analysis" v-model="temp.content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <analysis-research-selector
                                    :selectedResearch="temp.selected"
                                    :deselectedResearch="temp.deselected"
                                    @selectResearchForAnalysis="selectResearch"
                                    @deselectResearchForAnalysis="deselectResearch"></analysis-research-selector>
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

import AnalysisResearchSelector from './AnalysisResearchSelector'

export default {

    components: {
        AnalysisResearchSelector,
    },

    props: {
        index: Number,
        side: String,
        analysis: Object,
        researchList: Array,
    },

    data() {
        return {
            id: this.analysis.id,
            paper_id: this.analysis.paper_id,
            current: {
                content: this.analysis.content,
                selected: this.analysis.evidence,
                deselected: [],
            },
            temp: {
                content: this.analysis.content,
                selected: this.analysis.evidence,
                deselected: [],
            },
        }
    },

    watch: {
        researchList: function() {
            let temp = [];
            this.researchList.forEach(el => {
                this.analysis.evidence.forEach(evi => {
                    if(evi.id == el.id) {
                        temp.push(el)
                    }
                });
            });
            this.current.deselected = this.researchList.filter(el => {
                return !(temp.includes(el));
            });
            this.temp.deselected = this.current.deselected;
        },
    },

    created() {
        let temp = [];
        this.researchList.forEach(el => {
            this.analysis.evidence.forEach(evi => {
                if(evi.id == el.id) {
                    temp.push(el)
                }
            });
        });
        this.current.deselected = this.researchList.filter(el => {
            return !(temp.includes(el));
        });
        this.temp.deselected = this.current.deselected;
    },

    methods: {
        dropdownToggle() {
            $('#analysis-dropdown-'+this.id).toggleClass('is-active');
        },
        updateModalToggle() {
            $('#analysis-update-modal-' + this.id).toggleClass('is-active');
        },
        copyObject(toSet, toGet) {
            Object.keys(toGet).forEach((key) => {
                this.$set(toSet, key, toGet[key]);
            });
        },
        update() {
            axios.patch('/api/papers/' + this.paper_id + '/analyses/' + this.id, {
                content: this.temp.content,
                selected: this.temp.selected,
                deselected: this.temp.deselected,
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
            axios.delete('/api/papers/' + this.paper_id + '/analyses/' + this.id, {})
                .then(response => {
                    this.$emit('deleteAnalysisItem', data);
                });
        },
        selectResearch(research) {
            this.temp.deselected.splice(this.temp.deselected.indexOf(research), 1);
            this.temp.selected.unshift(research);
        },
        deselectResearch(research) {
            this.temp.selected.splice(this.temp.selected.indexOf(research), 1);
            this.temp.deselected.unshift(research);
        },
    },

}

</script>
