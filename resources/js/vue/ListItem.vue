<template>
    <div>
        <div v-if="!isOpenedUpdateField" class="item">
            <input type="checkbox" @change="updateCheck" v-model="item.completed"/>
            <span :class="[item.completed ? 'completed' : '', 'itemText']">{{item.name}}</span>
            <button @click="openUpdateFieldName()" class="trashcan">
                <font-awesome-icon icon="edit"/>
            </button>
            <button @click="removeItem()" class="trashcan">
                <font-awesome-icon icon="trash"/>
            </button>
        </div>
        <div v-if="isOpenedUpdateField">
        <input  type="text" v-model="item.name"/>
        <button @click="updateItem">Update</button>
        <button @click="closeUpdateFieldName">Cancel</button>
        </div>
    </div>
    
    
        
</template>

<script>
export default {
    name: 'ListItem',
    props: {
        item: Object,
        required: true
    },
    data(){
        return {
            isOpenedUpdateField: false
        }
    },
    methods: {
        updateCheck(){
            axios.put('api/item/' + this.item.id, {
                item: this.item
            })
            .then(response => {
                if(response.status == 200){
                    this.$emit('itemChanged')
                }
            })
            .catch(error => {
                console.log(error)
            })
        },
        updateItem(){
            
            axios.put('api/item/' + this.item.id, {
                item: this.item
            })
            .then(response => {
                if(response.status == 200){
                    this.$emit('itemChanged')
                }
            })
            .catch(error => {
                console.log(error)
            })

            this.isOpenedUpdateField = false
        },
        openUpdateFieldName(){
            
            this.isOpenedUpdateField = true
        },
        closeUpdateFieldName(){
            this.isOpenedUpdateField = false;
        },
        removeItem(){
            let message = confirm('Are u sure for deleting item');

            if(!message){
                return;
            }

            axios.delete('api/item/' + this.item.id, {
                item: this.item
            })
            .then(response => {
                if(response.status == 200){
                    this.$emit('itemChanged')
                }
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<style scooped>
    .completed {
        text-decoration: line-through;
        color: #999999;
    }

    .itemText {
        width: 100%;
        margin-left: 20px;
    }

    .item {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .trashcan {
        background: #e6e6e6;
        border: none;
        color: #FF0000;
        outline: none;
    }

    
</style>