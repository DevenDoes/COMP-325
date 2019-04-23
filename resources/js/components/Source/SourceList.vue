<template>

    <div>
        <div class="columns">
            <div class="column is-6">
                <div class="columns is-multiline">
                    <source-item
                        v-for="(source, index) in leftColumn"
                        :key="source.id"
                        :paper="paper_id"
                        :source="source"
                        :index="index"
                        side="left"
                        @deleteSourceItem="deleteSourceItem"
                        style="width:100%">
                    </source-item>
                </div>
            </div>
            <div class="column is-6">
                <div class="columns is-multiline">
                    <source-item
                        v-for="(source, index) in rightColumn"
                        :key="source.id"
                        :paper="paper_id"
                        :source="source"
                        :index="index"
                        side="right"
                        @deleteSourceItem="deleteSourceItem"
                        style="width:100%">
                    </source-item>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import SourceItem from './SourceItem';

export default {

    components: { SourceItem },

    props: {
        paper: Number,
    },

    data() {
        return {
            paper_id: this.paper,
            leftColumn: [],
            rightColumn: [],
        }
    },

    created() {
        axios.get('/api/papers/' + this.paper_id + '/sources')
            .then(response => {
                for(var i = 0; i < response.data.length; i++) {
                    if((i + 2) % 2 == 0) {
                        this.leftColumn.push(response.data[i]);
                    }
                    else {
                        this.rightColumn.push(response.data[i])
                    }
                }
            });
        this.$eventBus.$on('createSourceItem', (source) => {
            console.log(source);
            this.addSourceItem(source);
        });
    },

    methods: {
        deleteSourceItem(sourceItem) {
            if(sourceItem.side == "left") {
                this.leftColumn.splice(sourceItem.index, 1);
            }
            else {
                this.rightColumn.splice(sourceItem.index, 1);
            }
        },
        addSourceItem(source) {
            this.leftColumn.unshift(source);
        },
    }

}

</script>

