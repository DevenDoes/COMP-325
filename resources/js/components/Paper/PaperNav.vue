<template>

    <div>
        <ul class="nav nav-tabs row text-center">
            <div class="col-3">
                <li class="nav-item">
                    <a href="" class="nav-link active" @click.prevent="this.$emit('showResearch')">
                        Research
                        <span class="badge badge-primary" v-text="research"></span>
                    </a>
                </li>
            </div>
            <div class="col-3">
                <li class="nav-item">
                    <a href="" class="nav-link"  @click.prevent="this.$emit('showAnalyses')">
                        Analyses
                        <span class="badge badge-primary" v-text="analysis"></span>
                    </a>
                </li>
            </div>
            <div class="col-3">
                <li class="nav-item">
                    <a href="" class="nav-link"  @click.prevent="this.$emit('showArguments')">
                        Arguments
                        <span class="badge badge-primary" v-text="argument"></span>
                    </a>
                </li>
            </div>
            <div class="col-3">
                <li class="nav-item">
                    <a href="" class="nav-link"  @click.prevent="this.$emit('showOutlines')">
                        Outlines
                        <span class="badge badge-primary" v-text="outline"></span>
                    </a>
                </li>
            </div>
        </ul>
    </div>

</template>

<script>

export default {
    props: ['researchCount', 'analysisCount', 'argumentCount', 'outlineCount'],
    data() {
        return {
            research: this.researchCount,
            analysis: this.analysisCount,
            argument: this.argumentCount,
            outline: this.outlineCount,
        }
    },
}

</script>
