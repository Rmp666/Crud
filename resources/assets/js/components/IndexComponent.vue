<template>
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">
                    Toggle nav 
                </button>
            </p>
            <div class="jumbotron">
                <h1>Newspaper</h1>
                <p>Laravel+Vue.js, Axios, Vue-router</p>
            </div>
            <div class="row">
                <div class="row row-padding" v-for = "paperArr, indexRow in papers">
                    <div class="col-6 col-sm-6 col-lg-4" v-for = "paper, indexCol in paperArr">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <router-link :to="{name: 'showPaper', params: {id: paper.id}}" title = "Смотреть статью" >{{paper.title}}</router-link>
                            </div>
                            <div class="panel-body text-justify text-format">
                                    &nbsp {{paper.discr}}
                            </div>
                            <div class="panel-footer">
                                <router-link :to="{name: 'editPaper', params: {id: paper.id}}" class="btn btn-default"> Edit </router-link>
                                <button class="btn btn-default" v-on:click="deletePaper(paper.id, paper.title)"> Delete </button>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <div id="Modal" v-bind:class="status">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Заголовок модального окна -->
                    <div class="modal-header">
                        <button type="button" class="close" v-on:click="closeModal">×</button>
                        <h4>{{delTitle}}</h4>
                    </div>
                    <!-- Основное содержимое модального окна -->
                    <div class="modal-body">
                        Delete?
                    </div>
                    <!-- Футер модального окна -->
                    <div class="modal-footer">
                        <form >
                            <router-link :to="{name: 'deletePaper', params: {id: deleteId}}" class="btn btn-danger"> Delete </router-link>
                            <button type="reset" class="btn btn-primary" v-on:click="closeModal">No</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</template>

<script>
     export default {
        data: function() {
            return {
                delTitle:"",
                deleteId: -1,
                 papers: [],
                 status: "modal fade",
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function() {
                var selff = this;
                axios.get('/papers').then(
                    function(response){
                        var arrPaper = [];
                        for (var i=0; i<response.data.length; i++){
                            if (i!==0 && arrPaper[arrPaper.length-1].length<3){
                                arrPaper[arrPaper.length-1].push(response.data[i]);
                            }else{
                                arrPaper[arrPaper.length] = [response.data[i]];
                            }
                        }
                        selff.papers = arrPaper;
                    }
                );
            },
            deletePaper: function(id, title) {
                this.delTitle= title;
                this.deleteId = id;
                this.status = "modal show";
                
            },
            closeModal: function() {
                this.status = "modal fade";
            }
        }
    };
</script>
