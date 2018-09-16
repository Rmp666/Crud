<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Show paper</div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <div class= "text-center"> {{paper.title}}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <div class= "text-center text-justify">&nbsp {{paper.text}}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <span> Contview = {{paper.contview}}</span>
                        </div>
                    </div>
                    
                
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            console.log(app);
            let id = app.$route.params.id;
            app.paperId = id;
            axios.get('/papers/' + id)
                .then(function (resp) {
                console.log(resp);
                    app.paper = resp.data;
                })
                .catch(function () {
                    alert("Could not load your paper")
                });
        },
        data: function () {
            return {
                paperId: null,
                
                paper: {
                    title: '',
                    text: '',
                    contview: '',
                }
            }
        },
        
    }
</script>
