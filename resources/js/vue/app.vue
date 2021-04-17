<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <AddItemForm @reloadList="getList()"></AddItemForm>
        </div>
        <ListView :items="items" @reloadList="getList()"></ListView>
    </div>
</template>

<script>
    import AddItemForm from "./AddItemForm"
    import ListView from "./ListView"

    export default {
        name: 'App',
        components: {
            AddItemForm,
            ListView
        },
        data(){
            return {
                items: []
            }
        },
        methods: {
            getList(){
                axios.get('api/items')
                .then(response => {
                    this.items = response.data
                }).catch( error => {
                    console.log(error);
                })
            }
        },
        created(){
            this.getList();
        }
    }
</script>
<style scooped>
    .todoListContainer {
        width: 350px;
        margin: auto;
        margin-top: 5px;
    }

    .heading {
        background: #e6e6e6;
        padding: 10px;
    }

    #title {
        text-align: center;
    }
</style>