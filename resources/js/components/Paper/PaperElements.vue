<template>

    <div>
    </div>

</template>

<script>

export default {
    props: ['paperContent'],

    data() {
        return {
            content: this.paperContent[0],
        }
    },

    created() {
        console.log(this.paperContent);
    },

    computed: {

    },

    methods: {
    }
}

</script>
