<template>

    <div class="columns">
        <div class="column is-6">
            <div class="columns is-multiline">
                <research-item
                    v-for="(research, index) in leftColumn"
                    @deleteResearchItem="deleteResearchItem"
                    :index="index"
                    side="left"
                    :research="research"
                    :id="'research-item-' + research.id"
                    :key="'research-item-' + research.id"
                    style="width:100%">
                </research-item>
            </div>
        </div>
        <div class="column is-6">
            <div class="columns is-multiline">
                <research-item
                    v-for="(research, index) in rightColumn"
                    @deleteResearchItem="deleteResearchItem"
                    :index="index"
                    side="right"
                    :research="research"
                    :id="'research-item-' + research.id"
                    :key="'research-item-' + research.id"
                    style="width:100%">
                </research-item>
            </div>
        </div>
    </div>

</template>

<script>

import ResearchItem from './ResearchItem';

export default {

    components : {
        ResearchItem,
    },

    props : {
        paper: String,
        researchList: Array,
    },

    data() {
        return {
            paperid: this.paper,
            leftColumn: [],
            rightColumn: [],
            research: this.researchList,
        }
    },

    watch: {
        researchList: function() {
            this.research = this.researchList;
        },
        research: function() {
            for(var i = 0; i < this.research.length; i++) {
                if((i + 2) % 2 == 0) {
                    this.leftColumn.push(this.research[i]);
                }
                else {
                    this.rightColumn.push(this.research[i])
                }
            }
        },
    },

    created() {
        for(var i = 0; i < this.research.length; i++) {
            if((i + 2) % 2 == 0) {
                this.leftColumn.push(this.research[i]);
            }
            else {
                this.rightColumn.push(this.research[i])
            }
        }
        this.$eventBus.$on('createResearchItem', (research) => {
            this.addResearchItem(research);
        });
    },

    methods: {
        deleteResearchItem(researchItem) {
            if(researchItem.side == "left") {
                this.leftColumn.splice(researchItem.index, 1);
            }
            else {
                this.rightColumn.splice(researchItem.index, 1);
            }
        },
        addResearchItem(research) {
            this.leftColumn.unshift(research);
        },
    },
}

</script>
