<template>

    <div class="columns is-multiline">
        <div class="column is-12">
            <div class="tabs is-centered is-boxed is-fullwidth">
                <ul>
                    <li id="researchTab" class="is-active">
                        <a @click.prevent="showResearch"><span>Research</span></a>
                    </li>
                    <li id="analysisTab" class="">
                        <a @click.prevent="showAnalyses"><span>Analyses</span></a>
                    </li>
                    <li id="argumentTab" class="">
                        <a @click.prevent="showArguments"><span>Arguments</span></a>
                    </li>
                    <li id="outlineTab" class="">
                        <!--<a @click.prevent="showOutlines"><span>Outlines</span></a>-->
                        <a @click.prevent=""><span>Outlines</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="column is-12">
            <research-list
                id="researchList"
                :paper="id"
                :researchList="researchList">
            </research-list>
            <analysis-list
                id="analysisList"
                class="is-hidden"
                :paper="id"
                :analysesList="analysesList"
                :researchList="researchList">
            </analysis-list>
            <argument-list
                id="argumentList"
                class="is-hidden"
                :paper="id"
                :argumentsList="argumentsList"
                :analysesList="analysesList">
            </argument-list>
            <outline-list
                id="outlineList"
                class="is-hidden"
                :paper="id"
                :outlinesList="outlinesList">
            </outline-list>
        </div>


    </div>


</template>

<script>

import ResearchList from '../Research/ResearchList';
import AnalysisList from '../Analysis/AnalysisList';
import ArgumentList from '../Argument/ArgumentList';
import OutlineList from '../Outline/OutlineList';

export default {

    components : {
        ResearchList,
        AnalysisList,
        ArgumentList,
        OutlineList,
    },

    props: ['paperid'],

    data() {
        return {
            id: this.paperid,
            activeTab: 'research',
            researchList: [],
            analysesList: [],
            argumentsList: [],
            outlinesList: [],
        }
    },

    created() {
        //Get research
        axios.get('/api/papers/' + this.id + '/evidence')
            .then((response) => {
                this.researchList = response.data;
            });
        //Get analyses
        axios.get('/api/papers/' + this.id + '/analyses')
            .then((response) => {
                this.analysesList = response.data;
            });
        //Get arguments
        axios.get('/api/papers/' + this.id + '/arguments')
            .then((response) => {
                this.argumentsList = response.data;
            });
        //Get outlines
        axios.get('/api/papers/' + this.id + '/outlines')
            .then((response) => {
                this.outlinesList = response.data;
            });
    },

    methods: {
        toggleDisplayedContent() {
            if(this.activeTab == "research") {
                $('#researchTab').addClass('is-active');
                $('#researchList').removeClass('is-hidden');
            }
            else {
                $('#researchTab').removeClass('is-active');
                $('#researchList').addClass('is-hidden');
            }
            if(this.activeTab == "analyses") {
                $('#analysisTab').addClass('is-active');
                $('#analysisList').removeClass('is-hidden');
            }
            else {
                $('#analysisTab').removeClass('is-active');
                $('#analysisList').addClass('is-hidden');
            }
            if(this.activeTab == "arguments") {
                $('#argumentTab').addClass('is-active');
                $('#argumentList').removeClass('is-hidden');
            }
            else {
                $('#argumentTab').removeClass('is-active');
                $('#argumentList').addClass('is-hidden');
            }
            if(this.activeTab == "outlines") {
                $('#outlineTab').addClass('is-active');
                $('#outlineList').removeClass('is-hidden');
            }
            else {
                $('#outlineTab').removeClass('is-active');
                $('#outlineList').addClass('is-hidden');
            }
        },
        showResearch() {
            this.activeTab = 'research';
            this.toggleDisplayedContent();
        },
        showAnalyses() {
            this.activeTab = 'analyses';
            this.toggleDisplayedContent();
        },
        showArguments() {
            this.activeTab = 'arguments';
            this.toggleDisplayedContent();
        },
        showOutlines() {
            this.activeTab = 'outlines';
            this.toggleDisplayedContent();
        },
    }
}

</script>
