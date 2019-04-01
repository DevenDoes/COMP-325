<template>

    <div>
        <papernav :researchCount="this.evidence.length" :analysisCount="this.analyses.length" :argumentCount="this.arguments.length" :outlineCount="this.outlines.length"></papernav>
        <paperelements v-show="active == 'research'" :paperContent="evidence"></paperelements>
    </div>

</template>

<script>

export default {
    props: ['paperid'],

    data() {
        return {
            id: this.paperid,
            evidence: [],
            analyses: [],
            arguments: [],
            outlines: [],
            active: 'research',
        }
    },

    created() {
        axios.get('/api/papers/' + this.id).then(response => {
            this.evidence = response.data[0].evidence;
            this.analyses = response.data[0].analyses;
            this.arguments = response.data[0].arguments;
            this.outlines = response.data[0].outlines;
            this.active = 'research';
        });
    },

    computed: {

    },

    methods: {
        showResearch() {
            this.active = 'research';
        },
        showAnalyses() {
            this.active = 'analyses';
        },
        showArguments() {
            this.active = 'arguments';
        },
        showOutlines() {
            this.active = 'outlines';
        },
    }
}

</script>
