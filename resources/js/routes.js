export default [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/seles', component: require('./components/sales.vue').default },
    { path: '/dua', component: require('./components/Dua.vue').default },
    { path: '/tiga', component: require('./components/Tiga.vue').default },
    { path: '/empat', component: require('./components/empat.vue').default },
    { path: '/lima', component: require('./components/Lima.vue').default },
    { path: '/enam', component: require('./components/Enam.vue').default },
    { path: '/tujuh', component: require('./components/Tujuh.vue').default },
    { path: '/delapan', component: require('./components/Delapan.vue').default },
    { path: '/sembilan', component: require('./components/Sembilan.vue').default },
    { path: '/sepuluh', component: require('./components/Sepuluh.vue').default },


    // { path: '/products', component: require('./components/product/Products.vue').default },
    { path: '/products', component: require('./components/product/Products.vue').default },
    { path: '/product/tag', component: require('./components/product/Tag.vue').default },
    { path: '/product/category', component: require('./components/product/Category.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default }
];
