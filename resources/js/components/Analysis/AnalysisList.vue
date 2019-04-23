<template>

    <div class="columns">
        <div class="column is-6">
            <div class="columns is-multiline">
                <analysis-item
                    v-for="(analysis, index) in leftColumn"
                    @deleteAnalysisItem="deleteAnalysisItem"
                    :index="index"
                    side="left"
                    :analysis="analysis"
                    :researchList="researchList"
                    :id="'analysis-item-' + analysis.id"
                    :key="'analysis-item-' + analysis.id"
                    style="width:100%">
                </analysis-item>
            </div>
        </div>
        <div class="column is-6">
            <div class="columns is-multiline">
                <analysis-item
                    v-for="(analysis, index) in rightColumn"
                    @deleteAnalysisItem="deleteAnalysisItem"
                    :index="index"
                    side="right"
                    :analysis="analysis"
                    :researchList="researchList"
                    :id="'analysis-item-' + analysis.id"
                    :key="'analysis-item-' + analysis.id"
                    style="width:100%">
                </analysis-item>
            </div>
        </div>
    </div>

</template>

<script>

import AnalysisItem from './AnalysisItem';

export default {

    components : {
        AnalysisItem,
    },

    props : {
        paper: String,
        analysesList: Array,
        researchList: Array,
    },

    data() {
        return {
            paperid: this.paper,
            leftColumn: [],
            rightColumn: [],
        }
    },

    watch: {
        analysesList: function() {
            for(var i = 0; i < this.analysesList.length; i++) {
                if((i + 2) % 2 == 0) {
                    this.leftColumn.push(this.analysesList[i]);
                }
                else {
                    this.rightColumn.push(this.analysesList[i])
                }
            }
        },
    },

    methods: {
        deleteAnalysisItem(analysisItem) {
            if(analysisItem.side == "left") {
                this.leftColumn.splice(analysisItem.index, 1);
            }
            else {
                this.rightColumn.splice(analysisItem.index, 1);
            }
        },
    },
}

</script>
