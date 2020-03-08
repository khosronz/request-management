<template>
    <b-container fluid>
        <!-- User Interface controls -->
        <b-row>
            <b-col lg="6" class="my-1">

                <label>انتخاب دسته تجهیزات</label>
                <b-form-select @change="onChange($event)" v-model="selected" class="mb-3">
                    <!-- This slot appears above the options from 'options' prop -->
                    <template v-slot:first>
                        <b-form-select-option :value="null" disabled>-- انتخاب کنید --</b-form-select-option>
                    </template>

                    <!-- These options will appear after the ones from 'options' prop -->
                    <b-form-select-option v-for="category in options" :key="category.id" :value="category.id">
                        {{category.title}}
                    </b-form-select-option>
                </b-form-select>


            </b-col>
        </b-row>
        <b-row>
            <b-col lg="6" class="my-1">
                <b-form-group
                        label="مرتب سازی"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="sortBySelect"
                        class="mb-0"
                >
                    <b-input-group size="sm">
                        <b-form-select v-model="sortBy" id="sortBySelect" :options="sortOptions" class="w-75">
                            <template v-slot:first>
                                <option value="">-- انتخاب کنید --</option>
                            </template>
                        </b-form-select>
                        <b-form-select v-model="sortDesc" size="sm" :disabled="!sortBy" class="w-25">
                            <option :value="false">سعودی</option>
                            <option :value="true">نزولی</option>
                        </b-form-select>
                    </b-input-group>
                </b-form-group>
            </b-col>

            <b-col lg="6" class="my-1">
                <b-form-group
                        label="مرتب سازی اولیه"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="initialSortSelect"
                        class="mb-0"
                >
                    <b-form-select
                            v-model="sortDirection"
                            id="initialSortSelect"
                            size="sm"
                            :options="['asc', 'desc', 'last']"
                    ></b-form-select>
                </b-form-group>
            </b-col>

            <b-col lg="6" class="my-1">
                <b-form-group
                        label="فیلتر"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="filterInput"
                        class="mb-0"
                >
                    <b-input-group size="sm">
                        <b-form-input
                                v-model="filter"
                                type="search"
                                id="filterInput"
                                placeholder="نوع جستجو"
                        ></b-form-input>
                        <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter = ''">پاکسازی</b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-form-group>
            </b-col>

            <b-col lg="6" class="my-1">
                <b-form-group
                        label="فیلتر شده بر اساس"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        description="همه فیلترها را علامت بزنید تا همه داده ها فیلتر شوند"
                        class="mb-0">
                    <b-form-checkbox-group v-model="filterOn" class="mt-1">
                        <b-form-checkbox value="title">نام تجهیز</b-form-checkbox>
                        <b-form-checkbox value="desc">توضیحات تجهیز</b-form-checkbox>
                        <b-form-checkbox value="category_id">شناسه دسته</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>
            </b-col>

            <b-col sm="5" md="6" class="my-1">
                <b-form-group
                        label="تعداد مورد در هر صفحه"
                        label-cols-sm="6"
                        label-cols-md="4"
                        label-cols-lg="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="perPageSelect"
                        class="mb-0"
                >
                    <b-form-select
                            v-model="perPage"
                            id="perPageSelect"
                            size="sm"
                            :options="pageOptions"
                    ></b-form-select>
                </b-form-group>
            </b-col>

            <b-col sm="7" md="6" class="my-1">
                <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                        align="fill"
                        size="sm"
                        class="my-0"
                ></b-pagination>
            </b-col>
        </b-row>

        <!-- Main table element -->
        <b-table
                show-empty
                small
                stacked="md"
                :items="items"
                :fields="fields"
                :current-page="currentPage"
                :per-page="perPage"
                :filter="filter"
                :filterIncludedFields="filterOn"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :sort-direction="sortDirection"
                @filtered="onFiltered"
        >
            <template v-slot:cell(name)="row">
                {{ row.value.first }} {{ row.value.last }}
            </template>

            <template v-slot:cell(actions)="row">
                <b-row>
                    <b-col sm="5" md="6" class="my-1">
                        <b-button size="sm btn btn-ghost-success" @click="info(row.item, row.index, $event.target)"
                                  class="mr-1">
                            <!--اطلاعات بیشتر-->
                            <i class="fa fa-eye"></i>
                        </b-button>
                    </b-col>
                    <b-col sm="5" md="6" class="my-1">
                        <b-button size="sm btn btn-ghost-success" @click="row.toggleDetails">
                            <i class="fa fa-road"></i>
                        </b-button>
                    </b-col>
                </b-row>
            </template>

            <template v-slot:row-details="row">
                <b-card>
                    <ul>
                        <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
                    </ul>
                </b-card>
            </template>
        </b-table>

        <!-- Info modal -->
        <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
            <!--<pre>{{ infoModal.content }}</pre>-->
            <h2>{{infoModal.item.title}}</h2>
            <p>{{infoModal.item.desc}}</p>
            <p>{{infoModal.item.verified}}</p>
            <p>{{infoModal.item.user_id}}</p>
            <p>{{infoModal.item.created_at}}</p>
            <p>{{infoModal.item.updated_at}}</p>
            <button @click="addToCart(infoModal.item.id)" class="alert alert-info"><i class="fa fa-plus"></i> افزودن به سبد درخواست
            </button>
            <b-alert
                    :show="dismissCountDown"
                    dismissible
                    variant="success"
                    @dismissed="dismissCountDown=0"
                    @dismiss-count-down="countDownChanged"
            >
                <!--<p>این پیام بعد از  {{ dismissCountDown }} ثانیه محو می گردد...</p>-->
                <p>کالای مورد نظر به سبد خرید اضافه گردید.</p>
                <p>{{ dismissCountDown }}زمان نمایش پیام :  </p>
                <b-progress
                        variant="success"
                        :max="dismissSecs"
                        :value="dismissCountDown"
                        height="4px"
                ></b-progress>
            </b-alert>
        </b-modal>
    </b-container>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['user_id'],
        data() {
            return {
                dismissSecs: 3,
                dismissCountDown: 0,
                showDismissibleAlert: false,
                selected: null,
                options: [
                    {value: null, text: 'Please select an option'},
                    {value: 'a', text: 'This is First option'},
                    {value: 'b', text: 'Selected Option'},
                    {value: {C: '3PO'}, text: 'This is an option with object value'},
                    {value: 'd', text: 'This one is disabled', disabled: true}
                ],
                items: [],
                cardItems: [],
                fields: [
                    {key: 'title', label: 'عنوان تجهیز', sortable: true, sortDirection: 'desc'},
                    {key: 'desc', label: 'توضیحات تجهیز', sortable: true, class: 'text-center'},
                    {key: 'actions', label: 'عملیات'}
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 5,
                pageOptions: [5, 10, 15],
                sortBy: '',
                sortDesc: true,
                sortDirection: 'desc',
                filter: null,
                filterOn: [],
                infoModal: {
                    id: 'info-modal',
                    title: '',
                    item: "{}",
                    content: ''
                }
            }
        },
        computed: {
            sortOptions() {
                // Create an options list from our fields
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key};
                    })
            }
        },
        mounted() {
            this.getCategories();
            this.totalRows = this.items.length;
//            this.getItems(this.category_id);
        },
        methods: {
            countDownChanged(dismissCountDown) {
                this.dismissCountDown = dismissCountDown
            },
            showAlert() {
                this.dismissCountDown = this.dismissSecs
            },
            addToCart(equipment_id) {
                // this.getItems();
                console.log('Added to cart');
                this.addCartItems(equipment_id);
                this.showAlert();
            },
            addCartItems(equipment_id) {
                this.dataSend = {
                    'user_id': this.user_id,
                    'equipment_id': equipment_id,
                    'num': 1
                };
                axios.post('http://project7.test/api/cards/',this.dataSend)
                    .then(response => {
                        console.log(response.data.data);
                        this.cardItems = response.data.data;
                        // Trigger pagination to update the number of buttons/pages due to filtering
                        // this.onFiltered(this.items);
                    })
                    .catch(e => {
                        // this.errors.push(e)
                        console.log(e);
                    });
            },
            updateCart() {
                // this.getItems();
                console.log('Added to cart');
                this.getCartItems();
            },
            getCartItems() {
                axios.get('http://project7.test/api/cards/' + this.user_id + '/user')
                // axios.get('http://project7.test/api/category/' + this.category_id+'/equipment')
                    .then(response => {
                        console.log(response.data.data);
                        this.cardItems = response.data.data;
                        // Trigger pagination to update the number of buttons/pages due to filtering
                        // this.onFiltered(this.items);
                    })
                    .catch(e => {
                        // this.errors.push(e)
                        console.log(e);
                    });
            },
            onChange(event) {
                console.log(this.selected);
                this.getItems(this.selected);

            },
            getCategories() {
                // axios.get('http://project7.test/api/category/' + this.category_id+'/equipment')
                axios.get('http://project7.test/api/categories')
                    .then(response => {
                        console.log(response.data.data);
                        this.options = response.data.data;
                        this.selected = null;
                    })
                    .catch(e => {
                        // this.errors.push(e)
                        console.log(e);
                    });
            },
            getItems(category_id) {
                // axios.get('http://project7.test/api/category/' + this.category_id+'/equipment')
                axios.get('http://project7.test/api/categories/' + category_id + '/equipment')
                    .then(response => {
                        console.log(response.data.data);
                        this.items = response.data.data;
                        // Trigger pagination to update the number of buttons/pages due to filtering
                        this.onFiltered(this.items);
                    })
                    .catch(e => {
                        // this.errors.push(e)
                        console.log(e);
                    });
            },
            info(item, index, button) {
                this.infoModal.title = `شماره ردیف: ${index}`;
                this.infoModal.content = JSON.stringify(item, null, 2);
                this.infoModal.item = item;
                this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            },
            resetInfoModal() {
                this.infoModal.title = '';
                this.infoModal.item = '{}';
                this.infoModal.content = '';
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1
            }
        }
    }
</script>


<style lang="scss">
    @import '~bootstrap-vue/dist/bootstrap-vue.css';
</style>