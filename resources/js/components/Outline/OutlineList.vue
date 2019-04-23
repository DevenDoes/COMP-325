<template>

    <div class="columns">
        <div class="column is-6">
            <div class="columns is-multiline">
                <outline-item
                    v-for="(outline, index) in leftColumn"
                    @deleteOutlineItem="deleteOutlineItem"
                    :index="index"
                    side="left"
                    :outline="outline"
                    :id="'outline-item-' + outline.id"
                    :key="'outline-item-' + outline.id"
                    style="width:100%">
                </outline-item>
            </div>
        </div>
        <div class="column is-6">
            <div class="columns is-multiline">
                <outline-item
                    v-for="(outline, index) in rightColumn"
                    @deleteOutlineItem="deleteOutlineItem"
                    :index="index"
                    side="right"
                    :outline="outline"
                    :id="'outline-item-' + outline.id"
                    :key="'outline-item-' + outline.id"
                    style="width:100%">
                </outline-item>
            </div>
        </div>
    </div>

</template>

<script>

import OutlineItem from './OutlineItem';

export default {

    components : {
        OutlineItem,
    },

    props : {
        paper: String,
        outlinesList: Array,
    },

    data() {
        return {
            paperid: this.paper,
            leftColumn: [],
            rightColumn: [],
        }
    },

    watch: {
        outlinesList: function() {
            for(var i = 0; i < this.outlinesList.length; i++) {
                if((i + 2) % 2 == 0) {
                    this.leftColumn.push(this.outlinesList[i]);
                }
                else {
                    this.rightColumn.push(this.outlinesList[i])
                }
            }
        },
    },

    methods: {
        deleteOutlineItem(outlineItem) {
            if(outlineItem.side == "left") {
                this.leftColumn.splice(outlineItem.index, 1);
            }
            else {
                this.rightColumn.splice(outlineItem.index, 1);
            }
        },
    },
}

</script>
