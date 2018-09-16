<template>

</template>
<script>
    export default {
         mounted() { 
            let app = this;
            let id = app.$route.params.id;          
            this.deleteEntry(id);
         },
         methods: {
         
            deleteEntry(id) {  
                if (confirm("Do you really want to delete it?")) {
                    let app = this;
                    console.log(app);
                    axios.delete('/papers/' + id)
                        .then(function (resp) {
                            app.$router.replace('/');
                        })
                        .catch(function (resp) {
                            alert("Could not delete company");
                        });
                    }
                }
            }
        }
</script>
