<template>
    <b-container fluid>
        <b-row>
            <b-col lg="6" class="my-1">
                <b-button @click="updatelogs()">بروزرسانی</b-button>
            </b-col>
        </b-row>
        <!-- User Interface controls -->
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
                            <option :value="false">صعودی</option>
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
                        <b-form-checkbox value="level">سطح اهمیت لاگ</b-form-checkbox>
                        <b-form-checkbox value="message">پیام لاگ</b-form-checkbox>
                        <b-form-checkbox value="created_at">تاریخ ایجاد لاگ</b-form-checkbox>
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
                        <li v-for="(value, key) in row.item" :key="key">
                            <ul v-if="key == 'context'">
                                <li v-for="(context_value, context_key) in JSON.parse(value)" :key="context_key">
                                    {{ context_key }}: {{ context_value }}
                                </li>
                            </ul>
                            <p v-else>{{ key }}: {{ value }}</p>
                        </li>
                    </ul>
                </b-card>
            </template>
        </b-table>

        <!-- Info modal -->
        <b-modal :id="infoModal.id" :title="infoModal.level" ok-only @hide="resetInfoModal">
            <h2>{{infoModal.item.level}}</h2>
            <h2>{{infoModal.item.message}}</h2>
            <p>{{infoModal.item.created_at}}</p>
        </b-modal>
    </b-container>
</template>

<script>

    export default {
        props: ['logs'],
        data() {
            return {
                items: [],
                cardItems: [],
                fields: [
                    {key: 'level', label: 'سطح اهمیت لاگ', sortable: true, sortDirection: 'desc'},
                    {key: 'message', label: 'پیام لاگ', sortable: true, class: 'text-center'},
                    {key: 'created_at', label: 'تاریخ ایجاد لاگ', sortable: true, class: 'text-center'},
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
                    level: '',
                    item: "{}",
                    // verified: "",
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
            this.items = this.logs;
            this.totalRows = this.items.length;
        },
        methods: {
            updatelogs() {
                this.getItems();
            },
            getItems() {
                axios.get('/api/logs')
                    .then(response => {
                        // console.log(response.data.data);
                        this.items = response.data.data;
                        // Trigger pagination to update the number of buttons/pages due to filtering
                        this.onFiltered(this.items);

                        // console.log(this.items);
                    })
                    .catch(e => {
                        // this.errors.push(e)
                        console.log(e);
                    });
            },
            info(item, index, button) {
                this.infoModal.level = `شماره ردیف: ${index}`;
                // this.infoModal.content = JSON.stringify(item, null, 2);
                this.infoModal.item = item;
                this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            },
            resetInfoModal() {
                this.infoModal.level = '';
                this.infoModal.item = '{}';
                // this.infoModal.content = '';
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1
            },
            // setApiToken(api_token) {
            //     this.api_token = api_token;
            // },
            // getApiToken() {
            //     this.api_token = localStorage.getItem('user-token');
            //
            //     return this.api_token;
            // }
        }
    }
</script>


<style lang="scss">
    @import '~bootstrap-vue/dist/bootstrap-vue.css';
</style>
