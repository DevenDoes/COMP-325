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
                                    <span class="tag is-light">Argument</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-narrow">
                        <div class="dropdown is-right" :id="'argument-dropdown-'+ id">
                            <div class="dropdown-trigger is-pulled-right">
                                <a href="" @click.prevent="dropdownToggle" aria-haspopup="true" :aria-controls="'dropdown-menu-'+id">
                                    <span class="icon is-small">
                                        <i class="fas fa-ellipsis-h has-text-grey-light"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-menu is-active" :id="'argument-dropdown-menu-'+id" role="menu">
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
        <div class="modal" :id="'argument-update-modal-' + id">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Argument</p>
                    <button class="delete" aria-label="close" @click.prevent="updateModalToggle"></button>
                </header>
                <form @submit.prevent="update">
                    <section class="modal-card-body">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label">Argument</label>
                                    <div class="control">
                                        <textarea class="textarea" id="argument" rows="3" placeholder="Argument" v-model="temp.content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <analysis-argument-selector
                                    :selectedAnalyses="temp.selected"
                                    :deselectedAnalyses="temp.deselected"
                                    @selectAnalysisForArgument="selectAnalysis"
                                    @deselectAnalysisForArgument="deselectAnalysis"></analysis-argument-selector>
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

import AnalysisArgumentSelector from './AnalysisArgumentSelector'

export default {

    components: {
        AnalysisArgumentSelector,
    },

    props: {
        index: Number,
        side: String,
        argument: Object,
        analysesList: Array,
    },

    data() {
        return {
            id: this.argument.id,
            paper_id: this.argument.paper_id,
            current: {
                content: this.argument.content,
                selected: this.argument.analyses,
                deselected: [],
            },
            temp: {
                content: this.argument.content,
                selected: this.argument.analyses,
                deselected: [],
            },
        }
    },

    watch: {
        analysesList: function() {
            let temp = [];
            this.analysesList.forEach(el => {
                this.argument.analyses.forEach(ana => {
                    if(ana.id == el.id) {
                        temp.push(el)
                    }
                });
            });
            this.current.deselected = this.analysesList.filter(el => {
                return !(temp.includes(el));
            });
            this.temp.deselected = this.current.deselected;
        },
    },

    created() {
        let temp = [];
        this.analysesList.forEach(el => {
            this.argument.analyses.forEach(ana => {
                if(ana.id == el.id) {
                    temp.push(el)
                }
            });
        });
        this.current.deselected = this.analysesList.filter(el => {
            return !(temp.includes(el));
        });
        this.temp.deselected = this.current.deselected;
    },

    methods: {
        dropdownToggle() {
            $('#argument-dropdown-'+this.id).toggleClass('is-active');
        },
        updateModalToggle() {
            $('#argument-update-modal-' + this.id).toggleClass('is-active');
        },
        copyObject(toSet, toGet) {
            Object.keys(toGet).forEach((key) => {
                this.$set(toSet, key, toGet[key]);
            });
        },
        update() {
            axios.patch('/api/papers/' + this.paper_id + '/arguments/' + this.id, {
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
            axios.delete('/api/papers/' + this.paper_id + '/arguments/' + this.id, {})
                .then(response => {
                    this.$emit('deleteArgumentItem', data);
                });
        },
        selectAnalysis(analysis) {
            this.temp.deselected.splice(this.temp.deselected.indexOf(analysis), 1);
            this.temp.selected.unshift(analysis);
        },
        deselectAnalysis(analysis) {
            this.temp.selected.splice(this.temp.selected.indexOf(analysis), 1);
            this.temp.deselected.unshift(analysis);
        },
    },

}

</script>
