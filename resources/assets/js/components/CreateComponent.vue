<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link> 
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create paper</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">paper title</label>
                            <input type="text" v-model="paper.title" class="form-control">
                            <span v-if="errors.title" clas="error">{{errors.title[0]}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">paper text</label>
                            <textarea v-model="paper.text" class="form-control textarea-format"></textarea>
                            <span v-if="errors.text" clas="error">{{errors.text[0]}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        
        data: function () {
            return {
                errors: [],
                paper: {
                    title: '',
                    text: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newPaper = app.paper;
                
                axios.post('/papers', newPaper)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch (error=> {
                        if (error.response.status==422) {
                            this.errors = error.response.data.errors
                        }
                    });
            }
        }
    }
</script>
