<template>

    <div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" v-text="title"></h5>
                <hr>
                <p class="card-text" v-text="prompt"></p>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    props: ['papertitle', 'paperprompt'],

    data() {
        return {
            title: this.papertitle,
            prompt: this.paperprompt,
        }
    },
}

</script>
