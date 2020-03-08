<template>
    <b-container fluid>
        <b-row>
            <b-col lg="6" class="my-1">
                <b-button @click="updateOrders()">بروزرسانی</b-button>
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
                        <b-form-checkbox value="title">عنوان سفارش</b-form-checkbox>
                        <b-form-checkbox value="created_at">تاریخ ایجاد سفارش</b-form-checkbox>
                        <b-form-checkbox value="updated_at">آخرین تاریخ بررسی سفارش</b-form-checkbox>
                        <b-form-checkbox value="verified">وضعیت سفارش</b-form-checkbox>
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

                    <div id="wizard" class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">
                            <li v-for="(value, key) in [0,1,2,3,4,5,6]" :key="key">
                                <a :href="'#step-'+value+1">
                                    <span :class="'step_no'+getStatusColor(row.item.verified,value+1)">{{value+1}}</span>
                                    <span class="step_descr">{{getStatus(value + 1)}}</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="wizard_steps">

                            <li v-for="(value, key) in [7,8,9,10,11,12,13]" :key="key">
                                <a :href="'#step-'+value+1">
                                    <span :class="'step_no'+getStatusColor(row.item.verified,value+1)">{{value+1}}</span>
                                    <!--<span class="step_no">{{value + 1}}</span>-->
                                    <span class="step_descr">{{getStatus(value + 1)}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </b-card>
            </template>
        </b-table>

        <!-- Info modal -->
        <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
            <!--<pre>{{ infoModal.content }}</pre>-->
            <h2>{{infoModal.item.title}}</h2>
            <p>{{infoModal.item.desc}}</p>
            <!--<p>{{infoModal.item.user_id}}</p>-->
            <p>{{infoModal.item.created_at}}</p>
            <p>{{infoModal.item.updated_at}}</p>
            <!--<button @click="updateCart" class="alert alert-info" ><i class="fa fa-plus"></i> افزودن به سبد درخواست </button>-->
            <a :href="'/orders/'+infoModal.item.id" :class="'btn btn-success'">
                <i class="fa fa-eye"></i> مشاهده تمام جزئیات سفارش
            </a>
        </b-modal>
    </b-container>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['orders', 'user_id'],
        data() {
            return {
                items: [],
                cardItems: [],
                fields: [
                    {key: 'title', label: 'عنوان سفارش', sortable: true, sortDirection: 'desc'},
                    {key: 'created_at', label: 'تاریخ ایجاد سفارش', sortable: true, class: 'text-center'},
                    {key: 'updated_at', label: 'آخرین تاریخ بررسی سفارش', sortable: true, class: 'text-center'},
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
            this.items = this.orders;
            this.totalRows = this.items.length;
        },
        methods: {
            getStatus(status) {
                let title = '';
                switch (status) {
                    case 1:
                        title = 'در انتظار ثبت کننده';
                        break;
                    case '1':
                        title = 'در انتظار ثبت کننده';
                        break;
                    case 2:
                        title = 'در انتظار مشئول';
                        break;
                    case '2':
                        title = 'در انتظار مشئول';
                        break;
                    case 3:
                        title = 'در انتظار کارشناس';
                        break;
                    case '3':
                        title = 'در انتظار کارشناس';
                        break;
                    case 4:
                        title = 'در انتظار کاربرخاص';
                        break;
                    case '4':
                        title = 'در انتظار کاربرخاص';
                        break;
                    case 5:
                        title = 'در انتظار کاربر مالی';
                        break;
                    case '5':
                        title = 'در انتظار کاربر مالی';
                        break;
                    case 6:
                        title = 'در انتظار کاربر پشتیبانی';
                        break;
                    case '6':
                        title = 'در انتظار کاربر پشتیبانی';
                        break;
                    case 7:
                        title = 'در انتظار تامین کننده';
                        break;
                    case '7':
                        title = 'در انتظار تامین کننده';
                        break;
                    case 8:
                        title = 'لغو شده توسط ثبت کننده';
                        break;
                    case '8':
                        title = 'لغو شده توسط ثبت کننده';
                        break;
                    case 9:
                        title = 'لغو شده توسط مشئول';
                        break;
                    case '9':
                        title = 'لغو شده توسط مشئول';
                        break;
                    case 10:
                        title = 'لغو شده توسط کارشناس';
                        break;
                    case '10':
                        title = 'لغو شده توسط کارشناس';
                        break;
                    case 11:
                        title = 'لغو شده توسط کاربرخاص';
                        break;
                    case '11':
                        title = 'لغو شده توسط کاربرخاص';
                        break;
                    case 12:
                        title = 'لغو شده توسط کاربر مالی';
                        break;
                    case '12':
                        title = 'لغو شده توسط کاربر مالی';
                        break;
                    case 13:
                        title = 'لغو شده توسط کاربر پشتیبانی';
                        break;
                    case '13':
                        title = 'لغو شده توسط کاربر پشتیبانی';
                        break;
                    case 14:
                        title = 'لغو شده توسط تامین کننده';
                        break;
                    case '14':
                        title = 'لغو شده توسط تامین کننده';
                        break;
                }
                return title;
            },
            getStatusColor(verified, status) {
                let colorClass = '';
                if (status == verified && (verified >= 1 && verified <= 7)) {
                    colorClass = ' bg-primary text-white';
                } else if (status == verified && (verified >= 8 && verified <= 14)) {
                    colorClass = ' bg-danger text-white';
                } else {
                    colorClass = ' bg-secondary text-white';
                }
                return colorClass;
            },
            updateOrders() {
                this.getItems();
            },
            getItems() {
                axios.get('http://project7.test/api/orders/' + this.user_id + '/user')
                // axios.get('http://project7.test/api/category/' + this.category_id+'/equipment')
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