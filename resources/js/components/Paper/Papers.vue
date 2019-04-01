<template>

    <div>
        <div v-for="(paper, index) in papers" :key="paper.id">
            <paper :paper="paper" @deleted="remove(index)"></paper>
        </div>
    </div>

</template>

<script>

    import Paper from './Paper.vue';

    export default {
        components: { Paper },

        data() {
            return {
                papers: false
            }
        },

        created() {
            axios.get('/api/papers').then(response => this.papers = response.data);
            this.$eventBus.$on('createdPaper', (data) => {
                console.log(data);
                this.add(data);
            });
        },

        methods: {
            remove(index) {
                this.papers.splice(index, 1);
            },
            add(paper) {
                this.papers.push(paper);
            }
        }
    }

</script>
