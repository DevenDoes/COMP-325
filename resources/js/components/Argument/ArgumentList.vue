<template>

    <div class="columns">
        <div class="column is-6">
            <div class="columns is-multiline">
                <argument-item
                    v-for="(argument, index) in leftColumn"
                    @deleteArgumentItem="deleteArgumentItem"
                    :index="index"
                    side="left"
                    :argument="argument"
                    :analysesList="analysesList"
                    :id="'argument-item-' + argument.id"
                    :key="'argument-item-' + argument.id"
                    style="width:100%">
                </argument-item>
            </div>
        </div>
        <div class="column is-6">
            <div class="columns is-multiline">
                <argument-item
                    v-for="(argument, index) in rightColumn"
                    @deleteArgumentItem="deleteArgumentItem"
                    :index="index"
                    side="right"
                    :argument="argument"
                    :analysesList="analysesList"
                    :id="'argument-item-' + argument.id"
                    :key="'argument-item-' + argument.id"
                    style="width:100%">
                </argument-item>
            </div>
        </div>
    </div>

</template>

<script>

import ArgumentItem from './ArgumentItem';

export default {

    components : {
        ArgumentItem,
    },

    props : {
        paper: Number,
        argumentsList: Array,
        analysesList: Array,
    },

    data() {
        return {
            paperid: this.paper,
            leftColumn: [],
            rightColumn: [],
        }
    },

    created() {
        for(var i = 0; i < this.argumentsList.length; i++) {
            if((i + 2) % 2 == 0) {
                this.leftColumn.push(this.argumentsList[i]);
            }
            else {
                this.rightColumn.push(this.argumentsList[i])
            }
        }
        this.$eventBus.$on('createArgumentItem', (argument) => {
            this.addArgumentItem(argument);
        });
    },

    watch: {
        argumentsList: function() {
            for(var i = 0; i < this.argumentsList.length; i++) {
                if((i + 2) % 2 == 0) {
                    this.leftColumn.push(this.argumentsList[i]);
                }
                else {
                    this.rightColumn.push(this.argumentsList[i])
                }
            }
        },
    },

    methods: {
        deleteArgumentItem(argumentItem) {
            if(argumentItem.side == "left") {
                this.leftColumn.splice(argumentItem.index, 1);
            }
            else {
                this.rightColumn.splice(argumentItem.index, 1);
            }
        },
        addArgumentItem(argument) {
            this.leftColumn.unshift(argument);
        },
    },
}

</script>
