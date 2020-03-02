<template>
    <div>
        <b-table
                :items="equipments"
                :fields="fields"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                responsive="sm"
        ></b-table>
        <div>
            Sorting By: <b>{{ sortBy }}</b>, Sort Direction:
            <b>{{ sortDesc ? 'Descending' : 'Ascending' }}</b>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: ['category_id'],
        data() {
            return {
                sortBy: 'age',
                sortDesc: true,
                fields: [
                    {key: 'title', sortable: true},
                    {key: 'desc', sortable: true},
                    {key: 'category_id', sortable: true}
                ],
                equipments: [],
            }
        },
        mounted() {
            axios.get('http://project7.test/api/equipment')
                .then(response => {
                    // JSON responses are automatically parsed.
                    this.equipments = response.data.data;
                })
                .catch(e => {
                    // this.errors.push(e);
                    console.log(response.data);
                });

            this.getEquipments();
        },
        methods: {
            getEquipments() {
                // axios.get('http://project7.test/api/category/' + this.category_id+'/equipment')
                axios.get('http://project7.test/api/categories/' + 1+'/equipment')
                    .then(response => {
                        console.log(response.data);
                        this.equipments = response.data.data;
                    })
                    .catch(e => {
                        // this.errors.push(e)
                        console.log(response.data);
                    })
            },
        }
    }
    class equipment {

    }

</script>

<style scoped>

</style>