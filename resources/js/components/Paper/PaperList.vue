<template>

    <div>
        <div v-for="(paper, index) in papers" :key="paper.id">
            <paper-item
                :paper="paper"
                :index="index"
                @deletePaperItem="deletePaperItem"
                style="width:100%"></paper-item>
        </div>
    </div>

</template>

<script>

import PaperItem from './PaperItem';

export default {

    components: { PaperItem },

    data() {
        return {
            papers: false,
        }
    },

    created() {
        axios.get('/api/papers')
            .then(response => this.papers = response.data);
        this.$eventBus.$on('createPaperItem', (paper) => {
            console.log(paper);
            this.addPaperItem(paper);
        });
    },

    methods: {
        deletePaperItem(index) {
            this.papers.splice(index, 1);
        },
        addPaperItem(paper) {
            this.papers.unshift(paper);
        },
    }

}

</script>

