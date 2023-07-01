<template>
    <nav class="bg-white sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="mb-2 text-center sidenav-header">
                <Link class="navbar-brand text-primary" :href="route('dashboard')">
                <img src="/img/logo/Ferentino-Logo.png" alt="ferentino" class="home-logo mt-1" height="150">
                </Link>
            </div>
            <br>
            <div class="mt-2 navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="mb-3 navbar-nav">
                        <li class="nav-item">
                            <Link :class="{ 'active__sidebar': route().current() == 'dashboard' }"
                                class="nav-link active__sidebar-preloader" :href="route('dashboard')">
                            <font-awesome-icon icon="fa-solid fa-desktop" />
                            <span class="ml-2 nav-link-text font-weight-400">Dashboard</span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="can('read_work_order')">
                            <Link :class="{ 'active__sidebar': $page.url.startsWith('/work_order') }"
                                class="nav-link active__sidebar-preloader" :href="route('work_order.index')">
                            <font-awesome-icon icon="fa-solid fa-file-invoice-dollar" />
                            <span class="ml-2 nav-link-text font-weight-400">Work Orders</span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="can('read_store')">
                            <Link :class="{ 'active__sidebar': $page.url.startsWith('/stores') }"
                                class="nav-link active__sidebar-preloader" :href="route('national-account.store.index')">
                            <font-awesome-icon icon="fa-solid fa-house" />
                            <span class="ml-2 nav-link-text font-weight-400">Store Registry</span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="can('read_national_account')">
                            <Link :class="{ 'active__sidebar': $page.url.startsWith('/national-account') }"
                                class="nav-link active__sidebar-preloader" :href="route('national-account.index')">
                            <font-awesome-icon icon="fa-solid fa-building" />
                            <span class="ml-2 nav-link-text font-weight-400">National Accounts</span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="can('read_customer')">
                            <Link :class="{ 'active__sidebar': $page.url.startsWith('/customer') }"
                                class="nav-link active__sidebar-preloader" :href="route('customer.index')">
                            <font-awesome-icon icon="fa-solid fa-people-line" />
                            <span class="ml-2 nav-link-text font-weight-400">Customer Registry</span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="can('read_service_provider')">
                            <Link :class="{ 'active__sidebar': $page.url.startsWith('/service-provider') }"
                                class="nav-link active__sidebar-preloader" :href="route('service-provider.index')">
                            <font-awesome-icon icon="fa-solid fa-people-group" />
                            <span class="ml-2 nav-link-text font-weight-400">Service Providers</span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="can('read_unit')">
                            <Link :class="{ 'active__sidebar': $page.url.startsWith('/vehicle') }"
                                class="nav-link active__sidebar-preloader" :href="route('vehicle.index')">
                            <font-awesome-icon icon="fa-solid fa-tractor" />
                            <span class="ml-2 nav-link-text font-weight-400">Unit Registry</span>
                            </Link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#configurationMenu" data-toggle="collapse" aria-expanded="true">
                                <font-awesome-icon icon="fa-solid fa-gear" /><span class="ml-2 font-weight-400">Configurations</span>
                            </a>
                            <ul :class="{ 'collapse': route().current() == 'dashboard' || $page.url.startsWith('/national-account')|| $page.url.startsWith('/service-provider')  || $page.url.startsWith('/customer') || $page.url.startsWith('/work_orders') || $page.url.startsWith('/tyres') || $page.url.startsWith('/vehicle')|| $page.url.startsWith('/stores') }"
                                class=" list-unstyled" id="configurationMenu">
                                <li class="nav-item" v-if="can('read_warehouse')">
                                    <Link :class="{ 'active__sidebar': $page.url.startsWith('/configurations/warehouse') }"
                                        class="nav-link active__sidebar-preloader" :href="route('warehouse.index')">
                                    <font-awesome-icon icon="fa-solid fa-warehouse " class="ml-4" />
                                    <span class="ml-2 hide-menu font-weight-400">Warehouse Registry</span>
                                    </Link>
                                </li>
                                <li class="nav-item" v-if="$page.props.auth.user.email == 'cyberelysium@gmail.com'" >
                                    <Link :class="{ 'active__sidebar': $page.url.startsWith('/configurations/role') }"
                                        class="nav-link active__sidebar-preloader" :href="route('role.index')">
                                    <font-awesome-icon icon="fa-solid fa-person-walking-dashed-line-arrow-right" class="ml-4" />
                                    <span class="ml-2 hide-menu font-weight-400">Role Management</span>
                                    </Link>
                                </li>
                                <li class="nav-item" v-if="can('read_services')">
                                    <Link :class="{ 'active__sidebar': $page.url.startsWith('/configurations/service') }"
                                        class="nav-link active__sidebar-preloader" :href="route('service.index')">
                                    <font-awesome-icon icon="fa-solid fa-screwdriver-wrench" class="ml-4" />
                                    <span class="ml-2 hide-menu font-weight-400">Services Registry</span>
                                    </Link>
                                </li>
                                <li class="nav-item" v-if="can('read_tyre')">
                                    <Link :class="{ 'active__sidebar': $page.url.startsWith('/configurations/tyres') }"
                                        class="nav-link active__sidebar-preloader" :href="route('tyre.index')">
                                    <font-awesome-icon icon="fa-solid fa-record-vinyl" class="ml-4" />
                                    <span class="ml-2 hide-menu font-weight-400">Tyre Registry</span>
                                    </Link>
                                </li>

                                <li class="nav-item" v-if="can('read_tyre_category')">
                                    <Link
                                        :class="{ 'active__sidebar': $page.url.startsWith('/configurations/tyre_category') }"
                                        class="nav-link active__sidebar-preloader" :href="route('tyre_category.index')">
                                    <font-awesome-icon icon="fa-solid fa-layer-group" class="ml-4" />
                                    <span class="ml-2 hide-menu font-weight-400">Tyre Category</span>
                                    </Link>
                                </li>
                                <li class="nav-item" v-if="can('read_sub_dealer')">
                                    <Link :class="{ 'active__sidebar': $page.url.startsWith('/configurations/sub_dealer') }"
                                        class="nav-link active__sidebar-preloader" :href="route('sub_dealer.index')">
                                    <font-awesome-icon icon="fa-solid fa-briefcase" class="ml-4" />
                                    <span class="ml-2 hide-menu font-weight-400">Sub-Dealer Registry</span>
                                    </Link>
                                </li>
                                <li class="nav-item" v-if="can('read_tax')">
                                    <Link :class="{ 'active__sidebar': $page.url.startsWith('/configurations/tax') }"
                                        class="nav-link active__sidebar-preloader" :href="route('tax.index')">
                                    <font-awesome-icon icon="fa-solid fa-percent" class="ml-4" />
                                    <span class="ml-2 hide-menu font-weight-400">Tax Registry</span>
                                    </Link>
                                </li>
                                <li class="nav-item" v-if="can('read_user')">
                                    <Link :class="{ 'active__sidebar': $page.url.startsWith('/configurations/user') }"
                                        class="nav-link active__sidebar-preloader" :href="route('user.index')">
                                    <font-awesome-icon icon="fa-solid fa-user" class="ml-4" />
                                    <span class="ml-2 hide-menu font-weight-400">User Management</span>
                                    </Link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>


<script>

export default {
    components: {
        Link,
        library,
    },
    data() {
        return {
            materialTypes: [],
        }
    },
    beforeMount() {
        library.add(faPeopleLine)
        library.add(faDesktop)
        library.add(faPercent)
        library.add(faLayerGroup)
        library.add(faTractor)
        library.add(faFileInvoiceDollar)
        library.add(faRecordVinyl)
        library.add(faBuilding)
        library.add(faWarehouse)
        library.add(faScrewdriverWrench)
        library.add(faGear)
        library.add(faBriefcase)
        library.add(faPeopleGroup)
        library.add(faUser)
        library.add(faPersonWalkingDashedLineArrowRight)
        if (!window.Laravel) {
            window.location.reload();
        }
    },
    methods: {
        isActive(route, path) {
            if (isArray(path)) {
                return path.includes(route);
            }
        },
    },
}


</script>

<style lang="css">
.navbar-vertical .navbar-brand-img,
.navbar-vertical .navbar-brand>img {
    max-width: 100%;
    max-height: none;
    margin-top: -60px;
    margin-left: -10px;
}

.navbar-vertical.navbar-expand-xs .navbar-collapse {
    margin-top: -50px;
}

.bg__color {
    background-color: rgb(250, 236, 205) !important;
}

.active__sidebar {
    background-color: rgb(255, 249, 235) !important;
    border-radius: 5%;
}
</style>
