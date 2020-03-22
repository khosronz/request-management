<template>
    <b-form-input list="my-list-id"></b-form-input>

    <datalist id="my-list-id">
        <option>Manual Option</option>
        <option v-for="item in items">{{ item }}</option>
    </datalist>
</template>

<script>
    // import axios from 'axios';
    export default {
        data() {
            return {
                items: []
            }
        },
        mounted() {
            this.getItems();
        },
        methods: {
            getItems(category_id) {
                // axios.get('http://project7.test/api/category/' + this.category_id+'/equipment')
                axios.get('http://project7.test/api/categories')
                    .then(response => {
                        // console.log(response.data.data);
                        this.items = response.data.data;
                    })
                    .catch(e => {
                        // this.errors.push(e)
                        console.log(e);
                    });
            },
        }
    }
</script>


<style lang="scss">
    @import '~bootstrap-vue/dist/bootstrap-vue.css';
</style>