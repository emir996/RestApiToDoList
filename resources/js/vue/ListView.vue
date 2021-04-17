<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <ListItem @itemChanged="$emit('reloadList')" :item="item" class="item"></ListItem>
        </div>
    </div>
</template>

<script>
import ListItem from './ListItem'

export default {
    name: 'ListView',
    components: {
        ListItem
    },
    props: {
        items: Array,
        required: true
    }
}
</script>
<style scooped>
    .item {
        background: #e6e6e6;
        padding: 5px;
        margin-top: 5px;
    }
</style>